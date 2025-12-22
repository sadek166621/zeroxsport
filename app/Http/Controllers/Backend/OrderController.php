<?php

namespace App\Http\Controllers\Backend;

use PDF;
use Session;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Address;
use App\Models\Product;
use App\Models\District;

use App\Models\Shipping;
use App\Models\Upazilla;
use App\Models\Affiliate;
use App\Models\OrderDetail;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\AccountLedger;
use App\Models\VendorComission;
use App\Models\VendorTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\VarDumper\Dumper\esc;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

        //dd($request);

        //$orders = Order::orderBy('id', 'desc');

        // if ($request->delivery_status != null) {
        //     $orders = $orders->where('delivery_status', $request->delivery_status);
        //     // dd($orders);
        //     $delivery_status = $request->delivery_status;
        // }

        // if ($request->payment_status != null) {
        //     $orders = $orders->where('payment_status', $request->payment_status);
        //     $payment_status = $request->payment_status;
        // }

        // if ($date != null) {
        //     $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
        // }

        if ($request->delivery_status != null && $request->payment_status != null && $date != null) {

            $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
        } else if ($request->delivery_status == null && $request->payment_status == null && $date == null) {
            $orders = Order::orderBy('id', 'desc');
        } else {
            if ($request->delivery_status == null) {
                if ($request->payment_status != null && $date != null) {
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else if ($request->payment_status == null && $date != null) {
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = Order::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            } else if ($request->payment_status == null) {
                if ($request->delivery_status != null && $date != null) {
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                } else if ($request->delivery_status == null && $date != null) {
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])));
                } else {
                    $orders = Order::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            } else if ($request->date == null) {
                if ($request->delivery_status != null && $request->payment_status != null) {
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                } else if ($request->delivery_status == null && $request->payment_status != null) {
                    $orders = Order::where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else {
                    $orders = Order::where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        //dd($request);

        $orders = $orders->paginate(15);
        return view('backend.sales.all_orders.index', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }

    public function allWholesellOrders(Request $request)
    {
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

        // Base query — only orders with wholesale products
        $orders = Order::whereHas('order_details.product', function ($q) {
            $q->where('is_wholesell', 1);
        });

        // Apply filters step by step — keeping your original logic
        if ($request->delivery_status != null && $request->payment_status != null && $date != null) {

            $orders = $orders->whereBetween('created_at', [
                date('Y-m-d', strtotime(explode(" - ", $date)[0])),
                date('Y-m-d', strtotime(explode(" - ", $date)[1]))
            ])
                ->where('delivery_status', $request->delivery_status)
                ->where('payment_status', $request->payment_status);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;
        } elseif ($request->delivery_status == null && $request->payment_status == null && $date == null) {

            $orders = $orders->orderBy('id', 'desc');
        } else {

            if ($request->delivery_status == null) {
                if ($request->payment_status != null && $date != null) {

                    $orders = $orders->whereBetween('created_at', [
                        date('Y-m-d', strtotime(explode(" - ", $date)[0])),
                        date('Y-m-d', strtotime(explode(" - ", $date)[1]))
                    ])->where('payment_status', $request->payment_status);

                    $payment_status = $request->payment_status;
                } elseif ($request->payment_status == null && $date != null) {

                    $orders = $orders->whereBetween('created_at', [
                        date('Y-m-d', strtotime(explode(" - ", $date)[0])),
                        date('Y-m-d', strtotime(explode(" - ", $date)[1]))
                    ]);
                } else {

                    $orders = $orders->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                }
            } elseif ($request->payment_status == null) {

                if ($request->delivery_status != null && $date != null) {

                    $orders = $orders->whereBetween('created_at', [
                        date('Y-m-d', strtotime(explode(" - ", $date)[0])),
                        date('Y-m-d', strtotime(explode(" - ", $date)[1]))
                    ])->where('delivery_status', $request->delivery_status);

                    $delivery_status = $request->delivery_status;
                } elseif ($request->delivery_status == null && $date != null) {

                    $orders = $orders->whereBetween('created_at', [
                        date('Y-m-d', strtotime(explode(" - ", $date)[0])),
                        date('Y-m-d', strtotime(explode(" - ", $date)[1]))
                    ]);
                } else {

                    $orders = $orders->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            } elseif ($request->date == null) {

                if ($request->delivery_status != null && $request->payment_status != null) {

                    $orders = $orders->where('delivery_status', $request->delivery_status)
                        ->where('payment_status', $request->payment_status);

                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                } elseif ($request->delivery_status == null && $request->payment_status != null) {

                    $orders = $orders->where('payment_status', $request->payment_status);
                    $payment_status = $request->payment_status;
                } else {

                    $orders = $orders->where('delivery_status', $request->delivery_status);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        // Final paginated results
        $orders = $orders->orderBy('id', 'desc')->paginate(15);

        return view('backend.sales.all_wholesell_orders', compact('orders', 'delivery_status', 'date', 'payment_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        return AccountLedger::latest()->first();
        $order = Order::findOrFail($id);
        $shippings = Shipping::where('status', 1)->get();

        return view('backend.sales.all_orders.show', compact('order', 'shippings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        return $request;
        $this->validate($request, [
            'payment_method' => 'required',
        ]);
        $order = Order::findOrFail($id);

        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->upazilla_id = $request->upazilla_id;
        $order->payment_method = $request->payment_method;
        //        $order->payment_status = $request->status;

        $discount_total = ($order->sub_total - $request->discount);
        $total_ammount = ($discount_total + $request->shipping_charge);

        Order::where('id', $id)->update([
            'shipping_charge'   => $request->shipping_charge,
            'discount'          => $request->discount,
            'grand_total'       => $total_ammount,
        ]);

        $order->save();

        Session::flash('success', 'Admin Orders Information Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        $notification = array(
            'message' => 'Order Deleted Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    /*================= Start update_payment_status Methoed ================*/
    public function update_payment_status(Request $request)
    {

        $commission_rate = get_setting('commission_rate')->value;
        //  dd($commission_rate);
        $order = Order::findOrFail($request->order_id);
        $affiliateId = $order->affiliate_id;
        $order->payment_status = $request->status;

        if ($order->payment_status == 1) {
            $affiliate = Affiliate::find($affiliateId);
            if ($affiliate) {
                $affiliate->total_earning += $order->sub_total * ($commission_rate / 100);
                $affiliate->save();
            }

            if ($order->payment_method == 'wallet') {
                $user = User::find($order->user_id);
                $user->points -= $order->grand_total;
                $user->save();
            }
        }

        $order->save();
        if ($order->user_id != 1) {
            $this->addOrRemovePoints($request->order_id);
        }

        return response()->json(['success' => 'Payment status has been updated']);

        // dd($order);
    }
    public function addOrRemovePoints($id)
    {
        $order = Order::findOrFail($id);
        $user = User::findOrfail($order->user_id);
        if ($user->role == 3) {
            $orderedProducts = OrderDetail::where('order_id', $order->id)->get();
            $point = 0;
            foreach ($orderedProducts as $item) {
                $point += $item->product->points * $item->qty;
            }
            if ($order->payment_status == 1) {
                $user->points += $point;
            } else {
                $user->points -= $point;
            }
            $user->save();
        }
    }

    /*================= Start update_delivery_status Methoed ================*/
    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_status = $request->status;
        $order->save();
        if ($order->user_id != 1) {
            $this->addOrRemoveCommission($request->order_id);
        }
        if ($order->delivery_status == 'cancelled') {
            $this->deductAdminBalance($order->id, $order->grand_total);
            $this->addStock($order->id);
        }

        return response()->json(['success' => 'Delivery status has been updated']);
    }

    public function addOrRemoveCommission($id)
    {

        $orderedProducts = OrderDetail::where('order_id', $id)->get();
        $order = Order::findOrFail($id);

        foreach ($orderedProducts as $item) {
            if ($item->product->vendor_id != 0) {
                $vendor = Vendor::findOrFail($item->product->vendor_id);
                if ($vendor->commission != 0) {
                    if ($vendor->comission_type == 2)
                        $adminCommission = ($item->qty * $item->price) * ($vendor->commission / 100);
                    else {
                        $adminCommission = ($item->qty * $item->price) - $vendor->commission;
                    }
                    $vendorCommission = ($item->qty * $item->price) - $adminCommission;
                    $transaction = VendorTransaction::where('invoice_no', $order->invoice_no)->where('add_amount', '!=', null)->first();
                    if (!$transaction) {
                        if ($order->delivery_status == 'delivered') {
                            $vendor->balance += $vendorCommission;

                            $commission = new VendorComission();
                            $commission->order_id = $id;
                            $commission->vendor_id = $vendor->id;
                            $commission->vendor_amount = $vendorCommission;
                            $commission->admin_commission = $adminCommission;
                            $commission->month = date('m');
                            $commission->year = date('Y');
                            $commission->save();

                            $transaction = new VendorTransaction();
                            $transaction->vendor_id = $vendor->id;
                            $transaction->add_amount = $vendorCommission;
                            $transaction->invoice_no = $order->invoice_no;
                            $transaction->month = date('m');
                            $transaction->year = date('Y');
                            $transaction->status = 1;

                            $transaction->save();
                        }
                    } elseif ($transaction != null) {
                        if ($order->delivery_status == 'cancelled') {
                            $vendor->balance -= $vendorCommission;
                            VendorComission::where('order_id', $id)->delete();

                            $transaction = new VendorTransaction();
                            $transaction->vendor_id = $vendor->id;
                            $transaction->deduct_amount = $vendorCommission;
                            $transaction->invoice_no = $order->invoice_no;
                            $transaction->month = date('m');
                            $transaction->year = date('Y');
                            $transaction->status = 3;
                            $transaction->save();
                        }
                    }

                    $vendor->save();
                }
            }
        }
    }

    public function deductAdminBalance($id, $grandTotal)
    {

        $prev_balance = AccountLedger::orderBy('id', 'desc')->first();


        $account_ledger = new AccountLedger();
        $account_ledger->account_head_id = 22;
        $account_ledger->particulars = 'Order-' . $id . 'Cancellation';
        $account_ledger->type = 1;
        $account_ledger->order_id = $id;
        $account_ledger->debit = $grandTotal;
        $account_ledger->balance = $prev_balance->balance - $grandTotal;

        $account_ledger->save();
    }

    public function addStock($id)
    {
        $orders = OrderDetail::where('order_id', $id)->get();

        foreach ($orders as $product) {

            $item = Product::find($product->product_id);
            if ($item->is_varient) {
                $data = json_decode($product->variation);
                $text = '';
                for ($i = 0; $i < count($data); $i++) {
                    if ($i == 0) {
                        $text = $data[$i]->attribute_value;
                    } else {
                        $text = $text . '-' . $data[$i]->attribute_value;
                    }
                }
                $stock = ProductStock::where('product_id', $product->product_id)->where('varient', $text)->first();
                if ($stock) {
                    $stock->qty = ($stock->qty + $product->qty);
                    $stock->save();
                }
            } else {
                $item->stock_qty += $product->qty;
                $item->save();
            }
        }
    }



    /*================= Start admin_user_update Methoed ================*/
    public function admin_user_update(Request $request, $id)
    {
        $user = Order::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // dd($user);

        Session::flash('success', 'Customer Information Updated Successfully');
        return redirect()->back();
    }

    /* ============= Start getdivision Method ============== */
    public function getdivision($division_id)
    {
        $division = District::where('division_id', $division_id)->orderBy('district_name_en', 'ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla($district_id)
    {
        $upazilla = Upazilla::where('district_id', $district_id)->orderBy('name_en', 'ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */

    /* ============= Start invoice_download Method ============== */
    // public function invoice_download($id){
    //     $order = Order::findOrFail($id);

    //     $pdf = PDF::loadView('backend.invoices.invoice',compact('order'))->setPaper('a4')->setOptions([
    //             'tempDir' => public_path(),
    //             'chroot' => public_path(),
    //     ]);
    //     return $pdf->download('invoice.pdf');
    // } // end method

    /* ============= Start invoice_download Method ============== */
    public function invoice_download($id)
    {
        $order = Order::findOrFail($id);
        //dd(app('url')->asset('upload/abc.png'));
        $pdf = PDF::loadView('backend.invoices.invoice', compact('order'))->setPaper('a4');
        return $pdf->download('invoice.pdf');
    } // end method
    /* ============= End invoice_download Method ============== */


  public function pendingOrders()
{
    $user = Auth::guard('admin')->user();

    if ($user->role == '2') {
        $vendor = Vendor::where('user_id', $user->id)->first();

        $orders = OrderDetail::where('delivery_status', 'pending')
            ->where('vendor_id', $vendor->id) // 
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('backend.sales.all_orders.pending_orders', compact('orders'));
    }

    // Admin হলে সব pending orders দেখাবে (vendor_id null বা সব)
    if ($user->role == '1') {
        $orders = OrderDetail::where('delivery_status', 'pending')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('backend.sales.all_orders.pending_orders', compact('orders'));
    }

    // অন্য কোনো role থাকলে empty result
    return view('backend.sales.all_orders.pending_orders', ['orders' => collect()]);
}
}
