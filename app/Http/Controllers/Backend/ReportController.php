<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vendor;
use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_by = null;
        $products = Product::orderBy('created_at', 'desc');
        //        $products = Product::orderBy('created_at', 'desc')->where('vendor_id', Auth::guard('admin')->user()->id);

        if (Auth::guard('admin')->user()->role == '2') {
            $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
            if ($vendor) {
                $products = Product::where('vendor_id', $vendor->id)->latest();
            }
            if ($request->has('category_id') && $request->category_id > 0) {
                $sort_by = $request->category_id;
                $products = $products->where('category_id', $sort_by);
            }
            $products = $products->paginate(20);
        } else {
            if ($request->has('category_id') && $request->category_id > 0) {
                $sort_by = $request->category_id;
                $products = $products->where('category_id', $sort_by);
            }
            $products = $products->paginate(20);
        }

        //        return $products;

        return view('backend.reports.index', compact('products'));
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
        //
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

    public function salesReport()
    {
        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
        $orders = OrderDetail::where('order_details.vendor_id', $vendor->id)
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->selectRaw('COUNT(order_details.product_id) as product, SUM(order_details.qty) as qty')
            ->groupBy('order_details.order_id', 'orders.invoice_no')
            ->get();


        //        return $orders;
        //        $orders = OrderDetail::where('vendor_id', $vendor->id)->get();
        return view('backend.reports.sales_report', compact('orders'));
    }
    public function categoryProduct($id)
    {
        $category = Category::findOrFail($id);

        // OrderDetails থেকে শুধু সেই products আনো যেগুলো এই category তে আছে
        $orders = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->select(
                'products.id as product_id',
                'products.name_en as product_name',
                \DB::raw('SUM(order_details.qty) as total_qty'),
                \DB::raw('SUM(order_details.qty * order_details.price) as total_sales')
            )
            ->where('products.category_id', $id)
            ->groupBy('products.id', 'products.name_en')
            ->get();

        // type নির্ধারণ করো (admin/vendor)
        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
        $type = $vendor ? 'vendor' : 'admin';

        return view('backend.reports.category_product', compact('orders', 'category', 'type'));
    }
    public function details($id)
    {
        $order = Order::find($id);
        return view('backend.reports.details', compact('order'));
    }


    public function categorySales()
    {
        $user = Auth::guard('admin')->user();
        $vendor = Vendor::where('user_id', $user->id)->first();

        if ($vendor && $vendor->id !== null) {
            // Vendor report
            $orders = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
                ->select('products.category_id')
                ->selectRaw('COUNT(order_details.product_id) as product_count, SUM(order_details.qty) as total_qty')
                ->where('products.vendor_id', $vendor->id)
                ->groupBy('products.category_id')
                ->get();

            $type = 'vendor';
        } else {
            // Admin report (vendor_id null হলে)
            $orders = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
                ->select('products.category_id')
                ->selectRaw('COUNT(order_details.product_id) as product_count, SUM(order_details.qty) as total_qty')
                ->whereNull('products.vendor_id')
                ->groupBy('products.category_id')
                ->get();

            $type = 'admin';
        }

        return view('backend.reports.category_sales', compact('orders', 'type'));
    }


    public function mostViewedProducts()
    {

        $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();

        if (!$vendor) {
            return view('backend.reports.most_viewed_products', ['orders' => collect()]);
        }

        $viewed = Product::where('vendor_id', $vendor->id)
            ->where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->get();


        return view('backend.reports.most_viewed_products', compact('viewed'));
    }
}
