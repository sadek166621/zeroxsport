@extends('FrontEnd.master')
@section('title', 'Home')

@section('content')
<style>
    :root {
        --primary-color: #ed1c24;
        --primary-hover: #c9171e;
        --text-dark: #242424;
        --text-light: #666;
        --bg-light: #f8f8f8;
        --border-color: #e5e5e5;
    }

    body {
        font-family: 'Roboto', sans-serif;
    }

    /* Promotional Banner */
    .promo-banner {
        background-color: #000;
        text-align: center;
        padding: 8px;
        font-size: 16px;
        color: white;
        font-weight: 600;
    }

    .promo-banner span {
        color: var(--primary-color);
    }

    /* Main Content Wrapper */
    .main-content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px 15px;
    }

    /* Section Headers */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 26px;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-color);
    }

    .view-all-btn {
        background: transparent;
        color: var(--text-dark);
        border: 2px solid var(--border-color);
        padding: 10px 25px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .view-all-btn:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .view-all-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<!-- Promotional Banner -->
<div class="promo-banner">
    <strong>World Cup Sale: Get Flat 20% OFF With Coupon Code <span>WORLDCUP20</span> - Limited Time Offer!</strong>
</div>

<div class="main-content-wrapper">
    <!-- Hero Section -->
    @include('FrontEnd.home.hero_section')
    
    <!-- Shop By Categories -->
    @include('FrontEnd.home.categories_section')
    
      <!-- Promotional Banners -->
    @if(isset($home_banners) && $home_banners->count() > 0)
<div class="row mb-5">
    @foreach($home_banners as $banner)
    <div class="col-md-4 mb-3">
        <div class="promo-card">
            <img src="{{ asset($banner->banner_img) }}" alt="{{ $banner->title ?? 'Banner' }}" class="img-fluid">
            <div class="promo-content">
                <h3>{{ $banner->title ?? 'Special Offer' }}</h3>
                <a href="{{ $banner->link ?? '#' }}" class="promo-btn">Shop Now</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
    
    <!-- Featured Products -->
    @include('FrontEnd.home.featured_product_section')
    
    <!-- Promotional Banners -->
    @if(isset($home_banners) && $home_banners->count() > 0)
<div class="row mb-5">
    @foreach($home_banners as $banner)
    <div class="col-md-4 mb-3">
        <div class="promo-card">
            <img src="{{ asset($banner->banner_img) }}" alt="{{ $banner->title ?? 'Banner' }}" class="img-fluid">
            <div class="promo-content">
                <h3>{{ $banner->title ?? 'Special Offer' }}</h3>
                <a href="{{ $banner->link ?? '#' }}" class="promo-btn">Shop Now</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
    
    <!-- Flash Sale -->
    @include('FrontEnd.home.flash_sale_section')
    
    <!-- Latest Products -->
    @include('FrontEnd.home.latest_product_section')
    
    <!-- About Section -->
    @include('FrontEnd.home.about_section')
</div>

@include('FrontEnd.include.cart-contianer')

<style>
    /* Promotional Card Styles */
    .promo-card {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .promo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(237, 28, 36, 0.2);
    }
    
    .promo-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .promo-card:hover img {
        transform: scale(1.05);
    }
    
    .promo-content {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        text-align: center;
    }
    
    .promo-content h3 {
        color: white;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .promo-btn {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .promo-btn:hover {
        background: var(--primary-hover);
        color: white;
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .promo-card img {
            height: 100%;
        }
        
        .promo-content h3 {
            font-size: 20px;
        }
        
        .promo-btn {
            padding: 8px 20px;
            font-size: 14px;
        }
    }
</style>
@endsection