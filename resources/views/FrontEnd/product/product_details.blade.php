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
            background-color: #01B45E;
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
            background-color: #01B45E;
            border: none;
            border-radius: 5px;
            color: white !important;
        }

        .product_card {
            background: #fff;
            border: 2px solid #01B45E;
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
            background: #01B45E;
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
            border-color: #01B45E;
            transform: scale(1.05);
        }

        .thumbnail-item.active {
            border-color: #01B45E;
            box-shadow: 0 0 0 1px #01B45E;
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .discount-position {
            background-color: #01B45E;
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
    </style>
    <!-- Product Information Start -->
    <section class="custom_container  my-3  " style="border-radius: 10px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom  mb-0 d-flex align-items-center gap-2">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" style="color: #01B45E; text-decoration: none; transition: all 0.3s;">
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
                        style="color: #01B45E; text-decoration: none; transition: all 0.3s;">
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
                        পণ্যের বিবরণ
                    @else
                        Product Details
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
                                    <div
                                        class="{{ $discount['discount'] == $product->regular_price ? 'd-none' : 'discount-position' }}">
                                        <small>{{ str_replace(['(', ')', '-'], '', $discount['text']) }} OFF</small>
                                    </div>
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

                        {{-- <span class="stock-status out-stock"> ৳{{ $discount }} Off </span> --}}

                        <div>



                            <h4 class="price">
                                @if (session()->get('language') == 'bangla')
                                    মূল্য:
                                @else
                                    Price:
                                @endif
                                @if ($product->is_wholesell == 1)
                                    <!-- Show only regular price for wholesale products -->
                                    <span class="product_price current-price">{{ $product->regular_price }} TK</span>
                                    <del class="old-price" style="color: grey">0.00 Tk</del>
                                @else
                                    <!-- Show discount price and original price -->
                                    <span class="product_price current-price">{{ $discount['discount'] }} TK</span>
                                    @if ($discount['discount'] != $product->regular_price)
                                        <del class="old-price {{ $discount['discount'] == 0 ? 'd-none' : '' }}"
                                            style="color: grey">
                                            {{ $product->regular_price }} TK
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
                            <p class="product-description preview-text">
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
                        <form id="choice_form">
                            <div class="row " id="choice_attributes">
                                @if ($product->is_varient)
                                    @php $i = 0; @endphp
                                    @foreach (json_decode($product->attribute_values) as $attribute)
                                        @php
                                            $attr = get_attribute_by_id($attribute->attribute_id);
                                            $i++;
                                        @endphp
                                        <input type="hidden" name=""
                                            onload="selectAttribute('{{ $attribute->attribute_id }}', '{{ $attr->name }}', '{{ $attribute->values[0] }}', '{{ $product->id }}', '1')">
                                        <div class="attr-detail attr-size mb-3">
                                            <strong class="mr-10">{{ $attr->name }}: </strong>
                                            <input type="hidden" name="attribute_ids[]"
                                                id="attribute_id_{{ $i }}"
                                                value="{{ $attribute->attribute_id }}">
                                            <input type="hidden" name="attribute_names[]"
                                                id="attribute_name_{{ $i }}" value="{{ $attr->name }}">
                                            <input type="hidden" id="attribute_check_{{ $i }}"
                                                value="0">
                                            <input type="hidden" id="attribute_check_attr_{{ $i }}"
                                                value="0">
                                            <ul class="list-filter size-filter font-small">
                                                @foreach ($attribute->values as $key => $value)
                                                    <label class="radio-inline">
                                                        <input type="radio" class="m-2"
                                                            onclick="selectAttribute('{{ $attribute->attribute_id }}{{ $attr->name }}', '{{ $value }}', '{{ $product->id }}', '{{ $i }}')"
                                                            name="option_{{ $i }}">{{ $value }}
                                                    </label>
                                                    @php $key++; @endphp
                                                @endforeach
                                                <input type="hidden" name="attribute_options[]"
                                                    id="{{ $attribute->attribute_id }}{{ $attr->name }}"
                                                    class="attr_value_{{ $i }}">
                                            </ul>
                                        </div>
                                    @endforeach
                                    <input type="hidden" id="total_attributes"
                                        value="{{ count(json_decode($product->attribute_values)) }}">
                                @endif
                            </div>
                        </form>

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


                                {{--
                                <button class="buy_now" id="{{ $product->is_varient == 1 ? '' : 'buy_now' }}"
                        type="button" onclick="{{ $product->is_varient == 1 ? 'buyProduct()' : '' }}"
                        style="width:120px; padding:10px; font-size: 15px; color: white !important;">
                        @if (session()->get('language') == 'bangla')
                        এখুনি কিনুন
                        @else
                        Buy Now
                        @endif
                        </button>

                        <button id="addToCartBtn" class="add_to_cart"
                            style="width:120px; margin-left: 5px; background-color: white; font-size: 15px;"
                            type="button" onclick="test()">
                            @if (session()->get('language') == 'bangla')
                            কার্টে যোগ করুন
                            @else
                            Add to cart
                            @endif
                        </button> --}}

                                @if (Auth::check() && Auth::user()->role == '5')
                                    {{-- Wholeseller restriction --}}
                                    <button class="buy_now" type="button"
                                        style="width:120px; padding:10px; font-size: 15px; color: white !important;"
                                        onclick="wholesellerAlert()">
                                        @if (session()->get('language') == 'bangla')
                                            এখুনি কিনুন
                                        @else
                                            Buy Now
                                        @endif
                                    </button>

                                    <button id="addToCartBtn" class="add_to_cart" type="button"
                                        style="width:120px; margin-left: 5px; background-color: white; font-size: 15px;"
                                        onclick="wholesellerAlert()">
                                        @if (session()->get('language') == 'bangla')
                                            কার্টে যোগ করুন
                                        @else
                                            Add to Cart
                                        @endif
                                    </button>
                                @else
                                    {{-- Normal user --}}
                                    <button class="buy_now" id="{{ $product->is_varient == 1 ? '' : 'buy_now' }}"
                                        type="button" onclick="{{ $product->is_varient == 1 ? 'buyProduct()' : '' }}"
                                        style="width:120px; padding:10px; font-size: 15px; color: white !important;">
                                        @if (session()->get('language') == 'bangla')
                                            এখুনি কিনুন
                                        @else
                                            Buy Now
                                        @endif
                                    </button>

                                    <button id="addToCartBtn" class="add_to_cart" type="button"
                                        style="width:120px; margin-left: 5px; background-color: white; font-size: 15px;"
                                        onclick="test()">
                                        @if (session()->get('language') == 'bangla')
                                            কার্টে যোগ করুন
                                        @else
                                            Add to Cart
                                        @endif
                                    </button>
                                @endif
                            </div>
                        @endif

                        {{-- <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const qtyInput = document.getElementById('qty');
                                const qtyUp = document.querySelector('.qty-up');
                                const qtyDown = document.querySelector('.qty-down');
                                const qtyAlert = document.getElementById('qty_stock_alert');
                                const maxQty = parseInt(qtyInput.max);
                                const minQty = parseInt(qtyInput.min);

                                qtyUp.addEventListener('click', () => {
                                    let current = parseInt(qtyInput.value);
                                    if (current < maxQty) {
                                        qtyInput.value = current + 1;
                                        qtyAlert.textContent = '';
                                    } else {
                                        qtyAlert.textContent = 'Maximum stock limit reached.';
                                    }
                                });

                                qtyDown.addEventListener('click', () => {
                                    let current = parseInt(qtyInput.value);
                                    if (current > minQty) {
                                        qtyInput.value = current - 1;
                                        qtyAlert.textContent = '';
                                    }
                                });
                            });
                        </script> --}}

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
                                                TK</span>
                                            <span class="text-muted text-decoration-line-through small">
                                                0.00 TK
                                            </span>
                                        @else
                                            {{-- Show discount + regular price --}}
                                            <span class="price fw-bold text-success">{{ $data['discount'] }} TK</span>
                                            @if ($product->regular_price != $data['discount'])
                                                <span class="text-muted text-decoration-line-through small">
                                                    {{ $product->regular_price }} TK
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
                <div class="p-4">
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
                            {!! $product->description_bn !!}
                        @else
                            {!! $product->description_en !!}
                        @endif

                    </div>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Reviews">
                            Ratings & Reviews of ({{ $product->name_en }})
                        </a>
                    </li>
                    <div id="Reviews">
                        <div class="row g-4">

                            <div class="col-lg-4">
                                <div class="border p-4 rounded">
                                    <h2 class="fw-bold mb-1">{{ number_format($average_rating, 1) }}</h2>
                                    <div class="product-rate mb-2">
                                        <div class="product-rating" style="width: {{ ($average_rating / 5) * 100 }}%">
                                            
                                        </div>
                                    </div>
                                    <small class="text-muted">{{ $total_ratings }} Ratings</small>

                                    <hr>
                                    @foreach ([5, 4, 3, 2, 1] as $star)
                                        <div class="d-flex align-items-center mb-2 review-star"
                                            data-star="{{ $star }}" style="cursor:pointer">
                                            <span class="me-2">{{ $star }}★</span>
                                            <div class="progress flex-grow-1 me-2" style="height:6px;">
                                                <div class="progress-bar bg-warning"
                                                    style="width: {{ $total_ratings ? ($formattedCounts[$star] / $total_ratings) * 100 : 0 }}%">
                                                </div>
                                            </div>
                                            <small>{{ $formattedCounts[$star] }}</small>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <div class="border p-4 rounded">
                                        <h5 class="mb-4">Product Reviews</h5>

                                        <div id="reviewsContainer">
                                            @include('FrontEnd.product.partials.reviews_list', [
                                                'reviews' => $reviews,
                                            ])
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                        @auth
                            <div class="border rounded p-4 mt-4">
                                <h5 class="mb-3">Write a Review</h5>

                                <form action="{{ route('product.review.store', $product->id) }}" method="POST">
                                    @csrf
                                    <select name="rating" class="form-control mb-3" required>
                                        <option value="">Rating</option>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <option value="{{ $i }}">{{ $i }} Star</option>
                                        @endfor
                                    </select>

                                    <textarea name="comment" rows="4" class="form-control mb-3" placeholder="Write your review" required></textarea>

                                    <button class="btn btn-warning text-white px-4">Submit</button>
                                </form>
                            </div>
                        @endauth
                    </div>

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
                <div id="cartSubtotal">৳0.00</div>
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

<style>
    .product-rate {
        position: relative;
        display: inline-block;
        width: 80px;
        height: 14px;
        background: #ddd;
    }

    .product-rating {
        height: 100%;
        background: #faca51;
    }
</style>

@push('js')
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
            var qty = $('.qty-val').val();
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
            const addToCartButton = document.querySelector('.add_to_cart');
            const sidebar = document.getElementById('cartSidebar');
            const closeButton = sidebar.querySelector('.btn-close');

            addToCartButton.addEventListener('click', function(e) {

                const isWholeseller = {
                    {
                        Auth::check() && Auth::user() - > role == '5' ? 'true' : 'false'
                    }
                };

                if (isWholeseller) {
                    e.preventDefault();
                    wholesellerAlert();
                    return;
                }


                sidebar.classList.add('open');
            });


            closeButton.addEventListener('click', function() {
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
