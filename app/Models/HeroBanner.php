<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'banner_image',
        'link',
        'sort_order',
        'is_active',
        'type'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getSliders()
    {
        return self::where('type', 'slider')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public static function getFeaturedBanners()
    {
        return self::where('type', 'featured')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();
    }
}
