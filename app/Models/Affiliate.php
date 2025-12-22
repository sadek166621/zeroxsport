<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Affiliate extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'affiliates';

    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
