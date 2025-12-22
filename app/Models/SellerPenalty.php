<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPenalty extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
