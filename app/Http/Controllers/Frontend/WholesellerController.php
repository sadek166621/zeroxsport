<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductStock;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;

class WholesellerController extends Controller
{
    public function showRegisterForm()
    {
        return view('wholeseller.wholeseller_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/(\+){0,1}(88){0,1}01(3|4|5|6|7|8|9)(\d){8}/', 'min:11', 'max:15'],
            'address' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 5,
        ]);

        Auth::login($user);
        return redirect()->route('wholeseller.dashboard')->with('success', 'Welcome Wholeseller!');
    }

    public function showLoginForm()
    {
        return view('wholeseller.wholeseller_login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login using default 'web' guard
        if (Auth::guard('web')->attempt($credentials)) {

            // Check if logged in user is wholeseller (role = 5)
            if (Auth::guard('web')->user()->role == 5) {
                $notification = [
                    'message' => 'Wholeseller Login Successfully.',
                    'alert-type' => 'success'
                ];

                return redirect()->route('wholeseller.dashboard')->with($notification);
            } else {
                // Logout if not wholeseller
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $notification = [
                    'message' => 'Invalid credentials or unauthorized role.',
                    'alert-type' => 'error'
                ];

                return back()->with($notification);
            }
        } else {
            $notification = [
                'message' => 'Invalid Email or Password.',
                'alert-type' => 'error'
            ];

            return back()->with($notification);
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $total_purchase = Order::where('user_id', $user->id)->sum('grand_total');
        $pending_orders = Order::where('user_id', $user->id)->where('delivery_status', 'pending')->get();
        $wholesell_products = Product::where('is_wholesell', 1)->latest()->get();

        return view('wholeseller.dashboard', compact('wholesell_products', 'orders', 'total_purchase', 'pending_orders'));
    }

    // public function myOrders()
    // {
    //     $user = Auth::user();
    //     $orders = Order::where('user_id', $user->id)->get();
    //     $total_purchase = Order::where('user_id', $user->id)->sum('grand_total');
    //     $completed_orders = Order::where('user_id', $user->id)->where('delivery_status', 'delivered')->get();
    //     $pending_orders = Order::where('user_id', $user->id)->where('delivery_status', 'pending')->get();
    //     return view('wholeseller.my-order', compact('orders', 'completed_orders', 'pending_orders', 'total_purchase'));
    // }

    public function myOrders(Request $request)
    {
        $user = Auth::user();

        // Base query for this wholeseller’s orders
        $query = Order::with(['order_details.product'])
            ->where('user_id', $user->id);

        // 🔍 Search filter (order ID, product name, or customer name)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('invoice_no', 'LIKE', "%{$search}%")
                    ->orWhereHas('order_details.product', function ($sub) use ($search) {
                        $sub->where('name_en', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($sub) use ($search) {
                        $sub->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        // 🎯 Status filter
        if ($request->filled('status')) {
            $query->where('delivery_status', $request->status);
        }

        // 📅 Date filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // 🧾 Fetch all matching orders
        // $orders = $query->orderBy('id', 'desc')->get();
        $orders = $query->orderBy('id', 'desc')->paginate(5);

        // 📊 Summary stats (these should not be filtered)
        $total_purchase = Order::where('user_id', $user->id)->sum('grand_total');
        $completed_orders = Order::where('user_id', $user->id)
            ->where('delivery_status', 'delivered')->count();
        $pending_orders = Order::where('user_id', $user->id)
            ->where('delivery_status', 'pending')->count();

        return view('wholeseller.my-order', compact(
            'orders',
            'completed_orders',
            'pending_orders',
            'total_purchase'
        ));
    }

    public function orderView($invoice_no)
    {
        // $order = Order::where('user_id',Auth::id())->orderBy('id','DESC')->first();
        $order = Order::where('invoice_no', $invoice_no)->first();
        // $orders = Order::with('address_id')->where('id',$id)->where('user_id',Auth::id())->first();
        return view('wholeseller.order_view', compact('order'));
    }


    // public function orderDownload($invoice_no)
    // {
    //     $order =  Order::where('invoice_no', $invoice_no)->first();
    //     $pdf = PDF::loadView('wholeseller.order_invoice_pdf', compact('order'));

    //     return $pdf->stream('Invoice-'.$order->invoice_no.'.pdf');
    // }

    public function orderInvoicePDF($invoice_no)
    {
        $order = Order::where('invoice_no', $invoice_no)->firstOrFail(); // safer with firstOrFail
        $pdf = PDF::loadView('FrontEnd.order.order_confirmed', compact('order'));

        // Force download
        return $pdf->download('Invoice-' . $order->invoice_no . '.pdf');
    }


    public function productEdit()
    {
        $user = Auth::user();
        return view('wholeseller.profile_edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

       if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/wholesellers'), $imageName);

            // Delete old image if exists
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }

            $user->profile_image = 'upload/wholesellers/' . $imageName;
        }

        // Update fields
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with([
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function productDetails()
    {
        $user = Auth::user();
        return view('wholeseller.profile-details',compact('user'));
    }
    public function changePassword()
    {

        return view('wholeseller.change-password');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = [
            'message' => 'Logged out successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('wholeseller.login')->with($notification);
    }

    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . $user->id,
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'phone' => 'required|string|max:20',
    //         'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);

    //     // Handle image upload
    //     if ($request->hasFile('profile_image')) {
    //         $image = $request->file('profile_image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('upload/wholesellers'), $imageName);

    //         // Delete old image if exists
    //         if ($user->profile_image && file_exists(public_path($user->profile_image))) {
    //             unlink(public_path($user->profile_image));
    //         }

    //         $user->profile_image = 'upload/wholesellers/' . $imageName;
    //     }

    //     // Update other fields
    //     $user->name = $request->name;
    //     $user->username = $request->username;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->save();

    //     $notification = [
    //         'message' => 'Profile updated successfully!',
    //         'alert-type' => 'success'
    //     ];

    //     return redirect()->back()->with($notification);
    // }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return back()->with([
                'message' => 'Current password does not match!',
                'alert-type' => 'error'
            ]);
        }

        // Update to new password
        $user->password = Hash::make($request->newpassword);
        $user->save();

        // Logout the user after password change (for security)
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('wholeseller.login')->with([
            'message' => 'Password updated successfully! Please log in again.',
            'alert-type' => 'success'
        ]);
    }

    /* ============ Start Wholeseller AddToCart Method ============ */
    public function store(Request $request, $id)
    {
        try {
            $options = $request->has('options') ? json_decode(stripslashes($request->get('options'))) : [];
            $attribute_ids = [];
            $attribute_names = [];
            $attribute_values = [];

            $product = Product::findOrFail($id);
            $carts = Cart::content();

            // ================= STOCK CHECK ==================
            if (!$product->is_varient) {
                $prev_cart_qty = 0;
                foreach ($carts as $cart) {
                    if ($cart->id == $id) {
                        $prev_cart_qty += $cart->qty;
                    }
                }

                $qty = $prev_cart_qty + ($request->quantity ?? 1);

                if ($qty > $product->stock_qty) {
                    return response()->json(['error' => 'Not enough stock available!']);
                }
            } else {
                $prev_cart_qty = 0;
                foreach ($carts as $cart) {
                    if ($cart->id == $id && $cart->options->varient == $request->product_varient) {
                        $prev_cart_qty += $cart->qty;
                    }
                }

                $qty = $prev_cart_qty + ($request->quantity ?? 1);
                $stock = ProductStock::where('product_id', $id)
                    ->where('varient', $request->product_varient)
                    ->first();

                if ($stock && $qty > $stock->qty) {
                    return response()->json(['error' => 'Not enough variant stock available!']);
                }
            }

            // ================= VARIANT DATA ==================
            if ($product->is_varient && !empty($options)) {
                foreach ($options as $option) {
                    if ($option->name == 'attribute_ids[]') {
                        $attribute_ids[] = $option->value;
                    } elseif ($option->name == 'attribute_names[]') {
                        $attribute_names[] = $option->value;
                    } elseif ($option->name == 'attribute_options[]') {
                        $attribute_values[] = $option->value;
                    }
                }
            }

            // ================= WHOLESELL PRICE ==================
            $price = $product->wholesell_price ?? $product->regular_price;

            // ================= ADD TO CART ==================
            if ($product->is_varient) {
                Cart::add([
                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity ?? 1,
                    'price' => $price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_thumbnail,
                        'slug' => $product->slug,
                        'is_varient' => 1,
                        'varient' => $request->product_varient,
                        'attribute_ids' => $attribute_ids,
                        'attribute_names' => $attribute_names,
                        'attribute_values' => $attribute_values,
                        'type' => 'wholeseller',
                    ],
                ]);
            } else {
                Cart::add([
                    'id' => $id,
                    'name' => $request->product_name,
                    'qty' => $request->quantity ?? 1,
                    'price' => $price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_thumbnail,
                        'slug' => $product->slug,
                        'is_varient' => 0,
                        'type' => 'wholeseller',
                    ],
                ]);
            }

            return response()->json(['success' => 'Product successfully added to your wholesale cart!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
    /* ============ End Wholeseller AddToCart Method ============ */


    /*=================== Start Mini Cart  Methoed ===================*/
    public function miniCart()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    } // end method

    /*=========== Start Remove Mini Cart  Methoed ============*/
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed from Cart']);
    }

     public function show(){
        // Header Category Start
        $categories = Category::orderBy('name_en','DESC')->where('status','=',1)->limit(5)->get();
        $carts = Cart::content();
        //dd($carts);
        return view('wholeseller.show_cart',compact('categories'));
    }

    public function index()
    {
        // if(!guest_checkout() && !auth()->check()){
        //     return redirect()->route('login');
        // }
        $addresses = Address::where('status', 1)->get();
        $shippings = Shipping::where('status', 1)->get();

        $carts = Cart::content();
        if (count($carts) == 0) {
            //            return back()->with('message', 'Cart is Empty!!');
            return redirect()->route('cart.show');
        }

        $cartTotal = Cart::total();
        return view('wholeseller.wholeseller_checkout', compact('addresses', 'shippings', 'carts', 'cartTotal'));
    } // end method


}
