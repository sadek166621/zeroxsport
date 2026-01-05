<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
protected $appends = ['product_affiliate_commission'];

    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function unit(){
    	return $this->belongsTo(Unit::class,'unit_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
    public function multi_imgs()
    {
        return $this->hasMany(MultiImg::class);
    }

    public function group_product()
    {
        return $this->hasMany(GroupProduct::class, 'id', 'product_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


public function getProductAffiliateCommissionAttribute()
{
    $overrideAmount = $this->attributes['affiliate_commission'] ?? null;
    $overrideType   = $this->attributes['affiliate_commission_type'] ?? null;

    // ১. Product override (highest priority)
    if (
        $overrideAmount !== null &&
        $overrideAmount > 0 &&
        in_array($overrideType, [0, 1])
    ) {
        return [
            'amount' => $overrideAmount,
            'type'   => $overrideType == 0 ? 'percentage' : 'flat',
            'source' => 'product_override'
        ];
    }

    // ২. Category chain search: self → parent → grandparent → ... → root
    $categoryId = $this->category_id;

    while ($categoryId) {
        $structure = DB::table('commission_structures')
            ->where('category_id', $categoryId)
            ->where('status', 1)
            ->first();

        if ($structure) {
            return [
                'amount' => $structure->commission_rate,
                'type'   => $structure->commission_type, // 'flat' or 'percentage'
                'source' => 'category_structure'
            ];
        }

        // Next parent খুঁজো
        $parentId = DB::table('categories')
            ->where('id', $categoryId)
            ->value('parent_id');

        $categoryId = $parentId > 0 ? $parentId : null; // root (0) হলে stop
    }

    // ৩. কিছুই না পেলে
    return [
        'amount' => 0,
        'type'   => null,
        'source' => 'none'
    ];
}

public function getAffiliateCommissionAmountAttribute()
{
    return $this->product_affiliate_commission['amount'];
}
}
