<?php

namespace App\Http\Controllers\Backend;

use Image;
use Session;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Supplier;
use App\Models\Attribute;
use App\Models\AccountHead;

use App\Models\ProductStock;
use App\Models\GroupProduct;

use App\Models\CampaingProduct;
use App\Models\Order;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\AccountLedger;
use App\Models\AttributeValue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*=================== Start ProductView Methoed ===================*/
    public function ProductView()
    {
        if (Auth::guard('admin')->user()->role == '2') {
            //            $products = Product::where('vendor_id', Auth::guard('admin')->user()->id)->latest()->get();
            $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
            if ($vendor) {
                $products = Product::where('vendor_id', $vendor->id)->latest()->get();
            }
        } else {
            $products = Product::latest()->get();
        }
        return view('backend.product.product_view', compact('products'));
    } // end method

    //==================affiliate product view ==============

    public function AffiliateProductView()
    {
        $products = Product::where('is_affiliate', 1)->latest()->get();
        return view('backend.product.affiliate_product_view', compact('products'));
    }

    //==================affiliate product view ==============
    public function wholesellProductView()
    {
        $products = Product::where('is_wholesell', 1)->latest()->get();
        return view('backend.product.wholesell_product_view', compact('products'));
    }

    /*=================== Start ProductAdd Methoed ===================*/
    public function ProductAdd()
    {
        // Session::put('a', 0);
        $categories = Category::where('parent_id', 0)->with('childrenCategories')->orderBy('name_en', 'asc')->get();
        $brands = Brand::latest()->get();
        $vendors = Vendor::latest()->get();
        $suppliers = Supplier::latest()->get();
        $units = Unit::latest()->get();
        $attributes = Attribute::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands', 'vendors', 'suppliers', 'attributes', 'units'));
    } // end method

    /*=================== Start StoreProduct Methoed ===================*/
    public function StoreProduct(Request $request)
    {
        //         return $request;
        $request->validate([
            'name_en'               => 'required|max:150',
            'regular_price'         => 'required|numeric',
            'short_description_en'  => 'required|string',
            'description_en'        => 'required|string',
            'category_id'           => 'required|integer',
            'brand_id'              => 'nullable|integer',
            'stock_qty'             => 'required|integer',
            'purchase_price'        => 'required|numeric',
            'discount_price'        => 'required|numeric',
            'product_thumbnail'     => 'required',
        ]);

        if (!$request->name_bn) {
            $request->name_bn = $request->name_en;
        }

        if (!$request->description_bn) {
            $request->description_bn = $request->description_en;
        }

        // $slug = strtolower(str_replace(' ', '-', $request->name_en));
        if ($request->slug != null) {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        } else {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name_en)) . '-' . Str::random(5);
        }

        if ($request->category_id == null || $request->category_id == "") {
            $request->category_id = 0;
        }

        if ($request->regular_price == null || $request->regular_price == "") {
            $request->regular_price = 0;
        }

        // if ($request->vendor_id == null || $request->vendor_id == "") {
        //     $request->vendor_id = 0;
        // }


        if ($request->brand_id == null || $request->brand_id == "") {
            $request->brand_id = 0;
        }
        if ($request->points == null || $request->points == "") {
            $request->points = 0;
        }

        if ($request->supplier_id == null || $request->supplier_id == "") {
            $request->supplier_id = 0;
        }

        if ($request->unit_id == null || $request->unit_id == "") {
            $request->unit_id = 0;
        }

        if ($request->hasfile('product_thumbnail')) {
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(438, 438)->save('upload/products/thumbnails/' . $name_gen);
            $save_url = 'upload/products/thumbnails/' . $name_gen;
        } else {
            $save_url = '';
        }

        $authStatus = 0;

        if (Auth::guard('admin')->check()) {
            // ADMIN → auto verified
            if (Auth::guard('admin')->user()->role == 1) {
                $authStatus = 1;
                $status = 1;
            }
            // VENDOR → pending
            if (Auth::guard('admin')->user()->role == 2) {
                $authStatus = 0;
                $status = 0;
            }
        }

        $product = Product::create([
            'brand_id'              => $request->brand_id,
            'product_type'           => $request->product_type,
            'category_id'           => $request->category_id,
            'vendor_id'             => $request->vendor_id,
            'supplier_id'           => $request->supplier_id,
            'unit_id'               => $request->unit_id,
            'name_en'               => $request->name_en,
            'name_bn'               => $request->name_bn,
            'slug'                  => $slug,
            'unit_weight'           => $request->unit_weight,
            'purchase_price'        => $request->purchase_price,
            'wholesell_price'       => $request->wholesell_price,
            'wholesell_minimum_qty' => $request->wholesell_minimum_qty,
            'wholesell_max_qty' => $request->wholesell_max_qty,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
            'discount_type'         => $request->discount_type,
            'product_code'          => rand(10000, 99999),
            'minimum_buy_qty'       => $request->minimum_buy_qty,
            'stock_qty'             => $request->stock_qty,
            'short_description_en'  => $request->short_description_en,
            'short_description_bn'  => $request->short_description_bn,
            'description_en'        => $request->description_en,
            'description_bn'        => $request->description_bn,
            'is_featured'           => $request->is_featured ? 1 : 0,
            'is_replaceable'        => $request->is_replaceable ? 1 : 0,
            'is_deals'              => $request->is_deals ? 1 : 0,
            'is_digital'            => $request->is_digital ? 1 : 0,
            'is_affiliate'          => $request->is_affiliate ? 1 : 0,
            'is_wholesell'          => $request->has('is_wholesell') ? 1 : 0,
            'status'                => $status,
            'points'                => $request->points,
            'product_thumbnail'     => $save_url,
            'authenticity_status'   => $authStatus,
            'created_by'            => Auth::guard('admin')->user()->id,
        ]);




        // dd($product);

        /* ========= Start Multiple Image Upload ========= */
        $images = $request->file('multi_img');
        if ($images) {
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;

                MultiImg::insert([
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
        /* ========= End Multiple Image Upload ========= */

        /* ========= Product Attributes Start ========= */
        $attribute_values = array();
        if ($request->has('choice_attributes')) {
            foreach ($request->choice_attributes as $key => $attribute) {
                $atr = 'choice_options' . $attribute;
                $item['attribute_id'] = $attribute;
                $data = array();

                foreach ($request[$atr] as $key => $value) {
                    array_push($data, $value);
                }

                $item['values'] = $data;
                array_push($attribute_values, $item);
            }
        }

        if (!empty($request->choice_attributes)) {
            $product->attributes = json_encode($request->choice_attributes);
            $product->is_varient = 1;

            if ($request->has('vnames')) {
                $i = 0;
                foreach ($request->vnames as $key => $name) {
                    $stock = ProductStock::create([
                        'product_id' => $product->id,
                        'varient'    => $name,
                        'sku'        => $request->vskus[$i],
                        'price'      => $request->vprices[$i],
                        'qty'        => $request->vqtys[$i],
                    ]);

                    $image = $request->vimages[$i];
                    if ($image) {
                        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                        Image::make($image)->resize(438, 438)->save('upload/products/variations/' . $name_gen);
                        $save_url = 'upload/products/variations/' . $name_gen;
                    } else {
                        $save_url = '';
                    }

                    $stock->image = $save_url;
                    $stock->save();

                    $i++;
                }
            }
        } else {
            $product->attributes = json_encode(array());
        }

        $attr_values = collect($attribute_values);
        $attr_values_sorted = $attr_values->sortByDesc('attribute_id');

        $sorted_array = array();
        foreach ($attr_values_sorted as $attr) {
            array_push($sorted_array, $attr);
        }

        $product->attribute_values = json_encode($sorted_array, JSON_UNESCAPED_UNICODE);
        /* ========= End Product Attributes ========= */

        // /* =========== Start Product Tags =========== */
        // $product->tags = implode(',', $request->tags);
        // /* =========== End Product Tags =========== */

        $product->save();

        //Ledger Entry
        $ledger = AccountLedger::create([
            'account_head_id' => 1,
            'particulars' => 'Product ID: ' . $product->id,
            'debit' => $product->purchase_price,
            'product_id' => $product->id,
            'type' => 1,
        ]);
        $ledger->balance = get_account_balance() - $product->purchase_price;
        $ledger->save();

        if ($request->product_type == '2') {
            foreach ($request->group_id as $key => $group) {
                $group_product = new GroupProduct();
                $group_product->product_id =  $product->id;
                $group_product->group_product_id =  $group;
                $group_product->status = $request->status ? 1 : 0;
                $group_product->save();
            }
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    } // end method

    /*=================== Start EditProduct Methoed ===================*/
    public function EditProduct($id)
    {

        $product = Product::findOrFail($id);
        if (Auth::guard('admin')->user()->role == 2) {
            $vendor = Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
            if ($product->vendor_id  != $vendor->id) {
                abort(404);
            }
        }

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $vendors = Vendor::latest()->get();
        $suppliers = Supplier::latest()->get();
        $units = Unit::latest()->get();
        $attributes = Attribute::latest()->get();

        //dd($product->stocks);

        return view('backend.product.product_edit', compact('categories', 'vendors', 'suppliers', 'brands', 'attributes', 'product', 'multiImgs', 'units'));
    }

    // upload product csv file
    public function uploadCsv()
    {
        return view('backend.product.upload_csv');
    }

    // public function importCsv(Request $request)
    // {
    //     $request->validate([
    //         'csv_file' => 'required|mimes:csv,txt'
    //     ]);

    //     $file = $request->file('csv_file');
    //     $handle = fopen($file, "r");

    //     fgetcsv($handle); // skip header row

    //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

    //         Product::create([
    //             'brand_id' => $data[0] ?? null,
    //             'category_id' => $data[1],
    //             'sub_category_id' => $data[2] ?? null,
    //             'name_en' => $data[3],
    //             'slug' => Str::slug($data[3]),
    //             'purchase_price' => $data[4] ?? 0,
    //             'regular_price' => $data[5] ?? 0,
    //             'discount_price' => $data[6] ?? 0,
    //             'stock_qty' => $data[7] ?? 0,
    //             'status' => 1,
    //             'created_by' => auth()->id(),
    //         ]);
    //     }

    //     fclose($handle);

    //     return redirect()->route('product.all')->with('success', 'Products Imported Successfully!');
    // }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file, "r");

        fgetcsv($handle);

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            Product::create([
                'product_type'      => $data[0],
                'category_id'       => $data[1],
                'vendor_id'       => $data[2],
                'name_en'           => $data[3],
                'name_bn'           => $data[4],
                'slug'              => $data[5],
                'purchase_price'    => $data[6],
                'regular_price'     => $data[7],
                'discount_price'    => $data[8],
                'discount_type'     => $data[9],
                'minimum_buy_qty'   => $data[10],
                'stock_qty'         => $data[11],
                'product_thumbnail' => $data[12],
                'created_by'        => $data[13],
                'status'            => 1,
            ]);
        }

        fclose($handle);

        return redirect()->route('product.all')
            ->with('success', 'Products Imported Successfully!');
    }

    // upload product csv file

    // end method
    public function detailsProduct($id)
    {

        $product = Product::findOrFail($id);

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $vendors = Vendor::latest()->get();
        $suppliers = Supplier::latest()->get();
        $units = Unit::latest()->get();
        $attributes = Attribute::latest()->get();

        //dd($product->stocks);

        return view('backend.product.product_details', compact('categories', 'vendors', 'suppliers', 'brands', 'attributes', 'product', 'multiImgs', 'units'));
    }
    /*=================== Start ProductUpdate Methoed ===================*/
    public function ProductUpdate(Request $request, $id)
    {
        //        return $request->discount_price;
        $product = Product::find($id);

        $this->validate($request, [
            'name_en'               => 'required|max:150',
            'purchase_price'        => 'required|numeric',
            'wholesell_price'       => 'nullable|numeric',
            'discount_price'        => 'required|numeric',
            'regular_price'         => 'required|numeric',
            'stock_qty'             => 'required|integer',
            'short_description_en'  => 'required|string',
            'description_en'        => 'required|string',
            'category_id'           => 'required|integer',
            'brand_id'              => 'nullable|integer',
            'unit_id'               => 'nullable|integer',
            'unit_weight'           => 'nullable|numeric',
        ]);

        if (!$request->name_bn) {
            $request->name_bn = $request->name_en;
        }

        if (!$request->description_bn) {
            $request->description_bn = $request->description_en;
        }

        if ($request->name_en != $product->name_en) {
            if ($request->slug != null) {
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            } else {
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name_en)) . '-' . Str::random(5);
            }
        } else {
            $slug = $product->slug;
        }

        if ($request->vendor_id == null || $request->vendor_id == "") {
            $request->vendor_id = 0;
        }

        if ($request->brand_id == null || $request->brand_id == "") {
            $request->brand_id = 0;
        }

        if ($request->points == null || $request->points == "") {
            $request->points = 0;
        }

        if ($request->supplier_id == null || $request->supplier_id == "") {
            $request->supplier_id = 0;
        }

        if ($request->unit_id == null || $request->unit_id == "") {
            $request->unit_id = 0;
        }

        if ($request->hasfile('product_thumbnail')) {
            try {
                if (file_exists($product->product_thumbnail)) {
                    unlink($product->product_thumbnail);
                }
            } catch (Exception $e) {
            }
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(438, 438)->save('upload/products/thumbnails/' . $name_gen);
            $save_url = 'upload/products/thumbnails/' . $name_gen;
        } else {
            $save_url = $product->product_thumbnail;
        }

        $product->update([
            'brand_id'              => $request->brand_id,
            'category_id'           => $request->category_id,
            'vendor_id'             => $request->vendor_id,
            'supplier_id'           => $request->supplier_id,
            'unit_id'               => $request->unit_id,
            'name_en'               => $request->name_en,
            'name_bn'               => $request->name_bn,
            'slug'                  => $slug,
            'unit_weight'           => $request->unit_weight,
            'purchase_price'        => $request->purchase_price,
            'regular_price'         => $request->regular_price,
            'discount_price'        => $request->discount_price,
            'discount_type'         => $request->discount_type,
            'product_code'          => rand(10000, 99999),
            'minimum_buy_qty'       => $request->minimum_buy_qty,
            'stock_qty'             => $request->stock_qty,
            'short_description_en'  => $request->short_description_en,
            'short_description_bn'  => $request->short_description_bn,
            'description_en'        => $request->description_en,
            'description_bn'        => $request->description_bn,
            'is_featured'           => $request->is_featured ? 1 : 0,
            'is_replaceable'        => $request->is_replaceable ? 1 : 0,
            'is_deals'              => $request->is_deals ? 1 : 0,
            'is_digital'            => $request->is_digital ? 1 : 0,
            'is_affiliate'          => $request->is_affiliate ? 1 : 0,
            'status'                => $request->status ? 1 : 0,
            'points'                => $request->points,
            'product_thumbnail'     => $save_url,
            'created_by'            => Auth::guard('admin')->user()->id,
        ]);

        /* ========= Product Previous Stock Clear ========= */
        $product_stocks = $product->stocks;
        if (count($product_stocks) > 0) {
            if ($request->is_variation_changed) {
                foreach ($product_stocks as $stock) {
                    // unlink($stock->image);
                    try {
                        if (file_exists($stock->image)) {
                            unlink($stock->image);
                        }
                    } catch (Exception $e) {
                    }
                    $stock->delete();
                }
            } else {

                foreach ($product_stocks as $stock) {
                    $variant = $stock->id . "_variant";
                    $price = $stock->id . "_price";
                    $sku = $stock->id . "_sku";
                    $qty = $stock->id . "_qty";
                    $image = $stock->id . "_image";

                    $stock->update([
                        'sku' => $request->$sku,
                        'price' => $request->$price,
                        'qty' => $request->$qty,
                    ]);
                }
            }
        }

        if ($request->is_variation_changed) {
            /* ========= Product Attributes Start ========= */
            $attribute_values = array();
            if ($request->has('choice_attributes')) {
                foreach ($request->choice_attributes as $key => $attribute) {
                    $atr = 'choice_options' . $attribute;
                    $item['attribute_id'] = $attribute;
                    $data = array();

                    foreach ($request[$atr] as $key => $value) {
                        array_push($data, $value);
                    }

                    $item['values'] = $data;
                    array_push($attribute_values, $item);
                }
            }

            if (!empty($request->choice_attributes)) {
                $product->attributes = json_encode($request->choice_attributes);
                $product->is_varient = 1;

                if ($request->has('vnames')) {
                    $i = 0;
                    foreach ($request->vnames as $key => $name) {
                        $stock = ProductStock::create([
                            'product_id' => $product->id,
                            'varient'    => $name,
                            'sku'        => $request->vskus[$i],
                            'price'      => $request->vprices[$i],
                            'qty'        => $request->vqtys[$i],
                        ]);
                        //                        return $request->vimages[$i] ;
                        if ($request->vimages) {
                            $image = $request->vimages[$i];
                        } else {
                            $image = 0;
                        }

                        if ($image) {
                            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                            Image::make($image)->resize(438, 438)->save('upload/products/variations/' . $name_gen);
                            $save_url = 'upload/products/variations/' . $name_gen;
                        } else {
                            $save_url = '';
                        }

                        $stock->image = $save_url;
                        $stock->save();

                        $i++;
                    }
                }
            } else {
                $product->attributes = json_encode(array());
                $product->is_varient = 0;
            }

            $attr_values = collect($attribute_values);
            $attr_values_sorted = $attr_values->sortByDesc('attribute_id');

            $sorted_array = array();
            foreach ($attr_values_sorted as $attr) {
                array_push($sorted_array, $attr);
            }

            $product->attribute_values = json_encode($sorted_array, JSON_UNESCAPED_UNICODE);
            /* ========= End Product Attributes ========= */
        }


        /* =========== Start Product Tags =========== */
        // $product->tags = implode(',', $request->tags);
        /* =========== End Product Tags =========== */

        /* =========== Multiple Image Update =========== */

        $images = $request->file('multi_img');

        if ($images == Null) {
            $product->multi_imgs->photo_name = $request->multi_img;
            $product->update();
        } else {
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;

                MultiImg::insert([
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }
        }

        $product->save();

        if ($product->product_type == '2') {
            DB::table('group_products')->where('product_id', $product->id)->delete();

            foreach ($request->group_id as $key => $group) {
                $group_product = new GroupProduct();
                $group_product->product_id =  $product->id;
                $group_product->group_product_id =  $group;
                $group_product->status = $request->status ? 1 : 0;
                $group_product->save();
            }
        }

        Session::flash('success', 'Product Updated Successfully');
        return redirect()->route('product.all');
    } // end method
    /*=================== End ProductUpdate Methoed ===================*/

    /*=================== Start Multi Image Delete =================*/
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        try {
            if (file_exists($oldimg->photo_name)) {
                unlink($oldimg->photo_name);
            }
        } catch (Exception $e) {
        }
        MultiImg::findOrFail($id)->delete();


        return response()->json(['success' => 'Product Deleted Successfully']);
    } // end method
    /*=================== End Multi Image Delete =================*/

    /*=================== Start ProductDelete Method =================*/
    public function ProductDelete($id)
    {

        if (!demo_mode()) {
            $product = Product::findOrFail($id);
            if (CampaingProduct::where('product_id', $id)->get()) {
                CampaingProduct::where('product_id', $id)->delete();
            }
            if (GroupProduct::where('product_id', $id)->get()) {
                GroupProduct::where('product_id', $id)->delete();
            }

            try {
                if (file_exists($product->product_thumbnail)) {
                    unlink($product->product_thumbnail);
                }
            } catch (Exception $e) {
            }

            $product->delete();

            $images = MultiImg::where('product_id', $id)->get();
            foreach ($images as $img) {
                try {
                    if (file_exists($img->photo_name)) {
                        unlink($img->photo_name);
                    }
                } catch (Exception $e) {
                }
                MultiImg::where('product_id', $id)->delete();
            }
            if ($product->product_type == '2') {
                DB::table('group_products')->where('product_id', $product->id)->delete();
            }

            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Product can not be deleted on demo mode.',
                'alert-type' => 'error'
            );
        }

        return redirect()->back()->with($notification);
    } // end method
    /*=================== End ProductDelete Method =================*/

    // product authenticity_status start method
    // public function updateAuthenticity(Request $request, Product $product)
    // {
    //     // Only Admin (role = 1)
    //     if (Auth::guard('admin')->user()->role != 1) {
    //         abort(403);
    //     }

    //     $request->validate([
    //         'authenticity_status' => 'required|in:0,1,2'
    //     ]);

    //     $product->update([
    //         'authenticity_status' => $request->authenticity_status
    //     ]);

    //     return back()->with('success', 'Product authenticity updated successfully.');
    // }


    public function updateAuthenticity(Request $request, Product $product)
    {
        if (Auth::guard('admin')->user()->role != 1) {
            abort(403);
        }

        $request->validate([
            'authenticity_status' => 'required|in:0,1,2'
        ]);

        DB::transaction(function () use ($request, $product) {

            $product->update([
                'authenticity_status' => $request->authenticity_status,
                'status' => $request->authenticity_status == 1 ? 1 : 0
            ]);

            if ($request->authenticity_status == 2) {

                $orderIds = DB::table('order_details')
                    ->where('product_id', $product->id)
                    ->pluck('order_id')
                    ->unique();

                Order::whereIn('id', $orderIds)
                    ->whereIn('deliver_status', [
                        'pending',
                        'confirmed',
                        'shipped',
                        'picked up',
                        'on the way'
                    ])
                    ->update([
                        'deliver_status' => 'cancelled',
                        'cancel_reason'  => 'Product marked as fake by admin'
                    ]);
            }
        });

        return back()->with('success', 'Product authenticity updated successfully.');
    }

    // product authenticity_status start method

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        $notification = array(
            'message' => 'Product Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function inactive($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        $notification = array(
            'message' => 'Product Inactive Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } // end method

    /*=================== Start Featured Methoed ===================*/
    public function featured($id)
    {
        $product = Product::find($id);
        if ($product->is_featured == 1) {
            $product->is_featured = 0;
        } else {
            $product->is_featured = 1;
        }
        $product->save();
        $notification = array(
            'message' => 'Product Feature Status Changed Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    /*=================== Start Category With SubCategory  Ajax ===================*/
    public function GetSubProductCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    } // end method

    /*=================== Start SubCategory With Childe Ajax ===================*/
    public function GetSubSubCategory($subcategory_id)
    {
        $childe = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($childe);
    } // end method

    public function add_more_choice_option(Request $request)
    {
        $attributes = Attribute::whereIn('id', $request->attribute_ids)->get();
        // dd($attributes);
        return view('backend.product.attribute_select_value', compact('attributes'));
    }


    /* ============== Category Store Ajax ============ */
    public function categoryInsert(Request $request)
    {

        if ($request->name_en == Null) {
            return response()->json(['error' => 'Category Field  Required']);
        }

        $category = new Category();

        $category->name_en = $request->name_en;

        /* ======== Category Name English ======= */
        $category->name_en = $request->name_en;
        if ($request->name_bn == '') {
            $category->name_bn = $request->name_en;
        } else {
            $category->name_bn = $request->name_bn;
        }

        /* ======== Category Parent Id  ======= */
        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);

            // dd($parent);
            $category->type = $parent->type + 1;
        }

        /* ======== Category Slug   ======= */
        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        } else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name_en)) . '-' . Str::random(5);
        }

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;
        } else {
            $save_url = '';
        }

        $category->image = $save_url;
        $category->created_by = Auth::guard('admin')->user()->id;
        $category->save();

        $categories = Category::with('childrenCategories')->orderBy('name_en', 'asc')->get();

        return response()->json([
            'success' => 'Category Inserted Successfully',
            'categories' => $categories,
        ]);
    }

    /* ============== Brand Store Ajax ============ */

    /* ============== Brand Store Ajax ============== */
    public function brandInsert(Request $request)
    {

        if ($request->name_en == Null) {
            return response()->json(['error' => 'Brand Field  Required']);
        }

        $brand = new Brand();

        $brand->name_en = $request->name_en;

        /* ======== brand Name English ======= */
        $brand->name_en = $request->name_en;
        if ($request->name_bn == '') {
            $brand->name_bn = $request->name_en;
        } else {
            $brand->name_bn = $request->name_bn;
        }

        /* ======== Category Slug   ======= */
        if ($request->slug != null) {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        } else {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name_en)) . '-' . Str::random(5);
        }



        // dd($request->image);


        if ($request->hasfile('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;
        } else {
            $save_url = '';
        }

        $brand->brand_image = $save_url;
        $brand->created_by = Auth::guard('admin')->user()->id;

        $brand->save();
        $brands = Brand::all();

        return response()->json([
            'success' => 'Brand Inserted Successfully',
            'brands' => $brands,
        ]);
    }


    public function lowstock()
    {
        $user = Auth::guard('admin')->user();
        $vendor = Vendor::where('user_id', $user->id)->first();

        if ($user->role == '2' && $vendor) {
            $vendorLowStockProducts = DB::table('products as s')
                ->where('s.stock_qty', '<=', 5)
                ->where('s.vendor_id', $vendor->id) // শুধু ওই vendor-এর products
                ->get();

            return view('backend.product.lowstock', compact('vendorLowStockProducts'));
        }

        // Admin role হলে vendor_id null products দেখাবে
        if ($user->role == '1') {
            $adminLowStockProducts = DB::table('products as s')
                ->where('s.stock_qty', '<=', 5)
                ->whereNull('s.vendor_id')
                ->get();

            return view('backend.product.lowstock', compact('adminLowStockProducts'));
        }

        // অন্য কোনো role থাকলে empty view
        return view('backend.product.lowstock');
    }



    public function updateAffiliateCommission(Request $request, $id)
    {
      //  dd($request->all());
        $request->validate([
            'affiliate_commission' => 'nullable|numeric|min:0',
            'affiliate_commission_type' => 'nullable|in:1,2',
        ]);

        $product = Product::findOrFail($id);


        if ($request->filled('affiliate_commission')) {
            $product->affiliate_commission = $request->affiliate_commission;
            $product->affiliate_commission_type = $request->affiliate_commission_type ?? 1;
        }

        $product->save();

        return redirect()->back()->with('success', 'Affiliate commission updated successfully!');
    }
}
