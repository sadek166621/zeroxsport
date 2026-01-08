<?php

namespace App\Http\Controllers\Vendor;

use PDF;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\VendorOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = VendorOrder::query();

        $delivery_status = $request->delivery_status;
        $payment_status = $request->payment_status;
        $date = $request->date;

        if ($request->filled('delivery_status')) {
            $orders->where('delivery_status', $delivery_status);
        }

        if ($request->filled('payment_status')) {
            $orders->where('payment_status', $payment_status);
        }

        if ($request->filled('date')) {
            [$start, $end] = explode(' - ', $date);

            $orders->whereBetween('created_at', [
                \Carbon\Carbon::parse($start)->startOfDay(),
                \Carbon\Carbon::parse($end)->endOfDay(),
            ]);
        }

        $orders = $orders->orderBy('id', 'desc')->paginate(15);

        return view(
            'backend.vendor.orders.index',
            compact('orders', 'delivery_status', 'payment_status', 'date')
        );
    }

    public function pendingOrder(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
        $orders = VendorOrder::where('vendor_id', $vendor->id)->where('delivery_status', 0)->get();
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

        $orders = $orders->paginate(15);
        return view('backend.vendor.orders.pending', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }
    public function completedOrder(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
        $orders = VendorOrder::where('vendor_id', $vendor->id)->where('delivery_status', 4)->get();
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

        $orders = $orders->paginate(15);
        return view('backend.vendor.orders.completed', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }

    public function cancelledOrder(Request $request)
    {
        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
        $orders = VendorOrder::query();

        $delivery_status = $request->delivery_status;
        $payment_status = $request->payment_status;
        $date = $request->date;

        // Force canceled orders (delivery_status = 5)
        $orders->where('delivery_status', 5);

        // If payment status filter is applied
        if ($request->filled('payment_status')) {
            $orders->where('payment_status', $payment_status);
        }

        // If date filter is applied
        if ($request->filled('date')) {
            [$start, $end] = explode(' - ', $date);

            $orders->whereBetween('created_at', [
                \Carbon\Carbon::parse($start)->startOfDay(),
                \Carbon\Carbon::parse($end)->endOfDay(),
            ]);
        }

        $orders = $orders->orderBy('id', 'desc')->paginate(15);


        return view('backend.vendor.orders.cancelled', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }

    public function vendorOrdershow($id)
    {
        //        return AccountLedger::latest()->first();
        $order = VendorOrder::findOrFail($id);

        return view('backend.vendor.orders.details', compact('order'));
    }

    public function vendorOrdersUpdate(Request $request, $id)
    {
        // dd($request->all());
        //        return $request;
        $this->validate($request, [
            'delivery_status' => 'required',
        ]);
        $order = VendorOrder::findOrFail($id);


        VendorOrder::where('id', $id)->update([
            'delivery_status'   => $request->delivery_status,
        ]);

        $order->save();

        Session::flash('success', 'Admin Orders Information Updated Successfully');
        return redirect()->back();
    }

    public function vendorinvoiceDownload($id)
    {
        $order = VendorOrder::findOrFail($id);

        //dd(app('url')->asset('upload/abc.png'));
        $pdf = PDF::loadView('backend.vendor.orders.invoices', compact('order'))->setPaper('a4');
        return $pdf->download('vendor_invoice.pdf');
    }


    public function salesReport()
    {
        return view('backend.vendor.reports.salesReport');
    }

        public function details($id)
    {
        $order = VendorOrder::find($id);
        return view('backend.vendor.reports.details', compact('order'));
    }

 
}
