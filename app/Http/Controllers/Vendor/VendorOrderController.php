<?php

namespace App\Http\Controllers\Vendor;

use App\Models\VendorOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorOrderController extends Controller
{
    public function index(Request $request){
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;
        if ($request->delivery_status != null && $request->payment_status != null && $date != null) {

            $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
        } else if ($request->delivery_status == null && $request->payment_status == null && $date == null) {
            $orders = VendorOrder::orderBy('id', 'desc');
        } else {
            if ($request->delivery_status == null) {
                if ($request->payment_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else if ($request->payment_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            } else if ($request->payment_status == null) {
                if ($request->delivery_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                } else if ($request->delivery_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            } else if ($request->date == null) {
                if ($request->delivery_status != null && $request->payment_status != null) {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                } else if ($request->delivery_status == null && $request->payment_status != null) {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        //dd($request);

        $orders = $orders->paginate(15);
        return view('backend.vendor.orders.index', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }
public function pendingOrder(Request $request){
    $orders = VendorOrder::where('vendor_id', auth()->user()->vendor->id)->where('delivery_status', 0)->get();
      $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

  

        if ($request->delivery_status != null && $request->payment_status != null && $date != null) {

            $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
        } else if ($request->delivery_status == null && $request->payment_status == null && $date == null) {
            $orders = Order::orderBy('id', 'desc');
        } else {
            if ($request->delivery_status == null) {
                if ($request->payment_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else if ($request->payment_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            } else if ($request->payment_status == null) {
                if ($request->delivery_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                } else if ($request->delivery_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            } else if ($request->date == null) {
                if ($request->delivery_status != null && $request->payment_status != null) {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                } else if ($request->delivery_status == null && $request->payment_status != null) {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        $orders = $orders->paginate(15);
        return view('backend.vendor.orders.pending', compact('orders', 'delivery_status', 'date', 'payment_status'));
   
}
public function completedOrder(Request $request){
     $orders = VendorOrder::where('vendor_id', auth()->user()->vendor->id)->where('delivery_status', 4)->get();
      $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

  

        if ($request->delivery_status != null && $request->payment_status != null && $date != null) {

            $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
        } else if ($request->delivery_status == null && $request->payment_status == null && $date == null) {
            $orders = Order::orderBy('id', 'desc');
        } else {
            if ($request->delivery_status == null) {
                if ($request->payment_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else if ($request->payment_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            } else if ($request->payment_status == null) {
                if ($request->delivery_status != null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                } else if ($request->delivery_status == null && $date != null) {
                    $orders = VendorOrder::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            } else if ($request->date == null) {
                if ($request->delivery_status != null && $request->payment_status != null) {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                } else if ($request->delivery_status == null && $request->payment_status != null) {
                    $orders = VendorOrder::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else {
                    $orders = VendorOrder::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        $orders = $orders->paginate(15);
    return view('backend.vendor.orders.completed', compact('orders'));
}
public function cancelledOrder(){
    $orders = VendorOrder::where('vendor_id', auth()->user()->vendor->id)->where('delivery_status', 5)->get();
    return view('vendor.orders.cancelled', compact('orders'));
}


    public function salesReport(){
        return view('vendor.salesReport');
    }
}
