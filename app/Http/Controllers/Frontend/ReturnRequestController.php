<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ReturningProduct;
use App\Models\ReturnRequest;
use App\Models\Vendor;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnRequestController extends Controller
{
    private $returnRequest;
    public function index($invoice_no)
    {

        if (Auth::check() && Auth::user()->role == 3) {
            $order = Order::where('user_id', Auth::id())->where('invoice_no', $invoice_no)->first();
            $replaceable = 0;
            foreach ($order->order_details as $product) {
                if ($product->product->is_replaceable == 1) {
                    $replaceable++;
                }
            }
            return view('FrontEnd.order.return', compact('order', 'replaceable'));
        } else {
            return redirect()->route('login');
        }
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        $ordered_product_id = explode(',', $request->ordered_product_id);
        $this->returnRequest = ReturnRequest::add($request);
        ReturningProduct::add($this->returnRequest, $request, $ordered_product_id);
        return redirect()->route('dashboard')->with('message', 'Return Request Has Been Submitted');
    }

    public function check($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            return response()->json([
                'result' => false,
                'error'  => 'Invalid order'
            ]);
        }

        // Already requested
        if (ReturnRequest::where('order_id', $id)->exists()) {
            return response()->json([
                'result' => false,
                'error'  => 'Return request already submitted'
            ]);
        }

        // Must be delivered
        if ($order->delivery_status !== 4) {
            return response()->json([
                'result' => false,
                'error'  => 'Order not delivered yet'
            ]);
        }

        // Return period check
        $daysPassed = now()->diffInDays($order->created_at);
        $returnDuration = get_setting('order_return_duration')->value ?? 7;

        if ($daysPassed > $returnDuration) {
            return response()->json([
                'result' => false,
                'error'  => 'Return period exceeded'
            ]);
        }

        return response()->json([
            'result' => true,
            'order'  => $order
        ]);
    }

    public function list()
    {
        $user = Auth::guard('admin')->user();

        if ($user->role == 1) { // Admin
            $return_requests = ReturnRequest::latest();
        } elseif ($user->role == 2) { // Vendor
            $vendor = Vendor::where('user_id', $user->id)->first();
            $return_requests = ReturnRequest::whereHas('returningProducts', function ($q) use ($vendor) {
                $q->where('vendor_id', $vendor->id);
            })->latest();
        }

        // Optional filters
        if (isset($_GET['month']) && $_GET['month'] > 0) {
            $return_requests = $return_requests->whereMonth('created_at', $_GET['month']);
        }

        if (isset($_GET['status']) && ($_GET['status'] != 0 || $_GET['status'] != null)) {
            $return_requests  = $return_requests->where('status', $_GET['status']);
        }

        $return_requests = $return_requests->paginate(25);

        return view('backend.return-request.list', compact('return_requests'));
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();

        $return_request = ReturnRequest::findOrFail($id);

        if ($user->role == 1) { // Admin sees all products
            $returning_products = $return_request->returningProducts;
        } else { // Vendor sees only their products
            $vendor = Vendor::where('user_id', $user->id)->first();

            $returning_products = $return_request->returningProducts()->where('vendor_id', $vendor->id)->get();
        }

        $order = $return_request->order;

        return view('backend.return-request.details', compact('return_request', 'returning_products', 'order'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $vendor = $user->role == 2 ? $user->vendor : null;


        foreach ($request->returning_product_id as $key => $returning_product_id) {
            $product = ReturningProduct::findOrFail($returning_product_id);

            // Admin can update all, Vendor only their products
            if ($user->role == 1 || ($user->role == 2 && $product->vendor_id == $vendor->id)) {
                $product->status = $request->status[$key] ?? $product->status;
                $product->save();
            }
        }

        // Admin can update overall return request status
        if (($user->role == 1 || $vendor) && isset($request->return_request_status)) {
            $return_request = ReturnRequest::findOrFail($request->request_id);
            $return_request->status = $request->return_request_status;
            $return_request->save();
        }

        return back()->with('message', 'Return request updated successfully');
    }
}
