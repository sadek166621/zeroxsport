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
        $isBan = $request->type === 'fake_product';

        // Store penalty
        SellerPenalty::create([
            'vendor_id'  => $validated['vendor_id'],
            'product_id' => $validated['product_id'] ?? null,
            'order_id'   => $validated['order_id'] ?? null,
            'type'       => $validated['type'],
            'amount'     => $validated['amount'],
            'reason'     => $validated['reason'],
            'is_ban'     => $isBan,
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
