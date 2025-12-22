@extends('FrontEnd.master')
@section('title')
    {{ $category->name_en }} Based Products
@endsection


<style>
    /* Breadcrumb Styles */
    .bradcumb {
        background: #fff;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        margin-bottom: 30px;
    }

    .breadcrumb-custom {
        margin: 0;
        padding: 0;
        background: transparent;
    }

    .breadcrumb-item {
        font-weight: 500;
        font-size: 16px !important;
    }

    .breadcrumb-item a {
        color: #01B45E !important;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 500;
        font-size: 16px !important;
    }

    .breadcrumb-item a:hover {
        color: #018c49 !important;
    }

    .breadcrumb-item.active {
        font-weight: 600;
        color: #495057;
    }

    .fa-chevron-right {
        color: #6c757d;
        font-size: 12px;
    }

    /* Other Styles */
    .section-header {
        text-align: center;
        position: relative;
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.75rem;
        color: #333;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .section-line {
        width: 80px;
        height: 3px;
        background: #ff4757;
        margin: 0 auto;
    }

    .product-card {
        background: white;
        border-radius: 8px;
        position: relative;
        border: 1px solid #eee;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .discount-badge {
        position: absolute;
        top: 8px;
        right: 8px !important;
        width: 50px;
        height: 50px;
        border-radius: 50% !important;
        background: #01B45E !important;
        color: white;
        display: flex;
        line-height: 12px;
        align-items: center;
        text-align: center;
        justify-content: center;
        font-weight: 600;
        z-index: 3;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 8px rgba(238, 90, 36, 0.3);
        font-size: 8px;
        padding: 2px 5px;
    }

    .product-image {
        position: relative;
        padding-top: 100%;
        background: #f8f9fa;
        overflow: hidden;
    }

    .product-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 1rem;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-details {
        padding: 1rem;
    }

    .product-title {
        color: #2d3436;
        font-size: 0.95rem;
        font-weight: 500;
        line-height: 1.4;
        margin-bottom: 0.75rem;
        display: block;
        text-decoration: none;
        min-height: 2.8em;
    }

    .price-section {
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .current-price {
        color: #01B45E;
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
    }

    .original-price {
        color: #849fab;
        text-decoration: line-through;
        font-size: 0.9rem;
    }

    .stock-status {
        display: block;
        margin-bottom: 1rem;
        color: #00b894;
        font-size: 0.85rem;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
        margin-top: auto;
    }

    .btn-buy-now,
    .btn-add-cart {
        border: none;
        border-radius: 4px;
        font-weight: 500;
        font-size: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }

    .btn-buy-now {
        background: #01B45E;
        color: white;
    }

    .btn-buy-now:hover {
        background: #ff3547;
    }

    .btn-add-cart {
        border: 1px solid #01B45E;
        color: #01B45E;
    }

    .btn-add-cart:hover {
        background: #01B45E;
        color: white;
    }

    .out-of-stock {
        background: #EAEAEA;
        color: gray;
        padding: 0.2rem;
        text-align: center;
        border-radius: 4px;
        font-size: 0.9rem;
        font-weight: 500;
        grid-column: span 2;
    }

    .category-grid{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 10px;
    }

    @media (max-width: 992px) {
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .product-details{
            padding: .5rem;
        }

        .action-buttons
        {
            grid-template-columns: 1fr;
        }
        .btn-buy-now{
            display: none;
        }
    }
</style>

@section('content')
    <div class="bradcumb">
        <div class="custom_container">
            <div class="row">
                <div class="col-12">
                    <div class="bradcumb-content">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom mb-0 d-flex align-items-center gap-2">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        @if(session()->get('language') == 'bangla')
                                            হোম
                                        @else
                                            Home
                                        @endif
                                    </a>
                                </li>
                                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
                                <li class="breadcrumb-item">
                                    <a href="#">
                                        @if(session()->get('language') == 'bangla')
                                            সব ক্যাটাগরি
                                        @else
                                            All Categories
                                        @endif
                                    </a>
                                </li>
                                <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
                                <li class="breadcrumb-item active" style="font-weight: 600;">
                                    @if(session()->get('language') == 'bangla')
                                        {{ $category->name_bn }}
                                    @else
                                        {{ $category->name_en }}
                                    @endif
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Flash Sale Start -->
    {{-- <section class="flash-sale container-fluid bg-white mt-2">
        <div class="container p-2">
            <div class="d-flex align-items-center">
                <h5 class="me-5 d-none d-md-block">On Sale Now</h5>
                <h5 class="trimmers me-4">Ending in <span>03</span> : <span>47</span> : <span> 45</span></h5>
                <span class="d-none d-md-block">|</span>
                <p class="ms-5 d-none d-md-block">00 : 00 Tomorrow</p>
            </div>
        </div>

    </section> --}}
    <!-- Flash Sale End -->

    <!-- Shop Option Part Start -->
    {{-- <section class="shop-option container-fluid mt-3 p-2">
        <div class="container">
            <ul>
                <li><a href="">All</a></li>
                <li><a href="">Electronic</a></li>
                <li><a href="#">Health &amp; Beauty</a></li>
                <li><a href="">Fashion</a></li>
                <li><a href="">Home &amp; Living</a></li>
                <li><a href="">Supermarket</a></li>
                <li><a href="">Stationary &amp; Toys</a></li>
                <li><a href="">Sports &amp; Motors</a></li>
            </ul>
        </div>
    </section> --}}
    <!-- Shop Option Part End -->

    <!-- Categories Part Start -->
    <section class="container">
        <div class="owl-carousel owl-theme mt-3 mb-5">
            @foreach ($subcategories as $subcategory)
                <div class="card item mx-2">

                    <a class="d-flex" href="{{ route('product.category', $subcategory->slug) }}"><img
                            src="{{ asset($subcategory->image) }}" class="me-2" alt="..."
                            style="width: 50px; border: 5px solid lightgrey; !important;">
                        @if (session()->get('language') == 'bangla')
                            <p class="my-auto text-center">{{ $subcategory->name_bn }}</p>
                        @else
                            <p class="my-auto text-center">{{ $subcategory->name_en }}</p>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Categories Part End -->

    <!-- Product Start -->
    <section class="container mt-4">
        <div class="section-header mb-4">
            <h3 class="section-title">{{ $category->name_en }} Products</h3>
            <div class="section-line"></div>
        </div>
        <div id="product-container" class="category-grid g-4">
            @if (count($products) > 0)
                @foreach ($products as $product_trending)
                    <div class="col">
                        <?php $data = calculateDiscount($product_trending->id); ?>
                        <div class="product-card">
                            @if ($data['text'])
                                <div class="discount-badge">
                                    save <br> {{ $data['text'] }}
                                </div>
                            @endif

                            <div class="product-image">
                                <a href="{{ route('product.details', $product_trending->slug) }}">
                                    <img src="{{ asset($product_trending->product_thumbnail) }}"
                                        alt="{{ $product_trending->name_en }}" loading="lazy">
                                </a>
                            </div>
                            <div class="product-details">
                                <a href="{{ route('product.details', $product_trending->slug) }}" class="product-title">
                                    @if (session()->get('language') == 'bangla')
                                        {!! Str::substr($product_trending->name_bn, 0, 25) !!}
                                    @else
                                        {!! Str::substr($product_trending->name_en, 0, 25) !!}
                                    @endif
                                </a>

                                {{-- <div class="price-section">
                                    <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                    @if ($product_trending->regular_price != $data['discount'])
                                        <span class="original-price"> {{ $product_trending->regular_price }} TK </span>
                                    @endif
                                </div> --}}

                                <!-- Price Section -->
                                <div class="price-section">
                                    @if ($product_trending->is_wholesell == 1)
                                        <!-- Show only regular price for wholesale products -->
                                        <h4 class="current-price">{{ $product_trending->regular_price }} TK</h4>
                                        <span class="original-price">0 TK</span>
                                    @else
                                        <!-- Show discount price and original price -->
                                        <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                        @if ($product_trending->regular_price != $data['discount'])
                                            <span class="original-price">{{ $product_trending->regular_price }} TK</span>
                                        @endif
                                    @endif
                                </div>

                                {{-- @if ($product_trending->stock_qty > 0)
                                    <small class="stock-status">
                                        <span>{{ session()->get('language') == 'bangla' ? 'স্টকে আছে' : 'Available' }}</span>
                                        <i>({{ $product_trending->stock_qty }})</i>
                                    </small>
                                @endif --}}
                                <div class="action-buttons">
                                    @if ($product_trending->stock_qty > 0)
                                     @if (Auth::check() && Auth::user()->role == '5')
                                        {{-- Wholeseller restriction --}}
                                        <button onclick="wholesellerAlert()" class="btn-buy-now">
                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                        </button>
                                        <button onclick="wholesellerAlert()" class="btn-add-cart">
                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                        </button>
                                    @else
                                        @if ($product_trending->is_varient == 1)
                                            <button type="submit" id="{{ $product_trending->id }}"
                                                onclick="productView(this.id)" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now' }}
                                            </button>
                                            <button type="submit" id="{{ $product_trending->id }}"
                                                onclick="productView(this.id)" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal" class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                            </button>
                                        @else
                                            <button type="submit" onclick="buyNow({{ $product_trending->id }})"
                                                class="btn-buy-now">
                                                {{ session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now' }}
                                            </button>
                                            <input type="hidden" id="pfrom" value="direct">
                                            <input type="hidden" id="product_product_id"
                                                value="{{ $product_trending->id }}" min="1">
                                            <input type="hidden" id="{{ $product_trending->id }}-product_pname"
                                                value="{{ $product_trending->name_en }}">
                                            <button type="submit" onclick="addToCartDirect({{ $product_trending->id }})"
                                                class="btn-add-cart">
                                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                            </button>
                                        @endif
                                        @endif
                                    @else
                                        <div class="out-of-stock">
                                            {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-danger fw-bold">No Products Found</p>
            @endif
        </div>
    </section>
    <div class="text-center my-5">
        {{-- <button type="button" class="view_more">View More</button> --}}
    </div>

    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')    
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
            cancelButtonColor: '#6c757d', // gray for close
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('wholeseller.dashboard') }}";
            }
        });
    }
</script>
@endpush
