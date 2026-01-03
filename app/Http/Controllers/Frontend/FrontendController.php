<?php

namespace App\Http\Controllers\Frontend;


use Session;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Campaing;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Shipping;
use App\Models\Affiliate;
use App\Models\Attribute;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
//use Auth;
use App\Models\GroupProduct;
use Illuminate\Http\Request;
use App\Models\CampaingProduct;
use App\Utility\CategoryUtility;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(Request $request)
    {


        //Product All Status Active
        // $products = Product::where('status',1)->orderBy('id','DESC')->get();

        $products = Product::where('status', 1)->where('is_featured', 1)->orderBy('id', 'DESC')->get();
     

        // Search Start
        $sort_search = null;
        if ($request->has('search')) {
            $sort_search = $request->search;
            $products = $products->where('name_en', 'like', '%' . $sort_search . '%');
            // dd($products);
        } else {
            $products = Product::where('status', 1)->where('is_featured', 1)->orderBy('id', 'DESC')->get();
        }
        // $products = $products->paginate(15);
        // Search Start

        // Header Category Start
        $categories = Category::orderBy('name_en', 'ASC')->where('status', '=', 1)->where('parent_id', 0)->limit(11)->get();
        // Header Category End

        // Category Featured all
        $featured_category = Category::orderBy('name_en', 'DESC')->where('is_featured', '=', 1)->where('status', '=', 1)->limit(15)->get();

        //Slider
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        // Product Top Selling
        $product_top_sellings = Product::where('status', 1)->orderBy('id', 'ASC')->limit(9)->get();
        //Product Trending
        $product_trendings = Product::where('status', 1)->orderBy('id', 'DESC')->limit(12)->get();
        foreach ($product_trendings as $product) {
            $reviews = Review::where('product_id', $product->id)
                ->where('status', 1)
                ->where('verified_purchase', 1)
                ->get();
            $product->rating_count = $product->reviews->count();
            $average_rating = $reviews->count() > 0 ? $reviews->avg('rating') : 0;
            $product->average_rating = round($average_rating, 1); // you can choose 1 or 2 decimals
        }
        //Product Recently Added
        $product_recently_adds = Product::where('status', 1)->latest()->skip(2)->limit(9)->get();

        //featured_products
        $product_featured = Product::where('status', 1)->where('is_featured', 1)->latest()->limit(9)->get();
        foreach ($product_featured as $product) {
                $reviews = Review::where('product_id', $product->id)
                    ->where('status', 1)
                    ->where('verified_purchase', 1)
                    ->get();
                $product->rating_count = $product->reviews->count();
                $average_rating = $reviews->count() > 0 ? $reviews->avg('rating') : 0;
                $product->average_rating = round($average_rating, 1); // you can choose 1 or 2 decimals
            }

        $product_top_rates = Product::where('status', 1)->orderBy('regular_price')->limit(9)->get();
        // Home Banner
        $home_banners = Banner::where('status', 1)->where('position', 1)->orderBy('id', 'DESC')->get();
        $middle_banners = Banner::where('status', 1)->where('position', 2)->orderBy('id', 'DESC')->get();
        // Daily Best Sells
        //dd(date('Y-m-d'));
        $todays_sale = OrderDetail::where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();
        //$todays_sale  = DB::table('order_details')->select('*')->where('created_at', 'like', '%'.date('Y-m-d').'%')->get();
        $todays_sale = $todays_sale->unique('product_id');
        //dd($todays_sale);

        // today_best_sales
        // $today_best_sales  = Product::where('status',1)->where('is_deals',1)->latest()->get();
        // dd($today_best_sales);

        //Home2 featured category
        $home2_featured_categories = Category::orderBy('name_en', 'DESC')->where('is_featured', '=', 1)->where('status', '=', 1)->get();
        // Hot deals product
        $hot_deals = Product::where('status', 1)->where('is_deals', 1)->latest()->take(9)->get();

        $campaign_products = CampaingProduct::all();

        //        $home_view = 'FrontEnd.home.index';
        $home_view = 'FrontEnd.home.index2';

        // $campaign = \App\Models\Campaing::where('status', 1)->where('is_featured', 1)->first();
        // $start_diff=date_diff(date_create($campaign->flash_start), date_create(date('d-m-Y H:i:s')));
        // $end_diff=date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
        // dd($end_diff);
        // if($campaign && $start_diff->invert == 0 && $end_diff->invert == 0){
        //     dd($campaign);
        // }
        //dd($hot_deals);

        //dd($featured_category);

        $brands = Brand::where('status', 1)->get();

        return view($home_view, compact('brands', 'categories', 'sliders', 'product_featured', 'featured_category', 'products', 'product_top_sellings', 'product_trendings', 'product_recently_adds', 'product_top_rates', 'home_banners', 'sort_search', 'todays_sale', 'home2_featured_categories', 'hot_deals', 'middle_banners'));
    } // end method

    // public function shopgrid(){
    //     $products = Product::where('status',1)->orderBy('id','DESC')->get();

    //     return view('FrontEnd.shopgrid.index', compact('products'));
    // }

    public function index2(Request $request)
    {

        //Product All Status Active
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();

        // Search Start
        $sort_search = null;
        if ($request->has('search')) {
            $sort_search = $request->search;
            $products = $products->where('name_en', 'like', '%' . $sort_search . '%');
            // dd($products);
        } else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        }
        // $products = $products->paginate(15);
        // Search Start

        // Header Category Start
        $categories = Category::orderBy('name_en', 'DESC')->where('status', '=', 1)->limit(5)->get();
        // Header Category End

        // Category Featured all
        $featured_category = Category::orderBy('name_en', 'DESC')->where('is_featured', '=', 1)->where('status', '=', 1)->limit(15)->get();

        //Slider
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        // Product Top Selling
        $product_top_sellings = Product::where('status', 1)->orderBy('id', 'ASC')->limit(2)->get();
        //Product Trending
        $product_trendings = Product::where('status', 1)->orderBy('id', 'ASC')->skip(2)->limit(2)->get();
        //Product Recently Added
        $product_recently_adds = Product::where('status', 1)->latest()->skip(2)->limit(2)->get();

        $product_top_rates = Product::where('status', 1)->orderBy('regular_price')->limit(2)->get();
        // Home Banner
        $home_banners = Banner::where('status', 1)->where('position', 1)->orderBy('id', 'DESC')->get();

        // Daily Best Sells
        //dd(date('Y-m-d'));
        $todays_sale = OrderDetail::where('created_at', 'like', '%' . date('Y-m-d') . '%')->get();
        // dd($todays_sale);

        //Home2 featured category
        $home2_featured_categories = Category::orderBy('name_en', 'DESC')->where('is_featured', '=', 1)->where('status', '=', 1)->get();
        // Hot deals product
        $hot_deals = Product::where('status', 1)->where('is_deals', 1)->latest()->take(4)->get();

        return view('frontend.home2', compact('categories', 'sliders', 'featured_category', 'products', 'product_top_sellings', 'product_trendings', 'product_recently_adds', 'product_top_rates', 'home_banners', 'sort_search', 'todays_sale', 'home2_featured_categories', 'hot_deals'));
    } // end method

    /* ========== Start ProductDetails Method ======== */

public function loadMoreProducts(Request $request)
{
    $count  = $request->input('count', 12); // Number of products to load (default is 12)
    $offset = $request->input('offset', 0); // Offset for pagination

    $products = Product::where('status', 1)
        ->orderBy('id', 'desc')
        ->skip($offset)
        ->limit($count)
        ->get();

    $productsData = $products->map(function ($product) {
        $discount = calculateDiscount($product->id);
        $summary  = getProductReviewsSummary($product->id);

        return [
            'id'               => $product->id,
            'slug'             => $product->slug,
            'name_en'          => $product->name_en,
            'name_bn'          => $product->name_bn,
            'product_thumbnail'=> asset($product->product_thumbnail),
            'regular_price'    => $product->regular_price,
            'discount_price'   => $discount['discount'],
            'discount_text'    => $discount['text'],
            'stock_qty'        => $product->stock_qty,
            'is_varient'       => $product->is_varient,
            'average_rating'   => $summary['average_rating'],
            'reviews_count'    => $summary['total_ratings'],
        ];
    });

    $nextOffset = $offset + $count;

    return response()->json([
        'products'   => $productsData,
        'nextOffset' => $nextOffset
    ]);
}
    public function productDetails($slug)
    {

        $product = Product::where('slug', $slug)->first();
        if ($product) {
            if ($product->id) {
                $multiImg = MultiImg::where('product_id', $product->id)->limit(3)->get();
            }

            /* ================= Product Color Eng ================== */
            $color_en = $product->product_color_en;
            $product_color_en = explode(',', $color_en);

            /* ================= Product Size Eng =================== */
            $size_en = $product->product_size_en;
            $product_size_en = explode(',', $size_en);

            /* ================= Realted Product =============== */
            $cat_id = $product->category_id;

            $reviews = Review::where('product_id', $product->id)
                ->where('status', 1)
                ->where('verified_purchase', 1)
                ->get();

            $total_ratings = $reviews->count();

            // Average rating
            $average_rating = $total_ratings > 0 ? $reviews->avg('rating') : 0;

            // Ratings grouped by star (5 to 1)
               $ratingCounts = $reviews->groupBy(function($review) {
                return (int) $review->rating;
            })->map->count();

            $formattedCounts = [];
            foreach ([5, 4, 3, 2, 1] as $star) {
                $formattedCounts[$star] = $ratingCounts->get($star, 0);
            }

            $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $product->id)->orderBy('id', 'DESC')->get();

            $categories = Category::orderBy('name_en', 'ASC')->where('status', '=', 1)->limit(5)->get();
            $new_products = Product::orderBy('name_en')->where('status', '=', 1)->limit(3)->latest()->get();
            $shipping_charge = Shipping::where('type', 1)->first();

            if ($product->product_type == 2) {

                $group_products = GroupProduct::where('product_id', $product->id)->get();
                //                return $group_products;
            } else {
                $group_products = [];
            }
            $product->increment('views');

       
            return view('FrontEnd.product.product_details', compact('group_products', 'shipping_charge', 'product', 'multiImg', 'categories', 'new_products', 'product_color_en', 'product_size_en', 'relatedProduct', 'reviews', 'total_ratings', 'average_rating', 'formattedCounts'));
        }

        return view('FrontEnd.product.productNotFound');
    }

    /* ========== Start CatWiseProduct Method ======== */
    public function CatWiseProduct(Request $request, $slug)
    {

        $category = Category::where('slug', $slug)->first();
        // dd($category);

        // Top filter Start
        $sort_by = $request->sort_by;
        $brand_id = $request->brand;

        $conditions = ['status' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        } elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        $products_sort_by = Product::where($conditions);

        switch ($sort_by) {
            case 'newest':
                $products_sort_by->orderBy('created_at', 'desc')->paginate(10);
                break;
            case 'oldest':
                $products_sort_by->orderBy('created_at', 'asc')->paginate(10);
                break;
            case 'price-asc':
                $products_sort_by->orderBy('regular_price', 'asc')->paginate(10);
                break;
            case 'price-desc':
                $products_sort_by->orderBy('regular_price', 'desc')->paginate(10);
                break;
            default:
                $products_sort_by->orderBy('id', 'desc')->paginate(10);
                break;
        }
        // Top filter End

        $min_price = $request->get('filter_price_start');
        $max_price = $request->get('filter_price_end');

        $conditions = ['status' => 1];

        if ($request->brand_id != null && $request->brand_id > 0) {
            $conditions = array_merge($conditions, ['brand_id' => $request->brand_id]);
        }

        $products = Product::where($conditions);

        if ($min_price != null && $max_price != null) {
            $products->where('regular_price', '>=', $min_price)->where('regular_price', '<=', $max_price);
        }

        $category_ids = CategoryUtility::children_ids($category->id);
        $category_ids[] = $category->id;
        $products->whereIn('category_id', $category_ids);

        $products = $products->orderBy('created_at', 'desc')->paginate(12);

        $categories = Category::orderBy('name_en', 'ASC')->where('status', '=', 1)->get();
        // dd($products);
        $subcategories = Category::orderBy('name_en', 'ASC')->where('status', 1)->where('parent_id', $category->id)->get();

        return view('FrontEnd.product.category_view', compact('products', 'categories', 'category', 'sort_by', 'brand_id', 'subcategories'));
    } // end method
    /* ========== End CatWiseProduct Method ======== */

    /* ========== Start CatWiseProduct Method ======== */
    public function VendorWiseProduct(Request $request, $slug)
    {

        $vendor = Vendor::where('slug', $slug)->first();
        // dd($category);

        $products = Product::where('status', 1)->where('vendor_id', $vendor->id)->orderBy('id', 'DESC')->paginate(20);
        // Price Filter
        if ($request->get('filter_price_start') !== Null && $request->get('filter_price_end') !== Null) {
            $filter_price_start = $request->get('filter_price_start');
            $filter_price_end = $request->get('filter_price_end');

            if ($filter_price_start > 0 && $filter_price_end > 0) {
                $products = Product::where('status', '=', 1)->where('vendor_id', $vendor->id)->whereBetween('regular_price', [$filter_price_start, $filter_price_end])->paginate(20);
                // dd($products);
            }

        }

        $categories = Category::orderBy('name_en', 'ASC')->where('status', '=', 1)->get();
        // dd($products);

        return view('frontEnd.product.vendor_view', compact('products', 'categories', 'vendor'));
    } // end method
    /* ========== End CatWiseProduct Method ======== */

    /* ========== Start TagWiseProduct Method ======== */
    // public function TagWiseProduct($id,$slug){

    //     $products = Product::where('status','=',1)->where('tag_id',$id)->orderBy('id','DESC')->paginate(5);
    //     $categories = Category::orderBy('name_en','ASC')->where('status','=',1)->limit(5)->get();
    //     $tags = Tag::orderBy('name_en','ASC')->where('status','=',1)->limit(5)->get();
    //     $tag = Tag::find($id);
    //     $new_products = Product::orderBy('name_en')->where('status','=',1)->limit(3)->latest()->get();

    //     return view('frontend.product.tag_view',compact('products','categories','tags','tag','new_products'));
    // } // end method
    /* ========== End TagWiseProduct Method ======== */


    /* ================= Start ProductViewAjax Method ================= */
    public function ProductViewAjax($id)
    {

        $product = Product::with('category', 'brand')->findOrFail($id);
        //dd($product);
        $attribute_values = json_decode($product->attribute_values);

        $attributes = new Collection;
        foreach ($attribute_values as $key => $attribute_value) {
            $attr = Attribute::select('id', 'name')->where('id', $attribute_value->attribute_id)->first();
            // $attribute->name = $attr->name;
            // $attribute->id = $attr->id;
            $attr->values = $attribute_value->values;
            $attributes->add($attr);
        }


        return response()->json(array(
            'product' => $product,
            'attributes' => $attributes,
        ));
    }
    /* ================= END PRODUCT VIEW WITH MODAL METHOD =================== */




    /* ================= Start Product Search =================== */

    public function ajaxSearch(Request $request)
    {
        $search = $request->search;

        $products = Product::where('name_en', 'LIKE', "%{$search}%")
            ->where('status', 1)
            ->limit(5)
            ->get();

        $view = view('FrontEnd.partials.search-results', compact('products'))->render();

        return response()->json(['html' => $view]);
    }

    public function ProductSearch(Request $request)
    {
        //$request->validate(["search" => "required"]);
        $sort_by = $request->sort_by;
        $brand_id = $request->brand;

        $conditions = ['status' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        } elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        $products_sort_by = Product::where($conditions);

        switch ($sort_by) {
            case 'newest':
                $products_sort_by->orderBy('created_at', 'desc')->paginate(10);
                break;
            case 'oldest':
                $products_sort_by->orderBy('created_at', 'asc')->paginate(10);
                break;
            case 'price-asc':
                $products_sort_by->orderBy('regular_price', 'asc')->paginate(10);
                break;
            case 'price-desc':
                $products_sort_by->orderBy('regular_price', 'desc')->paginate(10);
                break;
            default:
                $products_sort_by->orderBy('id', 'desc')->paginate(10);
                break;
        }

        $item = $request->search;
        $category_id = $request->searchCategory;
        // echo "$item";

        // Header Category Start //
        $categories = Category::orderBy('name_en', 'DESC')->where('status', 1)->get();
        if ($category_id == 0) {
            $products = Product::where('name_en', 'LIKE', "%$item%")->where(
                'status'
                ,
                1
            )->latest()->get();
        } else {
            $products = Product::where('name_en', 'LIKE', "%$item%")->where('category_id', $category_id)->where(
                'status'
                ,
                1
            )->latest()->get();
        }

        $attributes = Attribute::orderBy('name', 'DESC')->where('status', 1)->latest()->get();

        return view('FrontEnd.product.search', compact('products', 'categories', 'attributes', 'sort_by', 'brand_id'));

    } // end method

    /* ================= End Product Search =================== */

    /* ================= Start Advance Product Search =================== */
    public function advanceProduct(Request $request)
    {

        // return $request;

        $request->validate(["search" => "required"]);

        $item = $request->search;
        $category_id = $request->category;
        // echo "$item";

        // Header Category Start //
        $categories = Category::orderBy('name_en', 'DESC')->where('status', 1)->get();

        if ($category_id == 0) {
            $products = Product::where('name_en', 'LIKE', "%$item%")->where(
                'status'
                ,
                1
            )->latest()->get();
        } else {
            $products = Product::where('name_en', 'LIKE', "%$item%")->where('category_id', $category_id)->where(
                'status'
                ,
                1
            )->latest()->get();
        }

        $attributes = Attribute::orderBy('name', 'DESC')->where('status', 1)->latest()->get();

        return view('FrontEnd.product.advance_search', compact('products', 'categories', 'attributes'));

    } // end method

    /* ================= End Advance Product Search =================== */

    /* ================= Start Hot Deals Page Show =================== */
    public function hotDeals(Request $request)
    {

        $sort_by = $request->sort_by;
        $brand_id = $request->brand;

        $conditions = ['status' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        } elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        $products_sort_by = Product::where($conditions);

        switch ($sort_by) {
            case 'newest':
                $products_sort_by->orderBy('created_at', 'desc')->paginate(10);
                break;
            case 'oldest':
                $products_sort_by->orderBy('created_at', 'asc')->paginate(10);
                break;
            case 'price-asc':
                $products_sort_by->orderBy('regular_price', 'asc')->paginate(10);
                break;
            case 'price-desc':
                $products_sort_by->orderBy('regular_price', 'desc')->paginate(10);
                break;
            default:
                $products_sort_by->orderBy('id', 'desc')->paginate(10);
                break;
        }
        // Hot deals product
        $products = Product::where('status', 1)->where('is_deals', 1)->paginate(5);

        // Category Filter Start
        if ($request->get('filtercategory')) {

            $checked = $_GET['filtercategory'];
            // filter With name start
            $category_filter = Category::whereIn('name_en', $checked)->get();
            $catId = [];
            foreach ($category_filter as $cat_list) {
                array_push($catId, $cat_list->id);
            }
            // filter With name end

            $products = Product::whereIn('category_id', $catId)->where('status', 1)->where('is_deals', 1)->latest()->paginate(10);
            // dd($products);
        }
        // Category Filter End

        $attributes = Attribute::orderBy('name', 'DESC')->where('status', 1)->latest()->get();
        // End Shop Product //
        return view('FrontEnd.deals.hot_deals', compact('attributes', 'products', 'sort_by', 'brand_id'));

    } // end method

    public function applycoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->apply_coupon)
            ->where('status', 1)
            ->where('total_use_limit', '>', 0) // Ensure total_use_limit is greater than 0
            ->first();

        if ($coupon) {
            // Check if the coupon has expired
            $now = Carbon::now();
            $expirationDate = Carbon::parse($coupon->expire_date);

            if ($expirationDate->greaterThanOrEqualTo($now)) {
                if ($coupon->discount <= $request->cart_value) {
                    // Calculate discount based on coupon type
                    $discountAmount = ($coupon->discount_type == 0) ? ($coupon->discount / 100) * $request->cart_value : $coupon->discount;
                    // ... your existing code for applying the coupon
                    // Fetch shipping charge based on the selected shipping_id
                    $shippingCharge = $this->getShippingCharge($request->shipping_id);
                    // Return both coupon discount and shipping charge as JSON response
                    Session::put('couponCode', $coupon->coupon_code);
                    Session::put('discountType', $coupon->discount_type);
                    Session::put('amount', $discountAmount);
                    Session::put('couponId', $coupon->id);
                    return response()->json(['success' => 'Coupon Applied Successfully', 'discount' => $discountAmount, 'shipping_charge' => $shippingCharge]);
                } else {
                    return back()->with('message', 'Not Enough Cart Amount To Get Offer. Please Update Cart Amount.');
                }
            } else {
                return response()->json(['error' => 'Coupon Date Is Expired']);
            }
        }
        // Handle other cases if necessary
        return back()->with('message', 'Invalid coupon code');
    }

    // Add a helper method to fetch the shipping charge based on shipping_id
    protected function getShippingCharge($shipping_id)
    {
        // Find the shipping record based on the provided shipping_id
        $shipping = Shipping::find($shipping_id);

        // Check if the shipping record exists
        if ($shipping) {
            // Return the shipping charge from the database
            return $shipping->shipping_charge;
        }

        // If the shipping record is not found, return a default value or handle it as needed
        return 0;
    }

    public function PageContact()
    {
        return view('FrontEnd.contact.index');
    }
    public function PageTerms()
    {
        $page = Page::first();
        return view('FrontEnd.terms_conditions.index', compact('page'));
    }
    public function PagePolicy()
    {
        $page = Page::first();
        return view('FrontEnd.privacy_policy.index', compact('page'));
    }

    public function PageHelp()
    {
        $page = Page::first();
        return view('FrontEnd.help.index', compact('page'));
    }

    public function PageFaq()
    {
        $page = Page::first();
        return view('FrontEnd.FAQ.index', compact('page'));
    }
    public function pageAbout()
    {
        $page = Page::first();
        return view('FrontEnd.about_us.index', compact('page'));
    }

   
    // public function loginCheck()
    // {
    //     if (Auth::user() && Auth::user()->role == 3) {
    //         return redirect()->route('checkout');
    //     } else {
    //         return redirect()->route('login');
    //     }

    // }

    public function loginCheck()
    {
        if (Auth::user() || !Auth::user() || Auth::user()->role == 3 || Auth::user()->role == 4) {
            return redirect()->route('checkout');
        } 
    }

    public function orderTracking()
    {
        return view('FrontEnd.page.order_tracking');
    }

    public function orderTrack(Request $request)
    {
        $this->validate($request, [
            'invoice_no' => 'required',
            'phone' => 'required',
        ]);
        $order = Order::where('invoice_no', $request->invoice_no)->where('phone', $request->phone)->first();
        if (!$order) {
            $notification = array(
                'message' => 'Required Data Not Found.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        // dd($order);
        return view('FrontEnd.page.track', compact('order'));
    }

   public function becomeaseller(Request $request)
{
    // dd($request->all()); // টেস্ট করার পর কমেন্ট করো

    $rules = [
        'seller_type' => 'required|in:1,2', // ডাটাবেসে integer, তাই string না দিয়ে 1,2 দাও
        'password'    => 'required|min:6|confirmed',
        'shop_cover'  => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ];

    if ($request->seller_type == 1) { // Individual
        $rules += [
            'full_name'     => 'required|string|max:255',
            'dob'           => 'required|date|before:today',
            'gender'        => 'required|in:male,female,other',
            'nid_number'    => 'required|string',
            'phone'         => 'required|regex:/^01[3-9]\d{8}$/|size:11',
            'email'         => 'required|email|unique:users,email',
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'nid_front'     => 'required|image|mimes:jpg,jpeg,png,webp',
            'nid_back'      => 'required|image|mimes:jpg,jpeg,png,webp',
        ];
    }

    if ($request->seller_type == 2) { // Business
        $rules += [
            'shop_name'         => 'required|string|max:255',
            'business_type'     => 'required|in:1,2,3',
            'trade_license_no'  => 'required|string',
            'owner_name'        => 'required|string|max:255',
           // 'owner_nid'         => 'required|string|size:10,13,17',
            'business_email'    => 'required|email|unique:users,email',
           // 'hotline'           => 'required|regex:/^01[3-9]\d{8}$/|size:11',
            'company_logo'      => 'required|image|mimes:jpg,jpeg,png,webp',
            'trade_license_doc' => 'required|image|mimes:jpg,jpeg,png,webp',
            'owner_nid_front'   => 'required|image|mimes:jpg,jpeg,png,webp',
            'owner_nid_back'    => 'required|image|mimes:jpg,jpeg,png,webp',
        ];
    }

    $validated = $request->validate($rules);

    // Slug তৈরি
    $base = $request->seller_type == 1 ? $request->full_name : $request->shop_name;
    $slug = Str::slug($base) . '-' . Str::random(6);
    while (Vendor::where('slug', $slug)->exists()) {
        $slug = Str::slug($base) . '-' . Str::random(8);
    }

    // ইমেজ আপলোড ফাংশন
$upload = function ($file, $folder) {
    $name = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    $path = public_path("upload/vendor/{$folder}");

    // ✅ ফোল্ডার না থাকলে তৈরি করো
    if (!File::exists($path)) {
        File::makeDirectory($path, 0777, true, true);
    }

    // ✅ ইমেজ প্রসেসিং
    Image::make($file)
        ->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->save($path . '/' . $name);

    return "upload/vendor/{$folder}/{$name}";
};



    // ইউজার তৈরি
    $user = User::create([
        'name'     => $request->seller_type == 1 ? $request->full_name : $request->owner_name,
        'username' => $slug,
        'email'    => $request->seller_type == 1 ? $request->email : $request->business_email,
        'phone'    => $request->seller_type == 1 ? $request->phone : $request->hotline,
        'password' => Hash::make($request->password),
        'role'     => 2,
        'status'   => 0,
    ]);

    // ভেন্ডর ডাটা
    $vendorData = [
        'user_id'      => $user->id,
        'seller_type'  => (int)$request->seller_type, // integer
        'slug'         => $slug,
        'phone'        => $request->seller_type == 1 ? $request->phone : $request->hotline,
        'email'        => $request->seller_type == 1 ? $request->email : $request->business_email,
        'address'      => $request->address ?? null,
        'shop_cover'   => $request->hasFile('shop_cover') ? $upload($request->file('shop_cover'), 'cover') : null,
        'status'       => 0,
        'is_request'   => 1,
        'created_by'   => auth('admin')->id() ?? null,
    ];

    if ($request->seller_type == 1) {
        $vendorData += [
            'full_name'     => $request->full_name,
            'dob'           => $request->dob,
            'gender'        => $request->gender,
            'nid_number'    => $request->nid_number,
            'profile_photo' => $upload($request->file('profile_photo'), 'profile'),
            'nid_front'     => $upload($request->file('nid_front'), 'nid'),
            'nid_back'      => $upload($request->file('nid_back'), 'nid'),
        ];
    } else {
        $vendorData += [
            'shop_name'         => $request->shop_name,
            'owner_name'        => $request->owner_name,
            'business_type'     => (int)$request->business_type,
            'trade_license_no'  => $request->trade_license_no,
            'bin_tin'           => $request->bin_tin ?? null,
            'profile_photo'     => $upload($request->file('company_logo'), 'logo'),
            'trade_license_doc' => $upload($request->file('trade_license_doc'), 'license'),
            'nid_front'         => $upload($request->file('owner_nid_front'), 'nid'),
            'nid_back'          => $upload($request->file('owner_nid_back'), 'nid'),
        ];
    }

    Vendor::create($vendorData);

    return back()->with('success', 'আপনার সেলার অ্যাপ্লিকেশন সফলভাবে জমা হয়েছে। অ্যাডমিনের অনুমোদনের অপেক্ষায় আছেন।');
}

    public function pagesstore()
    {
        //    $page = new Page();
        //    $page->faq = $request->faq;
        //    $page->faq_bn = $request->faq_bn;
        //    $page->about = $request->about;
        //    $page->about_bn = $request->about_bn;
        //    $page->privacy = $request->privacy;
        //    $page->privacy_bn = $request->privacy_bn;
        //    $page->terms = $request->terms;
        //    $page->terms_bn = $request->terms_bn;
        //    $page->help = $request->help;
        //    $page->help_bn = $request->help_bn;
        //    $page->save();
        //    return back();
    }

    public function sellerApply()
    {
       
        return view('FrontEnd.seller-application.form');
    }



    public function home_new()
    {

        // Fetch categories for sidebar
        $categories = Category::orderBy('name_en', 'ASC')
            ->where('status', '=', 1)
            ->where('parent_id', 0)
            ->limit(15)
            ->get();

        // Fetch featured categories for top categories section
        $featured_category = Category::orderBy('name_en', 'DESC')
            ->where('is_featured', '=', 1)
            ->where('status', '=', 1)
            ->limit(15)
            ->get();

        // Fetch brands for popular brands section
        $brands = Brand::where('status', 1)->get();

        // Fetch featured products for featured products section
        $product_featured = Product::where('status', 1)
            ->where('is_featured', 1)
            ->latest()
            ->limit(9)
            ->get();

        // Fetch campaign for flash sale section
        $campaign = Campaing::where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('id', 'desc')
            ->first();

        // Fetch recently added products for latest products section
        $product_recently_adds = Product::where('status', 1)
            ->latest()
            ->limit(8)
            ->get();

        return view('Frontend_New.home.index', compact('categories', 'featured_category', 'brands', 'product_featured', 'campaign', 'product_recently_adds'));
    }

    public function productCategories()
    {
        // Fetch all categories with status active
        $categories = Category::where('status', 1)
            ->orderBy('name_en', 'ASC')
            ->get();

        // Fetch featured categories
        $featured_categories = Category::where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('name_en', 'ASC')
            ->get();

        return view('Frontend_New.product.category', compact('categories', 'featured_categories'));
    }

    public function shop(Request $request)
    {
        $query = Product::where('status', 1);

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            $query->where('regular_price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('regular_price', '<=', $request->max_price);
        }

        // Sort by
        $sort_by = $request->get('sort_by', 'latest');
        switch ($sort_by) {
            case 'price-low':
                $query->orderBy('regular_price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('regular_price', 'desc');
                break;
            case 'popular':
                $query->orderBy('id', 'desc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12);
        $categories = Category::orderBy('name_en', 'ASC')->where('status', 1)->get();

        return view('Frontend_New.product.shop', compact('products', 'categories', 'sort_by'));
    }

    public function productDetailsNew($slug)
    {
        $product = Product::where('slug', $slug)->first();
        
        if ($product) {
            if ($product->id) {
                $multiImg = MultiImg::where('product_id', $product->id)->limit(3)->get();
            }

            /* ================= Product Color Eng ================== */
            $color_en = $product->product_color_en;
            $product_color_en = explode(',', $color_en);

            /* ================= Product Size Eng =================== */
            $size_en = $product->product_size_en;
            $product_size_en = explode(',', $size_en);

            /* ================= Related Product =============== */
            $cat_id = $product->category_id;

            $reviews = Review::where('product_id', $product->id)
                ->where('status', 1)
                ->where('verified_purchase', 1)
                ->get();

            $total_ratings = $reviews->count();
            $average_rating = $total_ratings > 0 ? $reviews->avg('rating') : 0;

            $ratingCounts = $reviews->groupBy(function ($review) {
                return (int) $review->rating;
            })->map->count();

            $formattedCounts = [];
            foreach ([5, 4, 3, 2, 1] as $star) {
                $formattedCounts[$star] = $ratingCounts->get($star, 0);
            }

            $relatedProduct = Product::where('category_id', $cat_id)
                ->where('id', '!=', $product->id)
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();

            $categories = Category::orderBy('name_en', 'ASC')->where('status', '=', 1)->limit(5)->get();
            $shipping_charge = Shipping::where('type', 1)->first();

            if ($product->product_type == 2) {
                $group_products = GroupProduct::where('product_id', $product->id)->get();
            } else {
                $group_products = [];
            }

            return view('Frontend_New.product.product_details', compact('group_products', 'shipping_charge', 'product', 'multiImg', 'categories', 'product_color_en', 'product_size_en', 'relatedProduct', 'reviews', 'total_ratings', 'average_rating', 'formattedCounts'));
        }

        return view('FrontEnd.product.productNotFound');
    }

}

