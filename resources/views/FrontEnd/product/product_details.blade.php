@extends('FrontEnd.master')
@section('title')
    {{ $product->name_en }} Details
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/magiczoomplus/magiczoomplus.css') }}" />
@endpush
@section('content')
    <style>
        .breadcrumb-item a {
            font-weight: 500;
            font-size: 16px !important;
        }

        .details-title {
            font-size: 32px;
            font-weight: 600;
            line-height: 50px;
            margin-bottom: 15px;
            margin-top: 15px;

        }

        .product-image {
            border-radius: 8px;
            width: 100%;
            height: auto;
            aspect-ratio: 1/1;
            object-fit: cover;
        }

        .discount-position {
            background-color: #006A4E;
            color: #f8f9fa;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            font-size: 20px;
            text-align: center;
            z-index: 50;
            line-height: 1.2;
        }

        .old-price {
            margin-left: 10px;
            font-size: 16px;
        }

        .buy_now {
            background-color: #006A4E;
            border: none;
            border-radius: 5px;
            color: white !important;
        }

        .product_card {
            background: #fff;
            border: 2px solid #006A4E;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(1, 180, 94, 0.08);
            transition: box-shadow 0.2s, border-color 0.2s;
            padding: 0;
            position: relative;
            overflow: hidden;
            display: flex;
            gap: 10px;
            align-items: start;
        }

        .product-details-title {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            color: #4a4a4a !important;
        }

        .quantity-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .quantity-label {
            font-size: 14px;
            font-weight: 500;
            color: #4a4a4a;
        }

        .quantity-controls {
            display: inline-flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
            padding: 4px;
        }

        .qty-btn {
            background: #006A4E;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .qty-btn:hover {
            background: #019950;
        }

        .qty-btn i {
            font-size: 12px;
            color: #fff;
        }

        .qty-btn:disabled {
            background: #e9ecef;
            cursor: not-allowed;
        }

        .qty-input {
            width: 45px;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            color: #2c3e50;
            border: none;
            background: transparent;
            margin: 0 0.5rem;
            padding: 0;
        }

        .qty-alert {
            font-size: 12px;
            color: #dc3545;
            margin-left: 8px;
        }


        /* related product css */
        .related-products {
            background: #fff;
            border-radius: 10px;
            padding: 10px 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .related-card {
            transition: all 0.25s ease-in-out;
            background: #fafafa;
        }

        .related-card:hover {
            background: #f1f9ff;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .related-img {
            width: 70px;
            height: 70px;
            overflow: hidden;
            border-radius: 8px;
        }

        .related-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-title {
            font-size: 14px;
            line-height: 1.2;
        }

        .price {
            font-size: 15px;
        }
    </style>

    <style>
        /* Main Product Image Container */
        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: #f8f9fa;
            cursor: zoom-in;
            width: ;
        }

        .product-image {
            border-radius: 8px;
            width: 100%;
            height: auto;
            aspect-ratio: 1/1;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Zoom effect on hover */
        .product-image-container:hover .product-image {
            transform: scale(1.5);
        }

        /* Thumbnail Gallery */
        .thumbnail-gallery {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .thumbnail-item {
            width: 70px;
            height: 70px;
            border-radius: 6px;
            overflow: hidden;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .thumbnail-item:hover {
            border-color: #006A4E;
            transform: scale(1.05);
        }

        .thumbnail-item.active {
            border-color: #006A4E;
            box-shadow: 0 0 0 1px #006A4E;
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .discount-position {
            background-color: #006A4E;
            color: #f8f9fa;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            font-size: 20px;
            text-align: center;
            z-index: 50;
            line-height: 1.2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Variant Selection Styles (Inspired by https://anshifood.com/product-details/testPrdouct-Uj1e7) */
        .variant-section {
            /* margin: 1.5rem 0; */
            animation: slideInUp 0.4s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .variant-title {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 1rem;
            text-transform: capitalize;
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .variant-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 16px;
            background: linear-gradient(180deg, #026745 0%, #01513d 100%);
            border-radius: 2px;
        }

        .variant-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* padding: 12px;
            background: #f8fafb;
            border-radius: 10px;
            border: 1px solid #e8ecf1; */
        }

        .variant-option {
            display: none;
        }

        .variant-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 70px;
            padding: 10px 18px;
            border: 2px solid #d4dce6;
            border-radius: 8px;
            background: #ffffff;
            color: #424242;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            white-space: nowrap;
            user-select: none;
            position: relative;
            overflow: hidden;
        }

        .variant-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(2, 103, 69, 0.08);
            transition: left 0.3s ease;
            z-index: 0;
        }

        .variant-label:hover {
            border-color: #026745;
            color: #026745;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(2, 103, 69, 0.12);
        }

        .variant-label:hover::before {
            left: 0;
        }

        .variant-option:checked+.variant-label {
            border-color: #026745;
            background: linear-gradient(135deg, #026745 0%, #01513d 100%);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(2, 103, 69, 0.3);
            transform: scale(1.02);
        }

        /* .variant-option:checked+.variant-label::before {
            content: '✓';
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: auto;
            height: auto;
            left: auto;
            background: none;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            animation: checkPulse 0.4s ease;
        } */

        @keyframes checkPulse {
            0% {
                transform: translateY(-50%) scale(0);
                opacity: 0;
            }

            50% {
                transform: translateY(-50%) scale(1.2);
            }

            100% {
                transform: translateY(-50%) scale(1);
                opacity: 1;
            }
        }

        .variant-option:focus+.variant-label {
            outline: 2px solid #026745;
            outline-offset: 2px;
        }

        .variant-option:disabled+.variant-label {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f5f5f5;
        }

        @media (max-width: 768px) {
            .variant-section {
                /* margin: 1rem 0; */
            }

            .variant-title {
                font-size: 14px;
                margin-bottom: 0.75rem;
            }

            .variant-options {
                gap: 8px;
                padding: 10px;
            }

            .variant-label {
                min-width: 60px;
                padding: 8px 14px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .variant-label {
                min-width: 50px;
                padding: 7px 12px;
                font-size: 12px;
            }
        }
    </style>

    @php
                            $description_english=$product->description_en;
                            $description_bangla=$product->description_bn;
                            $product_name_en=$product->name_en;
                            $product_name_bn=$product->name_bn;

                            
                            @endphp
    <!-- Product Information Start -->
    <section class="custom_container  my-3  " style="border-radius: 10px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom  mb-0 d-flex align-items-center gap-2">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" style="color: #006A4E; text-decoration: none; transition: all 0.3s;">
                        @if (session()->get('language') == 'bangla')
                            হোম
                        @else
                            Home
                        @endif
                    </a>
                </li>
                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
                <li class="breadcrumb-item">
                    <a href="{{ route('product.category', $product->category->slug) }}"
                        style="color: #006A4E; text-decoration: none; transition: all 0.3s;">
                        @if (session()->get('language') == 'bangla')
                            {{ $product->category->name_bn ?? '' }}
                        @else
                            {{ $product->category->name_en ?? '' }}
                        @endif
                    </a>
                </li>
                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
                <li class="breadcrumb-item active" style=" font-weight: 600;">
                    @if (session()->get('language') == 'bangla')
                        {{ $product_name_bn }}
                    @else
                        {{ $product_name_en }}
                    @endif
                </li>
            </ol>
        </nav>
        <div class="row g-5 m-0">
            <?php $discount = calculateDiscount($product->id); ?>
            <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

            <input type="hidden" id="pname" value="{{ $product->name_en }}">

            <input type="hidden" id="product_price" value="{{ $discount['discount'] }}">

            <input type="hidden" id="minimum_buy_qty" value="{{ $product->minimum_buy_qty }}">
            <input type="hidden" id="stock_qty" value="{{ $product->stock_qty }}">

            <input type="hidden" id="pvarient" value="">

            <input type="hidden" id="buyNowCheck" value="0">
            <input type="hidden" name="" id="discount_amount"
                value="{{ $product->regular_price - $discount['discount'] }}">
            <div class="col-md-9 bg-white p-3 mt-2" style="border-radius: 10px;">
                <div class="row">

                    <div class="col-md-6">
                        <section id="default" class="padding-top0">
                            <div class="position-relative">
                                <!-- Main Product Image -->
                                <div class="product-image-container">
                                    <img class="product-image" id="mainProductImage"
                                        src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}" />

                                    <!-- Discount Badge -->
                                    <!--<div-->
                                    <!--    class="{{ $discount['discount'] == $product->regular_price ? 'd-none' : 'discount-position' }}">-->
                                    <!--    <small>{{ str_replace(['(', ')', '-'], '', $discount['text']) }} OFF</small>-->
                                    <!--</div>-->
                                </div>

                                <!-- Thumbnail Gallery -->
                                <div class="thumbnail-gallery">
                                    <!-- Main Thumbnail -->
                                    <div class="thumbnail-item active"
                                        data-image="{{ asset($product->product_thumbnail) }}">
                                        <img src="{{ asset($product->product_thumbnail) }}" alt="Product Image">
                                        
                                    </div>

                                    <!-- Additional Images -->
                                    @foreach ($multiImg as $image)
                                        <div class="thumbnail-item" data-image="{{ asset($image->photo_name) }}">
                                            <img src="{{ asset($image->photo_name) }}" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-6" style="position: relative;">
                        <div>
                            <span class="stock-status {{ $product->stock_qty > 0 ? 'bg-success' : 'bg-danger' }}">

                                <span class="text-white px-2 py-1" style="border-radius: 10px;">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $product->stock_qty > 0 ? 'স্টকে আছে' : 'স্টক আউট' }}
                                    @else
                                        {{ $product->stock_qty > 0 ? 'In Stock' : 'Out of Stock' }}
                                    @endif
                                </span>
                                <span id="stock_qty" class="text-white px-2 py-1" style="border-radius: 10px;">
                                    {{ $product->stock_qty != 0 ? '(' . $product->stock_qty . ')' : '' }}
                                </span>
                            </span>
                        </div>

                        <h1 class="details-title" style="color:#4a4a4a !important">
                            @if (session()->get('language') == 'bangla')
                                {{ $product->name_bn }}
                            @else
                                {{ $product->name_en }}
                            @endif
                        </h1>

                        {{-- <span class="stock-status out-stock"> € {{ $discount }} Off </span> --}}

                        <div>
                            <h4 class="price">
                                @if (session()->get('language') == 'bangla')
                                    মূল্য:
                                @else
                                    Price:
                                @endif
                                @if ($product->is_wholesell == 1)
                                    <!-- Show only regular price for wholesale products -->
                                    <span class="product_price current-price">{{ $product->regular_price }} € </span>
                                    <del class="old-price" style="color: grey">0.00 € </del>
                                @else
                                    <!-- Show discount price and original price -->
                                    <span class="product_price current-price">{{ $discount['discount'] }} € </span>
                                    @if ($discount['discount'] != $product->regular_price)
                                        <del class="old-price {{ $discount['discount'] == 0 ? 'd-none' : '' }}"
                                            style="color: grey">
                                            {{ $product->regular_price }} € 
                                        </del>
                                    @endif
                                @endif
                            </h4>


                            <p class="">
                                @if (session()->get('language') == 'bangla')
                                    ক্যাটাগোরি : {{ $product->category->name_bn ?? '' }}
                                @else
                                    Category : {{ $product->category->name_en ?? '' }}
                                @endif

                            <h6 class="mb-1 mt-2">Description :</h6>
                            <p class="product-description preview-text" style="word-wrap: break-word !important;">
                                @if (session()->get('language') == 'bangla')
                                    {{ Str::limit(strip_tags($product->short_description_bn), 100) }}
                                @else
                                    {{ Str::limit(strip_tags($product->short_description_en), 100) }}
                                @endif
                            </p>

                            
                            {{-- যদি product_type == 2 এবং group_products থাকে --}}
                            @if ($product->product_type == 2 && count($group_products) > 0)
                                <strong>
                                    @if (session()->get('language') == 'bangla')
                                        প্যাকেজের পণ্য সমূহ :
                                    @else
                                        Package Items :
                                    @endif
                                </strong>

                                @foreach ($group_products as $item)
                                    <div class="row mb-1">
                                        <div class="col-md-1">
                                            <a href="{{ route('product.details', $item->product->slug) }}">
                                                <img src="{{ asset($item->product->product_thumbnail) }}"
                                                    alt="{{ $item->product->name_en }}" height="30" width="30">
                                            </a>
                                        </div>
                                        <div class="col-md-11">
                                            <a href="{{ route('product.details', $item->product->slug) }}">
                                                <small>
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $item->product->name_bn }}
                                                    @else
                                                        {{ $item->product->name_en }}
                                                    @endif
                                                </small>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                                <br>
                            @else
                                <p>
                                    @if (session()->get('language') == 'bangla')
                                        ব্র্যান্ড : {{ $product->brand->name_bn ?? '' }}
                                    @else
                                        Brand : {{ $product->brand->name_en ?? 'N/A' }}
                                    @endif
                                </p>

                            @endif
                        </div>

                        <!-- choice form -->
                        <form id="choice_form">
                            <div class="row" id="choice_attributes">
                                @if ($product->is_varient)
                                    @php $i = 0; @endphp
                                    @foreach (json_decode($product->attribute_values) as $attribute)
                                        @php
                                            $attr = get_attribute_by_id($attribute->attribute_id);
                                            $i++;
                                        @endphp
                                        <div class="variant-section mb-3">
                                            <div class="variant-title">{{ $attr->name }}</div>
                                            <input type="hidden" name="attribute_ids[]"
                                                id="attribute_id_{{ $i }}"
                                                value="{{ $attribute->attribute_id }}">
                                            <input type="hidden" name="attribute_names[]"
                                                id="attribute_name_{{ $i }}" value="{{ $attr->name }}">
                                            <input type="hidden" id="attribute_check_{{ $i }}"
                                                value="0">
                                            <input type="hidden" id="attribute_check_attr_{{ $i }}"
                                                value="0">
                                            <div class="variant-options">
                                                @foreach ($attribute->values as $key => $value)
                                                    <input type="radio" class="variant-option"
                                                        onclick="selectAttribute('{{ $attribute->attribute_id }}{{ $attr->name }}', '{{ $value }}', '{{ $product->id }}', '{{ $i }}')"
                                                        name="option_{{ $i }}"
                                                        id="option_{{ $i }}_{{ $key }}"
                                                        value="{{ $value }}" {{ $key == 0 ? 'checked' : '' }}>
                                                    <label for="option_{{ $i }}_{{ $key }}"
                                                        class="variant-label">{{ $value }}</label>
                                                @endforeach
                                                <input type="hidden" name="attribute_options[]"
                                                    id="{{ $attribute->attribute_id }}{{ $attr->name }}"
                                                    class="attr_value_{{ $i }}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <input type="hidden" id="total_attributes"
                                        value="{{ count(json_decode($product->attribute_values)) }}">
                                @endif
                            </div>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Auto-select first variant on page load
                                @if ($product->is_varient)
                                    @php $i = 0; @endphp
                                    @foreach (json_decode($product->attribute_values) as $attribute)
                                        @php $i++; @endphp
                                        const firstOption_{{ $i }} = document.querySelector(
                                            'input[name="option_{{ $i }}"]');
                                        if (firstOption_{{ $i }}) {
                                            firstOption_{{ $i }}.checked = true;
                                            // Trigger the selectAttribute function with the first option value
                                            const firstValue_{{ $i }} = firstOption_{{ $i }}.value;
                                            selectAttribute('{{ $attribute->attribute_id }}{{ $attr->name }}', firstValue_{{ $i }}, '{{ $product->id }}', {{ $i }});
                                            firstOption_{{ $i }}.dispatchEvent(new Event('change', {
                                                bubbles: true
                                            }));
                                        }
                                    @endforeach
                                @endif
                            });
                        </script>

                        <div class="row" id="attribute_alert">

                        </div>
                        @if ($product->stock_qty > 0)
                            <div class="quantity-section">
                                <div class="quantity-label">
                                    @if (session()->get('language') == 'bangla')
                                        পরিমাণ
                                    @else
                                        Quantity
                                    @endif
                                </div>

                                <div class="quantity-controls">
                                    <button type="button" class="qty-btn qty-down" aria-label="Decrease quantity">
                                        <i class="fa fa-minus"></i>
                                    </button>

                                    <input type="text" name="quantity" class="qty-input" value="1"
                                        min="1" max="{{ $product->stock_qty }}" id="qty" readonly>

                                    <button type="button" class="qty-btn qty-up" aria-label="Increase quantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                                <div id="qty_stock_alert" class="qty-alert"></div>
                            </div>

                            <div class="d-flex gap-2">
                                <input type="hidden" id="pfrom" value="direct">
                                <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                                <input type="hidden" id="{{ $product->id }}-product_pname"
                                    value="{{ $product->name_en }}">
                                    
                                @if (Auth::check() && Auth::user()->role == 5)
                                    {{-- Wholeseller --}}
                                    <button class="buy_now" type="button"
                                        style="width:120px; padding:10px; font-size:15px; color:white!important;"
                                        onclick="wholesellerAlert()">
                                        {{ session('language') == 'bangla' ? 'এখনই কিনুন' : 'Buy Now' }}
                                    </button>

                                    <button class="add_to_cart" type="button"
                                        style="width:120px; margin-left:5px; background:white; font-size:15px;"
                                        onclick="wholesellerAlert()">
                                        {{ session('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                    </button>
                                @else
                                    {{-- Normal user --}}
                                    <button class="buy_now" type="button"
                                        style="width:120px; padding:10px; font-size:15px; color:white!important;"
                                        onclick="{{ $product->is_varient == 1 ? 'buyProduct()' : 'buyNowInstant()' }}">
                                        {{ session('language') == 'bangla' ? 'এখনই কিনুন' : 'Buy Now' }}
                                    </button>

                                    <button class="add_to_cart" type="button"
                                        style="width:120px; margin-left:5px; background:white; font-size:15px;"
                                        onclick="addCart({{ $product->id }})">
                                        {{ session('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                    </button>
                                @endif

                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-3 d-md-block d-none mt-0 pt-0">
                <div class="related-products w-100">
                    <h5 class="my-3 fw-bold border-bottom pb-2 text-center">
                        @if (session()->get('language') == 'bangla')
                            সংশ্লিষ্ট পণ্য
                        @else
                            Related Products
                        @endif
                    </h5>

                    <div class="related-product-list">
                        @forelse ($relatedProduct as $product)
                            @php $data = calculateDiscount($product->id); @endphp
                            <a href="{{ route('product.details', $product->slug) }}"
                                class="related-card d-flex align-items-center gap-3 mb-3 text-decoration-none shadow-sm p-2 rounded-3">

                                <div class="related-img flex-shrink-0">
                                    <img src="{{ asset($product->product_thumbnail) }}" alt="Product Image"
                                        class="img-fluid rounded-2">
                                </div>

                                <div class="related-info flex-grow-1">
                                    <p class="product-title mb-1 text-dark fw-semibold">
                                        @if (session()->get('language') == 'bangla')
                                            {{ Str::limit($product->name_bn, 40) }}
                                        @else
                                            {{ Str::limit($product->name_en, 40) }}
                                        @endif
                                    </p>

                                    <div class="d-flex align-items-center gap-2">
                                        @if ($product->is_wholesell == 1)
                                            {{-- Show only regular price --}}
                                            <span class="price fw-bold text-success">{{ $product->regular_price }}
                                                € </span>
                                            <span class="text-muted text-decoration-line-through small">
                                                0.00 € 
                                            </span>
                                        @else
                                            {{-- Show discount + regular price --}}
                                            <span class="price fw-bold text-success">{{ $data['discount'] }} € </span>
                                            @if ($product->regular_price != $data['discount'])
                                                <span class="text-muted text-decoration-line-through small">
                                                    {{ $product->regular_price }} € 
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-center text-muted py-3">No Products Found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Information End -->



    <!-- Description Part Start -->
    <section class="custom_container mb-5">
        <div class="row g-3">
            <div class="col-md-12 bg-white">
                <div class="p-2 p-md-4">
                    <h4>
                        @if (session()->get('language') == 'bangla')
                            পণ্যের বিবরণ
                        @else
                            About this item
                        @endif

                    </h4>
                    <hr>
                    <h6 class="mb-2">Product details</h6>
                    <div class="product-description">

                        @if (session()->get('language') == 'bangla')
                            {!! $description_bangla !!}
                        @else
                            {!! $description_english !!}
                        @endif

                    </div>


                    <style>
                        /* Review Section Styles */
                        .reviews-container {
                            background: #fff;
                            padding: 24px;
                            border-radius: 8px;
                            margin-top: 20px;
                        }

                        .reviews-header {
                            border-bottom: 1px solid #e8e8e8;
                            padding-bottom: 16px;
                            margin-bottom: 24px;
                        }

                        .reviews-header h3 {
                            font-size: 20px;
                            font-weight: 600;
                            color: #212121;
                            margin: 0;
                        }

                        /* Rating Summary */
                        .rating-summary {
                            display: flex;
                            gap: 40px;
                            margin-bottom: 32px;
                            padding: 20px;
                            background: #fafafa;
                            border-radius: 8px;
                            width: 70%;
                        }

                        .overall-rating {
                            text-align: center;
                            padding: 20px;
                        }

                        .rating-number {
                            font-size: 40px;
                            font-weight: 700;
                            color: #212121;
                            line-height: 1;
                            margin-bottom: 8px;
                        }

                        .rating-number span {
                            font-size: 24px;
                            color: #757575;
                        }

                        .star-display {
                            display: flex;
                            gap: 4px;
                            justify-content: center;
                            margin-bottom: 8px;
                        }

                        .star-display .star {
                            color: #faca51;
                            font-size: 20px;
                        }

                        .star-display .star.empty {
                            color: #e0e0e0;
                        }

                        .total-reviews {
                            color: #757575;
                            font-size: 14px;
                        }

                        /* Rating Breakdown */
                        .rating-breakdown {
                            flex: 1;
                        }

                        .rating-row {
                            display: flex;
                            align-items: center;
                            gap: 12px;
                            margin-bottom: 12px;
                            cursor: pointer;
                            transition: background 0.2s;
                            padding: 4px 8px;
                            border-radius: 4px;
                        }

                        .rating-row:hover {
                            background: #f5f5f5;
                        }

                        .rating-row.active {
                            background: #fff3e0;
                        }

                        .star-label {
                            min-width: 60px;
                            display: flex;
                            align-items: center;
                            gap: 4px;
                            color: #212121;
                            font-size: 14px;
                        }

                        .star-label .star {
                            color: #faca51;
                            font-size: 20px;
                        }

                        .progress-bar-container {
                            flex: 1;
                            height: 8px;
                            background: #e8e8e8;
                            border-radius: 4px;
                            overflow: hidden;
                        }

                        .progress-bar-fill {
                            height: 100%;
                            background: #faca51;
                            border-radius: 4px;
                            transition: width 0.3s;
                        }

                        .rating-count {
                            min-width: 40px;
                            text-align: right;
                            color: #757575;
                            font-size: 14px;
                        }



                        .filter-btn {
                            padding: 8px 16px;
                            border: 1px solid #e8e8e8;
                            background: #fff;
                            border-radius: 20px;
                            font-size: 14px;
                            color: #212121;
                            cursor: pointer;
                            transition: all 0.2s;
                        }

                        .filter-btn:hover {
                            border-color: #006A4E;
                            color: #006A4E;
                        }

                        .filter-btn.active {
                            background: #006A4E;
                            color: #fff;
                            border-color: #006A4E;
                        }

                        /* Review Items */
                        .review-list {
                            display: flex;
                            flex-direction: column;
                            gap: 20px;
                        }

                        .review-item {
                            padding: 20px;
                            border: 1px solid #e8e8e8;
                            border-radius: 8px;
                            transition: box-shadow 0.2s;
                            width: 70%;
                        }

                        .review-item:hover {
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
                        }

                        .review-header {
                            display: flex;
                            justify-content: space-between;
                            align-items: start;
                            margin-bottom: 12px;
                        }

                        .reviewer-info {
                            display: flex;
                            align-items: center;
                            gap: 12px;
                        }

                        .reviewer-avatar {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            background: #e8e8e8;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-weight: 600;
                            color: #757575;
                        }

                        .reviewer-details h4 {
                            font-size: 14px;
                            font-weight: 600;
                            color: #212121;
                            margin: 0 0 4px 0;
                        }

                        .review-stars {
                            display: flex;
                            gap: 2px;
                        }

                        .review-stars .star {
                            color: #faca51;
                            font-size: 14px;
                        }

                        .review-stars .star.empty {
                            color: #e0e0e0;
                        }

                        .review-date {
                            font-size: 12px;
                            color: #9e9e9e;
                        }

                        .review-content {
                            margin-bottom: 12px;
                        }

                        .review-text {
                            color: #424242;
                            font-size: 14px;
                            line-height: 1.6;
                            margin-bottom: 12px;
                        }

                        .review-images {
                            display: flex;
                            gap: 8px;
                            flex-wrap: wrap;
                        }

                        .review-image {
                            width: 80px;
                            height: 80px;
                            border-radius: 4px;
                            overflow: hidden;
                            cursor: pointer;
                            border: 1px solid #e8e8e8;
                        }

                        .review-image img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        }

                        .review-footer {
                            display: flex;
                            gap: 16px;
                            padding-top: 12px;
                            border-top: 1px solid #f5f5f5;
                        }

                        .review-action {
                            display: flex;
                            align-items: center;
                            gap: 6px;
                            color: #757575;
                            font-size: 13px;
                            cursor: pointer;
                            transition: color 0.2s;
                        }

                        .review-action:hover {
                            color: #006A4E;
                        }

                        .review-action i {
                            font-size: 16px;
                        }

                        /* Write Review */
                        .write-review-container {
                            margin-top: 32px;
                            padding: 24px;
                            background: #fafafa;
                            border-radius: 8px;
                        }

                        .write-review-container h4 {
                            font-size: 18px;
                            font-weight: 600;
                            margin-bottom: 20px;
                            color: #212121;
                        }

                        .star-rating-input {
                            display: flex;
                            gap: 8px;
                            margin-bottom: 16px;
                        }

                        .star-input {
                            font-size: 32px;
                            color: #e0e0e0;
                            cursor: pointer;
                            transition: color 0.2s;
                        }

                        .star-input:hover,
                        .star-input.active {
                            color: #faca51;
                        }

                        .form-group {
                            margin-bottom: 16px;
                        }

                        .form-group label {
                            display: block;
                            margin-bottom: 8px;
                            font-size: 14px;
                            font-weight: 500;
                            color: #212121;
                        }

                        .form-group textarea {
                            width: 100%;
                            padding: 12px;
                            border: 1px solid #e0e0e0;
                            border-radius: 4px;
                            font-size: 14px;
                            resize: vertical;
                            min-height: 120px;
                        }

                        .form-group textarea:focus {
                            outline: none;
                            border-color: #006A4E;
                        }

                        .submit-review-btn {
                            background: #006A4E;
                            color: #fff;
                            border: none;
                            padding: 12px 32px;
                            border-radius: 4px;
                            font-size: 14px;
                            font-weight: 600;
                            cursor: pointer;
                            transition: background 0.2s;
                        }

                        .submit-review-btn:hover {
                            background: #d9621e;
                        }

                        /* Load More */
                        .load-more-container {
                            text-align: center;
                            margin-top: 24px;
                        }

                        .load-more-btn {
                            padding: 12px 32px;
                            border: 1px solid #e8e8e8;
                            background: #fff;
                            border-radius: 4px;
                            color: #212121;
                            font-size: 14px;
                            cursor: pointer;
                            transition: all 0.2s;
                        }

                        .load-more-btn:hover {
                            border-color: #006A4E;
                            color: #006A4E;
                        }

                        .verified-badge {
                            display: inline-flex;
                            align-items: center;
                            gap: 4px;
                            background: #e8f5e9;
                            color: #2e7d32;
                            padding: 2px 8px;
                            border-radius: 12px;
                            font-size: 11px;
                            font-weight: 500;
                        }

                        .verified-badge i {
                            font-size: 12px;
                        }

                        @media (max-width: 768px) {
                            .reviews-container {
                                padding: 0;
                            }

                            .rating-summary {
                                flex-direction: column;
                                gap: 20px;
                                width: 100%;
                            }

                            .review-item {
                                width: 100%;
                            }


                        }
                    </style>

                    <!-- Reviews Section HTML -->
                    <div class="reviews-container">
                        <div class="reviews-header">
                            <h3>Ratings & Reviews of ({{ $product_name_en }})</h3>
                        </div>

                        <!-- Rating Summary -->
                        <div class="rating-summary">
                            <div class="overall-rating">
                                <div class="rating-number">
                                    {{ number_format($average_rating, 1) }}<span>/5</span>
                                </div>
                                <div class="star-display">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= round($average_rating) ? '' : 'empty' }}">★</span>
                                    @endfor
                                </div>
                                <div class="total-reviews">{{ $total_ratings }} Ratings</div>
                            </div>

                            <div class="rating-breakdown">
                                @foreach ([5, 4, 3, 2, 1] as $star)
                                    <div class="rating-row review-star" data-star="{{ $star }}">
                                        <div class="star-label">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star">{{ $i <= $star ? '★' : '' }}</span>
                                            @endfor
                                        </div>
                                        <div class="progress-bar-container">
                                            <div class="progress-bar-fill"
                                                style="width: {{ $total_ratings ? ($formattedCounts[$star] / $total_ratings) * 100 : 0 }}%">
                                            </div>
                                        </div>
                                        <div class="rating-count">{{ $formattedCounts[$star] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Review List -->
                        <div class="review-list" id="reviewsContainer">
                            @include('FrontEnd.product.partials.reviews_list', ['reviews' => $reviews])
                        </div>

                        <!-- Write Review -->
                        @auth
                            <div class="write-review-container">
                                <h4>Share your experience</h4>
                                <form action="{{ route('product.review.store', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Your Rating</label>
                                        <div class="star-rating-input">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star-input" data-rating="{{ $i }}">★</span>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="rating" id="rating-value" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Your Review</label>
                                        <textarea name="comment" placeholder="Share your thoughts about this product..." required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Add Photos (Optional)</label>
                                        <input type="file" name="images[]" multiple accept="image/*"
                                            class="form-control">
                                    </div>

                                    <button type="submit" class="submit-review-btn">Submit Review</button>
                                </form>
                            </div>
                        @else
                            <div class="write-review-container" style="text-align: center;">
                                <p style="margin-bottom: 16px; color: #757575;">Please login to write a review</p>
                                <a href="{{ route('login') }}" class="submit-review-btn"
                                    style="display: inline-block; text-decoration: none;">
                                    Login to Review
                                </a>
                            </div>
                        @endauth
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const container = document.getElementById('reviewsContainer');
                            const slug = "{{ $product->slug }}";

                            // Star Rating Input
                            const starInputs = document.querySelectorAll('.star-input');
                            const ratingValue = document.getElementById('rating-value');

                            starInputs.forEach(star => {
                                star.addEventListener('click', function() {
                                    const rating = this.dataset.rating;
                                    ratingValue.value = rating;

                                    starInputs.forEach((s, index) => {
                                        if (index < rating) {
                                            s.classList.add('active');
                                        } else {
                                            s.classList.remove('active');
                                        }
                                    });
                                });
                            });

                            // Filter by Star Rating
                            document.querySelectorAll('.review-star, .filter-btn').forEach(elem => {
                                elem.addEventListener('click', function() {
                                    const filter = this.dataset.filter || this.dataset.star;

                                    // Update active state
                                    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove(
                                        'active'));
                                    if (this.classList.contains('filter-btn')) {
                                        this.classList.add('active');
                                    }

                                    fetch(`/product/${slug}/reviews?filter=${filter}`, {
                                            headers: {
                                                'X-Requested-With': 'XMLHttpRequest'
                                            }
                                        })
                                        .then(res => res.json())
                                        .then(data => {
                                            container.innerHTML = data.html;
                                        })
                                        .catch(err => console.error('Error loading reviews:', err));
                                });
                            });
                        });
                    </script>

                </div>
    </section>

    {{-- side cart page trigger --}}
    @include('FrontEnd.include.cart-contianer')


    <!-- Cart Overlay & Sidebar -->
    <div id="cartOverlay" class="cart-overlay" aria-hidden="true"></div>

    <div id="cartSidebar" class="sidebar" role="dialog" aria-label="Shopping Cart" aria-hidden="true">
        <div class="sidebar-header">
            <h2>{{ session()->get('language') == 'bangla' ? 'শপিং কার্ট' : 'Shopping Cart' }}</h2>
            <button id="closeSidebar" class="close-btn" aria-label="Close sidebar">&times;</button>
        </div>

        <div class="sidebar-body" id="cartItemsList">
            <div style="padding:18px; text-align:center; color:#6b6b6b;">
                {{ session()->get('language') == 'bangla' ? 'আপনার কার্ট বর্তমানে খালি।' : 'Your cart is currently empty.' }}
            </div>
        </div>

        <div class="sidebar-footer">
            <div
                style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; font-weight:800;">
                <div>{{ session()->get('language') == 'bangla' ? 'সাবটোটাল:' : 'Subtotal:' }}</div>
                <div id="cartSubtotal">€ 0.00</div>
            </div>

            <button id="checkoutButtonSidebar" class="checkout-btn">
                {{ session()->get('language') == 'bangla' ? 'অর্ডার করতে ক্লিক করুন' : 'Proceed to Checkout' }}
            </button>

            <a href="{{ route('cart.show') }}" id="reserveButton" class="secondary-btn btn">
                {{ session()->get('language') == 'bangla' ? 'কার্ডে দেখুন' : 'Go To Cart' }}
            </a>
        </div>
    </div>



@endsection



@push('js')
    <script>
        window.IS_WHOLESELLER = @json(Auth::check() && Auth::user()->role == 5);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('reviewsContainer');
            const slug = "{{ $product->slug }}";

            document.querySelectorAll('.review-star').forEach(star => {
                star.addEventListener('click', function() {
                    fetch(`/product/${slug}/reviews?filter=${this.dataset.star}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            container.innerHTML = data.html;
                        });
                });
            });

        });
    </script>



    <script>
        $('.detail-qty').each(function() {
            var qtyval = parseInt($(this).find(".qty-val").val(), 10);

            $('.qty-up').on('click', function(event) {
                event.preventDefault();
                qtyval = qtyval + 1;
                $(this).prev().val(qtyval);
            });

            $(".qty-down").on("click", function(event) {
                event.preventDefault();
                qtyval = qtyval - 1;
                if (qtyval > 1) {
                    $(this).next().val(qtyval);
                } else {
                    qtyval = 1;
                    $(this).next().val(qtyval);
                }
            });
        });

        function addCart(id) {
            var qty = $('#qty').val() || $('.qty-input').val() || 1;
            addToCartDirect(id, false, qty);
        }


        {
            {
                --$('#buy_now').on('click', function() {
                        --
                    }
                } {
                    {
                        --
                        var qty = $('.qty-val').val();
                        --
                    }
                } {
                    {
                        --
                        var id = {
                            {
                                $product - > id
                            }
                        };
                        --
                    }
                } {
                    {
                        --buyNow(id, qty);
                        --
                    }
                }

                {
                    {
                        --
                    });
                --
            }
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const qtyInput = document.getElementById('qty');
            const qtyUp = document.querySelector('.qty-up');
            const qtyDown = document.querySelector('.qty-down');
            const qtyAlert = document.getElementById('qty_stock_alert');

            if (!qtyInput || !qtyUp || !qtyDown) return;


            const minQty = parseInt(qtyInput.getAttribute('min')) || 1;
            const maxQty = parseInt(qtyInput.getAttribute('max')) || 1;
            let currentQty = parseInt(qtyInput.value) || minQty;


            function updateQuantity(qty) {
                currentQty = qty;
                qtyInput.value = qty;


                qtyDown.disabled = qty <= minQty;
                qtyUp.disabled = qty >= maxQty;


                if (qty >= maxQty) {
                    qtyAlert.textContent = '⚠️ Maximum stock limit reached.';
                } else if (qty <= minQty) {
                    qtyAlert.textContent = 'ℹ️ Minimum order quantity.';
                } else {
                    qtyAlert.textContent = '';
                }
            }


            updateQuantity(currentQty);


            qtyUp.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentQty < maxQty) {
                    updateQuantity(currentQty + 1);
                } else {
                    qtyAlert.textContent = '⚠️ Maximum stock limit reached.';
                }
            });


            qtyDown.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentQty > minQty) {
                    updateQuantity(currentQty - 1);
                } else {
                    qtyAlert.textContent = 'ℹ️ Minimum order quantity.';
                }
            });


            const observer = new MutationObserver(() => {
                if (qtyAlert.textContent) {
                    setTimeout(() => (qtyAlert.textContent = ''), 2500);
                }
            });
            observer.observe(qtyAlert, {
                childList: true
            });


            window.addCart = function(id) {
                const qty = parseInt(qtyInput.value);
                addToCartDirect(id, false, qty);
            };

            window.buyNow = function(id) {
                const qty = parseInt(qtyInput.value);
                buyProduct(id, qty);
            };
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('cartSidebar');
            if (!sidebar) return;

            const closeButton = sidebar.querySelector('.btn-close');

            document.querySelectorAll('.add_to_cart').forEach(button => {
                button.addEventListener('click', function(e) {

                    if (window.IS_WHOLESELLER) {
                        e.preventDefault();
                        wholesellerAlert();
                        return;
                    }

                    sidebar.classList.add('open');
                });
            });

            closeButton?.addEventListener('click', function() {
                sidebar.classList.remove('open');
            });
        });
    </script>
    <script src="{{ asset('FrontEnd') }}/assect/js/xzoom.js"></script>
    <script src="{{ asset('FrontEnd') }}/assect/js/magnific-popup.js"></script>
    <script src="{{ asset('FrontEnd') }}/assect/js/setup.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('cartOverlay');
            const sidebar = document.getElementById('cartSidebar');
            const closeBtn = document.getElementById('closeSidebar');
            const addToCartButtons = Array.from(document.querySelectorAll(
                '.add_to_cart, #addToCartBtn, .add-to-cart, .btn-add-cart'));

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('open');
                sidebar.setAttribute('aria-hidden', 'false');
                overlay.setAttribute('aria-hidden', 'false');
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('open');
                sidebar.setAttribute('aria-hidden', 'true');
                overlay.setAttribute('aria-hidden', 'true');
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            }

            addToCartButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    setTimeout(openSidebar, 120);
                });
            });

            overlay.addEventListener('click', closeSidebar);
            closeBtn.addEventListener('click', closeSidebar);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                    closeSidebar();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainProductImage');
            const thumbnails = document.querySelectorAll('.thumbnail-item');


            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {

                    const newImageSrc = this.getAttribute('data-image');
                    mainImage.src = newImageSrc;


                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });


            const container = document.querySelector('.product-image-container');

            container.addEventListener('mousemove', function(e) {
                const rect = container.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;

                mainImage.style.transformOrigin = `${x}% ${y}%`;
            });

            container.addEventListener('mouseleave', function() {
                mainImage.style.transformOrigin = 'center center';
            });
        });
    </script>

    <script>
        function wholesellerAlert() {
            Swal.fire({
                icon: 'info',
                title: 'You are a Wholeseller!',
                text: 'Please go to your dashboard to manage orders.',
                showCancelButton: true,
                confirmButtonText: 'Go to Dashboard',
                cancelButtonText: 'Close',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('wholeseller.dashboard') }}";
                }
            });
        }
    </script>
@endpush
