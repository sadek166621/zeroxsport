<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class ReturningProduct extends Model
{
    use HasFactory;
    private static $product;

    // public static function add($returnRequest, $request, $ordered_product_id)
    // {

    //     for ($i = 0; $i < count($request->product_id); $i++) {
    //         $product_id = OrderDetail::find($request->product_id[$i]);
    //         self::$product = new ReturningProduct();
    //         self::$product->request_id = $returnRequest->id;
    //         self::$product->product_id = $product_id->product_id;



    //         self::$product->ordered_product_id = $request->product_id[$i];
    //         self::$product->qty = $request->qty[$i];
    //         self::$product->issue = $request->issue[$i];
    //         self::$product->image = self::imageUrl($request->image[$i]);
    //         self::$product->save();
    //         if (count($request->product_id) == 1) {
    //             break;
    //         }
    //     }
    // }

    public static function add($returnRequest, $request, $ordered_product_id)
{
    for ($i = 0; $i < count($request->product_id); $i++) {

        // Correct variable name
        $orderDetail = OrderDetail::with('product')->findOrFail($request->product_id[$i]);

        self::$product = new ReturningProduct();

        // Return request
        self::$product->request_id = $returnRequest->id;

        // Product id
        self::$product->product_id = $orderDetail->product_id;

        // Ordered product id (order_details id)
        self::$product->ordered_product_id = $orderDetail->id;
        self::$product->vendor_id = $orderDetail->vendor_id ?? $orderDetail->product->vendor_id ?? null;

        // Quantity and issue
        self::$product->qty = $request->qty[$i];
        self::$product->issue = $request->issue[$i];

        // Image
        self::$product->image = self::imageUrl($request->image[$i]);

        // Save
        self::$product->save();

        // Optional break if only 1 product
        if (count($request->product_id) == 1) {
            break;
        }
    }
}

    private static function imageUrl($image)
    {
        $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/return-product/' . $make_name);
        $uploadPath = 'upload/return-product/' . $make_name;
        return $uploadPath;
    }

    public static function updateStatus($request)
    {
        $returning_products = ReturningProduct::where('request_id', $request->request_id)->get();
        foreach ($returning_products as $key => $item) {
            if ($item->issue == 'damaged_product' && $request->status[$key] == 1) {
                reduceStock($item);
            }
            $item->status = $request->status[$key];
            $item->save();
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function returnRequest()
    {
        return $this->belongsTo(ReturnRequest::class, 'request_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
