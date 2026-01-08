<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReturnRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'comment',
        'status',
    ];

    public static function add($request)
    {
        // Prevent duplicate return request for same order
        $exists = self::where('order_id', $request->order_id)->first();
        if ($exists) {
            return $exists; // or throw exception if you want
        }

        return self::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id,
            'comment' => $request->comment,
            'status' => 0, // Pending
        ]);
    }

    /**
     * ==========================
     * Relationships
     * ==========================
     */

    /**
     * Return request belongs to a user (customer)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
    public function returningProducts()
    {
        return $this->hasMany(ReturningProduct::class, 'request_id');
    }
}
