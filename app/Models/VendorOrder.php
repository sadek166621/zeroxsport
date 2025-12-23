<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorOrder extends Model
{
    use HasFactory;

    protected $table = 'vendor_orders';

    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

  public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}
}
