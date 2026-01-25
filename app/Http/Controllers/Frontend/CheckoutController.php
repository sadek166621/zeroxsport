<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\District;
use App\Models\Shipping;
use App\Models\Upazilla;
use App\Models\Affiliate;
use App\Models\AccountHead;
use App\Models\OrderDetail;
use App\Models\SmsTemplate;
use App\Models\VendorOrder;
use App\Utility\SmsUtility;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\AccountLedger;
use Illuminate\Support\Carbon;
use App\Utility\SendSMSUtility;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Frontend\BkashController;
use App\Http\Controllers\Frontend\NagadController;
use App\Http\Controllers\Frontend\AamarpayController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PublicSslCommerzPaymentController;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!guest_checkout() && !auth()->check()){
        //     return redirect()->route('login');
        // }
        $user = Auth::user();
        if (!$user) {
            $addresses = Address::where('status', 1)->get();
            $shippings = Shipping::where('status', 1)->get();

            $carts = Cart::content();
            if (count($carts) == 0) {
                //            return back()->with('message', 'Cart is Empty!!');
                return redirect()->route('cart.show');
            }

            $cartTotal = Cart::total();
            //   dd($cartTotal);
            return view('FrontEnd.checkout.index', compact('addresses', 'shippings', 'carts', 'cartTotal'));
        }
        if (($user->role == "3" || $user->role == "4")) {
            $addresses = Address::where('status', 1)->get();
            $shippings = Shipping::where('status', 1)->get();

            $carts = Cart::content();
            if (count($carts) == 0) {
                //            return back()->with('message', 'Cart is Empty!!');
                return redirect()->route('cart.show');
            }

            $cartTotal = Cart::total();
            return view('FrontEnd.checkout.index', compact('addresses', 'shippings', 'carts', 'cartTotal'));
        }

        if ($user->role == "5") {
            $addresses = Address::where('status', 1)->get();
            $shippings = Shipping::where('status', 1)->get();

            $carts = Cart::content();
            if (count($carts) == 0) {
                //            return back()->with('message', 'Cart is Empty!!');
                return redirect()->route('cart.show');
            }

            $cartTotal = Cart::total();
            return view('wholeseller.wholeseller_checkout', compact('addresses', 'shippings', 'carts', 'cartTotal'));
        }




        // $cartTotal = Cart::total();
        // if(Auth::user() && Auth::user()->role == 3){
        //     return view('FrontEnd.checkout.index',compact('addresses','shippings', 'carts', 'cartTotal'));
        // }
        // else{
        //     return redirect()->route('login');
        // }

    } // end method

    public function shippingAjax($shipping_id)
    {
        $shipping = Shipping::find($shipping_id);

        $carts = Cart::content();
        $productIds = $carts->pluck('id');

        // Vendor product count বের করা
        $vendorCount = \App\Models\Product::whereIn('id', $productIds)
            ->whereNotNull('vendor_id') // vendor_id থাকলে vendor product ধরা হবে
            ->distinct('vendor_id')
            ->count('vendor_id');

        return response()->json([
            'shipping' => $shipping,
            'product_ids' => $productIds,
            'vendor_count' => $vendorCount
        ]);
    }


    /* ============== Start GetCheckoutProduct Method ============= */
    public function getCheckoutProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    } //end method
    /* ============= End GetCheckoutProduct Method ============== */

    /* ============= Start getdivision Method ============== */
    public function getdivision()
    {
        $division = District::where('division_id', $_GET['division_id'])->orderBy('district_name_en', 'ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla()
    {
        $upazilla = Upazilla::where('district_id', $_GET['district_id'])->orderBy('name_en', 'ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */



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


        //  dd($request->all());
        $request->validate([
            'name'    => 'required|max:191',
            'email'   => 'nullable|email|max:191',
            'phone'   => ['required', 'regex:/^(?:\+88|88)?01[3-9]\d{8}$/'],
            'address' => 'required|max:10000',
        ]);

        $carts = Cart::content();

        if ($carts->isEmpty()) {
            return redirect()->route('home')->with([
                'message'    => 'Your cart is empty.',
                'alert-type' => 'error'
            ]);
        }

        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            [
                'name'     => $request->name,
                'username' => $request->name,
                'email'    => $request->email,
                'address'  => $request->address,
                'password' => Hash::make($request->phone),
                'role'     => 3,
                'status'   => 1
            ]
        );

        Auth::login($user);

        // $payment_status = in_array($request->payment_option, ['cod', 'wallet']) ? 0 : 1;

        $lastOrder  = Order::latest('id')->first();
        $invoice_no = $lastOrder ? str_pad($lastOrder->id + 1, 7, '0', STR_PAD_LEFT) : '0000001';

        $affiliateId = session('affiliate_ref')
            ? Affiliate::where('referral_code', session('affiliate_ref'))->value('id')
            : null;

        $paymentScreenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $file = $request->file('payment_screenshot');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/payment_screenshot/'), $filename);
            $paymentScreenshotPath = 'uploads/payment_screenshot/' . $filename;
        }

        // Calculate unique vendors & shipping cost per vendor
        $uniqueVendorIds = collect();
        foreach ($carts as $cart) {
            $product = Product::find($cart->id);
            if ($product && $product->vendor_id) {
                $uniqueVendorIds->push($product->vendor_id);
            }
        }
        $uniqueVendorIds   = $uniqueVendorIds->unique();
        $vendorCount       = $uniqueVendorIds->count();
        $shippingPerVendor = $vendorCount ? ($request->shipping_charge / $vendorCount) : 0;
        $isVendorOrder = $vendorCount > 0 ? 1 : 0;

        // Variables for totals
        $vendorData             = [];
        $orderSubTotal          = 0;
        $orderGrandTotal        = 0;
        $totalAffiliateCommission = 0;

        $order = Order::create([
            'user_id'           => Auth::id(),
            'affiliate_id'      => $affiliateId,
            'name'              => $request->name,
            'sub_total'         => 0,
            'grand_total'       => 0,
            'affiliate_commission' => 0,
            'shipping_charge'   => $request->shipping,
            'shipping_name'     => $request->shipping_name,
            'shipping_type'     => $request->shipping_type,
            'payment_method'    => $request->payment_option,
            'payment_number'  => $request->payment_number,
            'transaction_id'  => $request->transaction_id,
            'payment_amount'    => $request->payment_amount,
            'payment_screenshot'    => $paymentScreenshotPath,
            'payment_status'    => 0,
            'invoice_no'        => $invoice_no,
            'delivery_status'   => 0,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'division_id'       => $request->division_id,
            'district_id'       => $request->district_id,
            'upazilla_id'       => $request->upazilla_id,
            'address'           => $request->address,
            'comment'           => $request->comment,
            'coupon'            => Session::get('amount') ?: 0,
            'type'              => 1,
            'is_vendor_order'   => $isVendorOrder
        ]);



        // Process cart items
        foreach ($carts as $cart) {
            $product = Product::find($cart->id);
            if (!$product) {
                continue;
            }

            $vendor_id = $product->vendor_id; // null হলে null থাকবে

            $sub   = $cart->qty * $cart->price;
            $tax   = $cart->tax ?? 0;
            $grand = $sub + $tax;

            $orderSubTotal   += $sub;
            $orderGrandTotal += $grand;

            // শুধু যদি actual vendor থাকে তাহলে VendorOrder data collect করো
            if ($vendor_id) {  // ← এখানে চেক যোগ করো (null হলে skip)
                if (!isset($vendorData[$vendor_id])) {
                    $vendorData[$vendor_id] = [
                        'order_id'      => $order->id,
                        'vendor_id'     => $vendor_id,
                        'subtotal'      => 0,
                        'grand_total'   => 0,
                        'shipping_cost' => $shippingPerVendor,
                    ];
                }

                $vendorData[$vendor_id]['subtotal']    += $sub;
                $vendorData[$vendor_id]['grand_total'] += $grand;
            }

            // Affiliate commission (আগের fix অনুযায়ী)
            if ($affiliateId && $product->is_affiliate == 1) {
                $commissionData = $product->product_affiliate_commission;
                $amount         = $commissionData['amount'] ?? 0;
                $type           = $commissionData['type'] ?? null;

                if ($amount > 0 && $type) {
                    $earning = $type === 'percentage'
                        ? ($sub * $amount) / 100
                        : $amount * $cart->qty;

                    $totalAffiliateCommission += $earning;
                }
            }
        }

        // Create VendorOrder records
        $vendorOrderIds = [];
        foreach ($vendorData as $vendor_id => $data) {
            $vendorOrder = VendorOrder::create([
                'order_id'         => $data['order_id'],
                'invoice_no'       => $invoice_no,
                'vendor_id'        => $vendor_id ?? null,
                'affiliate_id'     => $affiliateId,
                'subtotal'         => $data['subtotal'],
                'shipping_cost'    => $data['shipping_cost'],
                'discount'         => 0,
                'coupon_discount'  => 0,
                'grand_total'      => $data['grand_total'] + $data['shipping_cost'],
                'commission'       => 0,
                'payment_status'   => 0,
                'delivery_status'  => 0,
            ]);

            $vendorOrderIds[$vendor_id] = $vendorOrder->id;
        }

        // Create OrderDetail records & update stock
        foreach ($carts as $cart) {
            $product   = Product::find($cart->id);
            $vendor_id = $product->vendor_id ?? null;

            $variation = null;
            if (!empty($cart->options->is_varient)) {
                $tmp = [];
                for ($i = 0; $i < count($cart->options->attribute_names ?? []); $i++) {
                    $tmp[] = [
                        'attribute_name'  => $cart->options->attribute_names[$i],
                        'attribute_value' => $cart->options->attribute_values[$i],
                    ];
                }
                $variation = json_encode($tmp);
            }

            OrderDetail::create([
                'order_id'              => $order->id,
                'vendor_order_id'       => $vendorOrderIds[$vendor_id] ?? null,
                'product_id'            => $cart->id,
                'vendor_id'             => $vendor_id ?? null,
                'product_name'          => $cart->name,
                'invoice_no'            => $order->invoice_no,
                'is_varient'            => $cart->options->is_varient ?? 0,
                'variation'             => $variation,
                'qty'                   => $cart->qty,
                'price'                 => $cart->price,
                'tax'                   => $cart->tax ?? 0,
                'payment_status'        => 0,
                'delivery_status'       => 0,
                'shipping_type'         => $cart->options->shipping_type ?? null,
                'pickup_point_id'       => $cart->options->pickup_point_id ?? null,
                'product_referral_code' => $cart->options->product_referral_code ?? null,
            ]);

            // Update stock
            if (!empty($cart->options->is_varient)) {
                $stock = ProductStock::where('product_id', $product->id)
                    ->where('varient', $cart->options->varient)
                    ->first();
                if ($stock) {
                    $stock->qty = max(0, $stock->qty - $cart->qty);
                    $stock->save();
                }
            } else {
                $product->stock_qty = max(0, $product->stock_qty - $cart->qty);
                $product->save();
            }
        }

        // Final order totals update
        $order->update([
            'sub_total'            => $orderSubTotal,
            'grand_total'          => $orderGrandTotal + $request->shipping_charge - (Session::get('amount') ?: 0),
            'affiliate_commission' => round($totalAffiliateCommission, 2),

        ]);

        // dd($request->sub_total, $totalAffiliateCommission,);

        //   Clear cart & session data
        Cart::destroy();
        Session::forget(['couponCode', 'discountType', 'amount', 'affiliate_ref']);

        // return redirect()->route('checkout.success', $order->invoice_no)->with([
        //     'message'    => 'Order placed successfully',
        //     'alert-type' => 'success'
        // ]);

        return response()->json([
            'success' => true,
            'invoice_no' => $order->invoice_no,
            'redirect_url' => route('checkout.success', $order->invoice_no),
        ]);
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('invoice_no', $id)->first();

        $notification = array(
            'message' => 'Your Order Successfully.',
            'alert-type' => 'success'
        );

        return view('FrontEnd.order.order_view', compact('order'))->with($notification);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function Myorders(){

    //     $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    //     return view('frontend.user.order.order_view',compact('orders'));

    // }

    public function payment(Request $request)
    {
        // dd($request->payment_option);
        // dd($request);
        if ($request->payment_option == 'cod' || $request->payment_option == 'wallet') {
            $checkout = new CheckoutController;
            return $checkout->store($request);
        }

        $payment_method = $request->payment_option;
        $total_amount = Cart::total();
        $last_order = Order::orderBy('id', 'DESC')->first();
        $order_id = $last_order->id + 1;
        $invoice_no = date('YmdHi') . $order_id;
        Session::put('invoice_no', $invoice_no);

        // dd('oks');

        // if ($request->payment_option == 'cod' || $request->payment_option == 'wallet') {
        //     return redirect()->route('checkout.store');
        // } else {
        //     // dd('ss');
        //     Session::put('payment_method', $request->payment_option);
        //     Session::put('payment_type', 'cart_payment');
        //     Session::put('payment_amount', $total_amount);
        //     // dd('ok');
        //     if ($request->payment_option == 'nagad') {
        //         $nagad = new NagadController;
        //         return $nagad->getSession();
        //     } else if ($request->payment_option == 'bkash') {
        //         // dd('okb');
        //         $bkash = new BkashController;
        //         return $bkash->pay();
        //     } elseif ($request->payment_option == 'sslcommerz') {
        //         $sslcommerz = new PublicSslCommerzPaymentController;
        //         return $sslcommerz->index($request);
        //     } elseif ($payment_method == 'aamarpay') {
        //         $aamarpay = new AamarpayController;
        //         return $aamarpay->index();
        //     }
        // }

        Session::forget('couponCode');
        Session::forget('discountType');
        Session::forget('amount');
        Session::forget('status');

        return view('FrontEnd.checkout.payment', compact('payment_method', 'total_amount', 'invoice_no'));
    }

    public function success($orderId, $json)
    {

        json_decode($json);
    }
}
