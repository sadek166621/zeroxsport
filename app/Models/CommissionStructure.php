<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionStructure extends Model
{
    use HasFactory;

    protected $table = 'commission_structures';
    protected $guarded = ['id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
