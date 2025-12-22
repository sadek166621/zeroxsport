<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SellerPenalty;
use App\Models\Product;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;


class PenaltyController extends Controller
{
    public function sellerPenaltyIndex()
    {

        $penalties = SellerPenalty::with([
            'vendor',
            'product',
            'order.user'
        ])->orderBy('created_at', 'desc')->get();

        return view('backend.vendor.penalty_index', compact('penalties'));
    }

    public function sellerPenaltyCreate()
    {
        $vendors = Vendor::with('user')->where('status', 1)->get();

        $products = Product::where('status', 1)
            ->where('status', 1)
            ->whereNotNull('vendor_id')
            ->with('vendor')
            ->get();

        $orders = Order::with([
            'user',
            'order_details'
        ])->get();

        return view('backend.vendor.penalty_form', compact('vendors', 'products', 'orders'));
    }

    public function sellerPenaltyStore(Request $request)
    {
        $adminId = Auth::guard('admin')->user()->id;
        //Validation
        $validated = $request->validate([
            'vendor_id'  => 'required|exists:vendors,id',
            'product_id' => 'nullable|exists:products,id',
            'order_id'   => 'nullable|exists:orders,id',
            'type'       => 'required|string',
            'amount'     => 'required|numeric|min:0',
            'reason'     => 'nullable|string|max:1000',
        ]);

        // Optional: Ensure product belongs to vendor
        if ($request->product_id) {
            $product = \App\Models\Product::where('id', $request->product_id)
                ->where('vendor_id', $request->vendor_id)
                ->first();

            if (!$product) {
                return back()->withErrors([
                    'product_id' => 'Selected product does not belong to selected vendor.'
                ])->withInput();
            }
        }

        // Optional: Ensure order contains the product
        if ($request->order_id && $request->product_id) {
            $exists = \App\Models\OrderDetail::where('order_id', $request->order_id)
                ->where('product_id', $request->product_id)
                ->exists();

            if (!$exists) {
                return back()->withErrors([
                    'order_id' => 'Selected order does not contain the selected product.'
                ])->withInput();
            }
        }

        // Auto ban logic
        $isBan = $request->is_ban;

        // Store penalty
        SellerPenalty::create([
            'vendor_id'  => $validated['vendor_id'],
            'product_id' => $validated['product_id'] ?? null,
            'order_id'   => $validated['order_id'] ?? null,
            'type'       => $validated['type'],
            'amount'     => $validated['amount'],
            'reason'     => $validated['reason'],
            'is_ban'     => $request->is_ban,
            'created_by' => $adminId,
        ]);

        // Optional: deactivate vendor if fake product
        if ($isBan) {
            $vendor = \App\Models\Vendor::where('id', $validated['vendor_id'])
                ->update(['status' => 0]);
        }
        if ($isBan) {
            \App\Models\User::where('id', $vendor->user_id)
                ->update(['status' => 0]);
        }

        return redirect()
            ->route('seller.penalty.index')
            ->with('success', 'Seller penalty applied successfully.');
    }

    public function sellerPenaltyEdit($id)
    {
        $penalty = SellerPenalty::with(['vendor', 'product', 'order'])->findOrFail($id);

        $vendors = Vendor::with('user')->where('status', 1)->get();
        $products = Product::where('status', 1)
            ->where('status', 1)
            ->whereNotNull('vendor_id')
            ->with('vendor')
            ->get();
        $orders   = Order::with(['user', 'order_details'])->get();

        return view('backend.vendor.penalty_edit', compact(
            'penalty',
            'vendors',
            'products',
            'orders'
        ));
    }

    public function sellerPenaltyUpdate(Request $request, $id)
    {
        $penalty = SellerPenalty::with('vendor')->findOrFail($id);

        // Validation
        $validated = $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'order_id'   => 'nullable|exists:orders,id',
            'type'       => 'required|string',
            'amount'     => 'required|numeric|min:0',
            'reason'     => 'nullable|string|max:1000',
            'is_ban'     => 'nullable|boolean',
        ]);

        // Ensure product belongs to vendor
        if (!empty($validated['product_id'])) {
            $productExists = Product::where('id', $validated['product_id'])
                ->where('vendor_id', $penalty->vendor_id)
                ->exists();

            if (!$productExists) {
                return back()->withErrors([
                    'product_id' => 'Selected product does not belong to this vendor.'
                ])->withInput();
            }
        }

        // Ensure order contains product
        if (!empty($validated['order_id']) && !empty($validated['product_id'])) {
            $orderHasProduct = \App\Models\OrderDetail::where('order_id', $validated['order_id'])
                ->where('product_id', $validated['product_id'])
                ->exists();

            if (!$orderHasProduct) {
                return back()->withErrors([
                    'order_id' => 'Selected order does not contain the selected product.'
                ])->withInput();
            }
        }

        // ✅ Checkbox handling
        $isBan = $request->boolean('is_ban');

        // ✅ Update penalty
        $penalty->update([
            'product_id' => $validated['product_id'] ?? null,
            'order_id'   => $validated['order_id'] ?? null,
            'type'       => $validated['type'],
            'amount'     => $validated['amount'],
            'reason'     => $validated['reason'],
            'is_ban'     => $isBan,
        ]);


        $hasOtherBan = SellerPenalty::where('vendor_id', $penalty->vendor_id)
            ->where('is_ban', 1)
            ->where('id', '!=', $penalty->id)
            ->exists();

        if ($isBan || $hasOtherBan) {
            Vendor::where('id', $penalty->vendor_id)->update(['status' => 0]);
            User::where('id', $penalty->vendor->user_id)->update(['status' => 0]);
        } else {
            Vendor::where('id', $penalty->vendor_id)->update(['status' => 1]);
            User::where('id', $penalty->vendor->user_id)->update(['status' => 1]);
        }

        return redirect()
            ->route('seller.penalty.index')
            ->with('success', 'Seller penalty updated successfully.');
    }

    public function sellerPenaltyDestroy($id)
    {
        $penalty = SellerPenalty::findOrFail($id);

        // Optional: reactivate vendor if deleting ban penalty
        if ($penalty->is_ban) {
            $penalty->vendor->update(['status' => 1]);
            $penalty->vendor->user->update(['status' => 1]);
        }

        $penalty->delete();

        return redirect()
            ->route('seller.penalty.index')
            ->with('success', 'Seller penalty deleted successfully.');
    }


    public function penalties()
    {
        $userId = auth()->guard('admin')->user()->id;
        $vendor = Vendor::where('user_id', $userId)->value('id');

        $penalties = SellerPenalty::with(['vendor', 'product', 'order.user'])
            ->where('vendor_id', $vendor)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($penalties);

        return view('backend.vendor.seller_penalties', compact('penalties'));
    }
}
