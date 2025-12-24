<?php

namespace App\Http\Controllers;

use Cache;
use Artisan;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazilla;
use App\Models\OrderDetail;
use App\Models\VendorOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /*=================== Start Index Login Methoed ===================*/
    public function Index()
    {
        if (Auth::check()) {
            abort(404);
        }

        return view('admin.admin_login');
    } // end method

    /*=================== End Index Login Methoed ===================*/

    /*=================== Start Dashboard Methoed ===================*/
    public function Dashboard()
    {

        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();

        $userCount = DB::table('users')
            ->select(DB::raw('count(*) as total_users'))
            ->where('status', 1)
            ->where('role', 3)
            ->first();

        if (Auth::guard('admin')->user()->role == '2') {
            $productCount = DB::table('products')
                ->select(DB::raw('count(*) as total_products'))
                ->where('vendor_id', Auth::guard('admin')->user()->id)
                ->where('status', 1)
                ->first();

            if ($vendor) {
                $productCount = DB::table('products')
                    ->select(DB::raw('count(*) as total_products'))
                    ->where('vendor_id', $vendor->id)
                    ->where('status', 1)
                    ->first();
            }
        } else {
            $productCount = DB::table('products')
                ->select(DB::raw('count(*) as total_products'))
                ->where('status', 1)
                ->first();
        }

        $categoryCount = DB::table('categories')
            ->select(DB::raw('count(*) as total_categories'))
            ->where('status', 1)
            ->first();

        $brandCount = DB::table('brands')
            ->select(DB::raw('count(*) as total_brands'))
            ->where('status', 1)
            ->first();

        $StaffCount = DB::table('staff')->count();

        $vendorCount = Vendor::all();

        $orderCount = DB::table('orders')
            ->select(DB::raw('count(*) as total_orders, sum(grand_total) as total_sell'))
            ->first();

        $lowStockCount = DB::table('product_stocks as s')
            ->leftjoin('products as p', 's.product_id', '=', 'p.id')
            ->select(DB::raw('count(s.id) as total_low_stocks'))
            ->where('p.vendor_id', Auth::guard('admin')->user()->id)
            ->where('s.qty', '<=', 5)
            ->first();

        if ($vendor) {
            $lowStockCount = DB::table('product_stocks as s')
                ->leftjoin('products as p', 's.product_id', '=', 'p.id')
                ->select(DB::raw('count(s.id) as total_low_stocks'))
                ->where('p.vendor_id', $vendor->id)
                ->where('s.qty', '<=', 5)
                ->first();
        }

        $adminLowStockProducts = DB::table('products as s')
            ->where('s.stock_qty', '<=', 5)
            ->whereNull('s.vendor_id')
            ->get();


        //        return $lowStockCount;
        $orders = DB::table('orders')->where('delivery_status', '=', 'pending')->latest()->paginate(6);

        //dd($userCount->total_users);

if (Auth::guard('admin')->user()->role == 2) {
    $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();

    // Vendor-এর সব প্রোডাক্ট
    $products = Product::where('vendor_id', $vendor->id)->get();

    // Low stock products
    $lowStockProducts = Product::where('vendor_id', $vendor->id)
        ->where('stock_qty', '<=', 5)
        ->get();

    // Vendor-এর সব VendorOrder (এটাই main source এখন)
    $vendorOrders = VendorOrder::where('vendor_id', $vendor->id)->get();

    if ($vendorOrders->isEmpty()) {
        // কোনো order নেই
        $pendingOrdersCount = 0;
        $cancelledOrdersCount = 0;
        $todayOrdersCount = 0;
        $todaySalesAmount = 0;
        $totalDeliveredOrdersCount = 0;
    } else {
        // Pending Orders Count
        $pendingOrdersCount = $vendorOrders->where('delivery_status', 0)->count();

        // Cancelled Orders Count
        $cancelledOrdersCount = $vendorOrders->where('delivery_status', 1)->count();

        // Today Orders Count & Sales
        $todayVendorOrders = $vendorOrders->filter(function ($vo) {
            return Carbon::parse($vo->created_at)->isToday();
        });

        $todayOrdersCount = $todayVendorOrders->count();
        $todaySalesAmount = $todayVendorOrders->sum('subtotal');

        // Total Delivered Orders Count (যদি চাও)
        $totalDeliveredOrdersCount = $vendorOrders->where('delivery_status', 'delivered')->count();
    }

    return view('admin.index', compact(
        'vendorOrders',
        'products',
        'lowStockProducts',
        'pendingOrdersCount',
        'cancelledOrdersCount',
        'todayOrdersCount',
        'todaySalesAmount',
        'totalDeliveredOrdersCount'
        
    ));
}

        return view('admin.index', compact('userCount', 'productCount', 'categoryCount', 'brandCount', 'vendorCount', 'orderCount', 'lowStockCount', 'StaffCount', 'orders', 'adminLowStockProducts'));
    } // end method

    /*=================== End Dashboard Methoed ===================*/

    // /*=================== Start Admin Login Methoed ===================*/
    // public function Login(Request $request){

    // 	$this->validate($request,[
    // 		'email' =>'required',
    // 		'password' =>'required'
    // 	]);

    // 	// dd($request->all());
    // 	$check = $request->all();
    // 	if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password'=> $check['password'] ])){

    //         if(Auth::guard('admin')->user()->role == "1" || Auth::guard('admin')->user()->role == "5" || Auth::guard('admin')->user()->role == "2"){
    //             return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully.');
    //         }else{
    //             $notification = array(
    //                 'message' => 'Invaild Email Or Password.',
    //                 'alert-type' => 'error'
    //             );
    //             return back()->with($notification);
    //         }

    // 	}else{
    //         $notification = array(
    //             'message' => 'Invaild Email Or Password.',
    //             'alert-type' => 'error'
    //         );
    // 		return back()->with($notification);
    // 	}

    // } // end method

    /*=================== Start Admin & Vendor Login Method ===================*/
    public function Login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Try to login using 'admin' guard (same provider as 'web')
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();

            //Admin Roles: 1 = Super Admin, 5 = Staff/Admin
            if (in_array($user->role, [1, 5])) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Admin Login Successfully.');
            }
            //dd($user->role);
            //Vendor Role: 2 = Seller/Vendor
            if ($user->role == 2) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Vendor Login Successfully.');
            }

            //Other Roles Not Allowed
            Auth::guard('admin')->logout();
            return back()->with([
                'message' => 'Unauthorized role access.',
                'alert-type' => 'error',
            ]);
        }

        //Invalid Credentials
        return back()->with([
            'message' => 'Invalid Email or Password.',
            'alert-type' => 'error',
        ]);
    }

    /*=================== End Admin Login Methoed ===================*/

    /*=================== Start Logout Methoed ===================*/
    public function AminLogout(Request $request)
    {
        if (Auth::guard('admin')->user()->role == 1) {
            $route = 'login_form';
        } else {
            $route = 'vendor.login_form';
        }

        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route($route)->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/

    /*=================== Start AdminRegister Methoed ===================*/
    public function AdminRegister()
    {

        return view('admin.admin_register');
    } // end method
    /*=================== End AdminRegister Methoed ===================*/

    /*=================== Start AdminForgotPassword Methoed ===================*/
    public function AdminForgotPassword()
    {

        return view('admin.admin_forgot_password');
    } // end method
    /*=================== End AdminForgotPassword Methoed ===================*/

    /*=================== Start AdminRegisterStore Methoed ===================*/
    public function AdminRegisterStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        // dd($request->all());
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_form')->with('success', 'Admin Created Successfully.');
    } // end method
    /*=================== End AdminRegisterStore Methoed ===================*/

    /* =============== Start Profile Method ================*/
    public function Profile()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = User::find($id);

        // dd($adminData);
        return view('admin.admin_profile_view', compact('adminData'));
    } // End Method

    /* =============== Start EditProfile Method ================*/
    public function EditProfile()
    {
        $id = Auth::guard('admin')->user()->id;

        $editData = User::find($id);
        $vendor = \App\Models\Vendor::where('user_id', $id)->first(); // Vendor info

        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazillas = Upazilla::all();

        return view('admin.admin_profile_edit', compact('editData', 'vendor', 'divisions', 'districts', 'upazillas'));
    }
    /* =============== Start StoreProfile Method ================*/
    public function StoreProfile(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;

        // =========================
        // 1️⃣ Update User Table
        // =========================
        $user = User::find($id);



        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->pickup_address = $request->pickup_address;
        $user->warehouse_address = $request->warehouse_address;
        $user->office_address = $request->office_address;

        $user->division = $request->division;   // division_id
        $user->district = $request->district;   // district_id
        $user->upazilla = $request->upazilla;   // upazilla_id


        $user->map_location = $request->map_location;

        // Profile Image
        if ($request->file('profile_image')) {
            if ($user->profile_image && file_exists(public_path('upload/admin_images/' . $user->profile_image))) {
                unlink(public_path('upload/admin_images/' . $user->profile_image));
            }
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $user->profile_image = $filename;
        }

        $user->save();

        // =========================
        // 2️⃣ Update Vendor Table (Bank/Payment Info)
        // =========================
        $vendor = \App\Models\Vendor::where('user_id', $id)->first();
        if (!$vendor) {
            // যদি vendor entry না থাকে, create
            $vendor = new \App\Models\Vendor();
            $vendor->user_id = $id;
        }

        $vendor->holder_name = $request->holder_name;
        $vendor->bank_name = $request->bank_name;
        $vendor->branch_name = $request->branch_name;
        $vendor->routing_number = $request->routing_number;
        $vendor->bank_account = $request->bank_account;
        $vendor->alternative_payment = $request->alternative_payment;
        $vendor->shipping_zone = $request->shipping_zone;

        // Bank document upload
        if ($request->file('bank_document')) {
            if ($vendor->bank_document && file_exists(public_path('upload/bank_documents/' . $vendor->bank_document))) {
                unlink(public_path('upload/bank_documents/' . $vendor->bank_document));
            }
            $file = $request->file('bank_document');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/bank_documents'), $filename);
            $vendor->bank_document = $filename;
        }

        $vendor->save();

        return redirect()->route('admin.profile')->with('success', 'Profile and Bank Information Updated Successfully');
    }




    // ProfileController.php
    public function getDistrict($division_id)
    {
        $districts = DB::table('districts')
            ->where('division_id', $division_id)
            ->get(['id', 'district_name_en', 'district_name_bn']);
        return response()->json($districts);
    }

    public function getUpazilla($district_id)
    {
        $upazillas = DB::table('upazillas')
            ->where('district_id', $district_id)
            ->get(['id', 'name_en', 'name_bn']);
        return response()->json($upazillas);
    }
    /* =============== Start ChangePassword Method ================*/
    public function ChangePassword()
    {

        return view('admin.admin_change_password');
    } //

    /* =============== Start UpdatePassword Method ================*/
    public function UpdatePassword(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;

        // dd($hashedPassword);
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $id = Auth::guard('admin')->user()->id;
            $admin = User::find($id);
            $admin->password = bcrypt($request->newpassword);
            $admin->save();

            Session::flash('success', 'Password Updated Successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Old password is not match');
            return redirect()->back();
        }
    } // End Method

    /* =============== Start clearCache Method ================*/
    function clearCache(Request $request)
    {
        Artisan::call('optimize:clear');
        Session::flash('success', 'Cache cleared successfully.');
        return redirect()->back();
    } // end method

    /* =============== End clearCache Method ================*/
}
