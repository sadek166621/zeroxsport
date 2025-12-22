@php
$language = session()->get('language');
$isBangla = $language == 'bangla';
@endphp
@extends('wholeseller.wholeseller-master')
@section('wholeseller_body')
<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 500;
        color: #1a1a1a;
    }

    .overview-card {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
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
        font-weight: 00;
        z-index: 3;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 8px rgba(238, 90, 36, 0.3);
        font-size: 9px;
        padding: 2px 5px;
    }

    .discount-badge {
        animation: pulse 2s infinite ease-in-out;
    }

    .overview-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 150px;
    }

    .overview-card h5 {
        font-size: 1.1rem;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .overview-card h3 {
        font-size: 2rem;
        font-weight: 500;
    }

    .recent-orders .card {
        display: flex;
        align-items: center;
        padding: 12px;
        background-color: #fff;
        border-radius: 12px;
    }

    .recent-orders img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 20px;
    }

    .recent-orders .badge {
        font-size: 0.9rem;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 500;
    }

    .recent-orders h6 {
        font-size: 1.1rem;
        font-weight: 500;
    }

    .recent-orders small {
        font-size: 0.85rem;
    }

    .recent-orders p {
        font-size: 1rem;
        margin-bottom: 0;
    }

    .bg-success {
        suggested-products background-color: #13B262 !important;
    }

    .bg-warning {
        background-color: #EE6812 !important;
        color: #fff !important;
    }

    .suggested-products .card {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.35s ease;
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 0.6s ease forwards;
    }


    /* 🔹 Staggered animation delay for each card */
    .suggested-products .card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .suggested-products .card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .suggested-products .card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .suggested-products .card:nth-child(4) {
        animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
        from {
            transform: translateY(25px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* 🔹 Hover animation */
    .suggested-products .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    /* 🔹 Image zoom on hover */
    .suggested-products .card-img-top {
        transition: transform 0.4s ease;
    }

    .suggested-products .card:hover .card-img-top {
        transform: scale(1.07);
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 rgba(0, 180, 94, 0.5);
        }

        50% {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(0, 180, 94, 0.4);
        }
    }

    .suggested-products .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .suggested-products .card-title {
        font-size: 1.1rem;
        font-weight: 500;
        color: #1a1a1a;
        margin-bottom: 10px;
    }

    .suggested-products .card-title:hover {
        color: #13B262;
    }

    .suggested-products .btn-primary {
        background-color: #13B262;
        border: none;
        border-radius: 8px;
        padding: 10px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .suggested-products .btn-primary:hover {
        background-color: #0f9d51;
    }

    .suggested-products small {
        color: #6c757d;
        font-size: 0.85rem;
    }

    h5 {
        font-size: 1.25rem;
        font-weight: 500;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .grid-layout {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .dashboard-overview {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    @media (max-width: 768px) {
        .overview-card h3 {
            font-size: 1.5rem;
        }

        .suggested-products .card-img-top {
            height: 160px;
        }

        .recent-orders img {
            width: 60px;
            height: 60px;
        }

        .grid-layout {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .card-body {
            padding: 10px;
        }

        .suggested-products .card-body {
            padding: 10px;
        }

        .suggested-products .card-title {
            font-size: 0.9rem;
        }

        .suggested-products .btn-primary {
            padding: 5px;

        }

        .dashboard-overview {
            grid-template-columns: repeat(1, 1fr);
            gap: 0;
        }

    }

    h5{
        margin-bottom: 0;
    }
</style>
<style>
    /* Search Bar CSS */
    .search-container {
        position: relative;
        flex-grow: 1;
        max-width: 500px;
        margin: 0 30px;
    }

    .search-bar {
        width: 100%;
        padding: 2px 65px 2px 12px;
        border: 2px solid #01B45E;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-size: 14px;
        box-sizing: border-box;
        outline: none;
    }

    .search-btn {
        position: absolute;
        right: 4px;
        top: 4.5px;
        bottom: 0;
        padding: 2px 10px;
        color: #ffffff;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background-color: #01B45E;
        border-radius: 0 20px 20px 0;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 12px;
    }

    .search-btn i {
        font-size: 16px;
        color: white;
    }

    .suggested-products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Responsive styles */
    @media (max-width: 991px) {
        .search-container {
            margin: 0 15px;
        }
    }

    @media (max-width: 768px) {
        .search-container {
            order: 3;
            width: 100%;
            max-width: 100%;
            margin: 15px 0 0;
        }

        .suggested-products-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>
<div class="dashboard-container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4 px-2">Wholeseller Dashboard Overview</h4>

            <div class="dashboard-overview px-2">
                <div class="mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="text-white">Total Orders</h5>
                            <h5 class="mb-0 text-white">Quantity:{{ count($orders) }}</h5>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="text-white">Total Purchase</h5>
                            <h5 class="mb-0 text-white">৳{{ $total_purchase }}</h5>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="text-white">Pending Orders</h5>
                            <h5 class="mb-0 text-white">Quantity:{{ count($pending_orders) }},
                                ৳{{ $pending_orders->sum('grand_total') }}</h5>

                        </div>
                    </div>
                </div>
            </div>

            <div class="suggested-products mt-4">
                <div class="mb-4 suggested-products-header">
                    <h5>Suggested Products for You</h5>
                    <!-- Search Bar -->
                    <div class="search-container">
                        <form action="{{ route('product.search') }}" method="post">
                            @csrf
                            <input type="text" class="search-bar" name="search" id="search-input"
                                placeholder="{{ $isBangla ? 'এখানে অনুসন্ধান করুন...' : 'Search products...' }}"
                                onfocus="search_result_show()" onblur="search_result_hide()">
                            <button type="submit" class="search-btn">
                                Search
                            </button>
                        </form>
                        <div id="search-results" class="searchProducts"
                            style="position: absolute; z-index: 999; width: 100%; top: 100%; display: none;"></div>
                    </div>
                </div>
                <div class="grid-layout">

                    @foreach ($wholesell_products as $product)
                    <div class=" mb-3">
                        <a href="{{ route('product.details', $product->slug) }}">
                            <div class="card h-100">
                                <!-- Discount Badge - Top Right -->
                                <div class="discount-badge">
                                    Save ৳{{ $product->regular_price - $product->wholesell_price }}
                                </div>
                                <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top"
                                    alt="Product 1">
                                <div class="card-body d-flex flex-column">
                                    <a href="{{ route('product.details', $product->slug) }}">
                                        <h6 class="card-title">{{ $product->name_en }} </h6>
                                    </a>
                                    <p class="mb-2" style="font-weight:600;color:green;">
                                        ৳{{ $product->wholesell_price }}
                                        <del style="font-size:14px;" class="text-muted">
                                            ৳{{ $product->regular_price }}</del>
                                    </p>
                                    {{-- <small class="text-muted">Min order: 5 bags</small> --}}

                                    @if ($product->stock_qty > 0)
                                    <small class="stock-status text-success">
                                        <span>Available</span>
                                        <i>({{ $product->stock_qty }})</i>
                                    </small>
                                    @else
                                    <small class="stock-status text-danger">
                                        <span>Not Available</span>
                                    </small>
                                    @endif

                                    <div class="mt-auto pt-2">
                                        @if ($product->stock_qty > 0)
                                        <button class="btn btn-sm btn-primary w-100 text-white"
                                            onclick="addToCartWholeseller({{ $product->id }}, '{{ addslashes($product->name_en) }}')">
                                            Add to Cart
                                        </button>
                                        @else
                                        <button class="btn btn-sm btn-secondary w-100 text-white p-2" disabled>
                                            Out of Stock
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Search Bar JavaScript/jQuery
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('ajax.product.search') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(response) {
                        $('#search-results').html(response.html).show();
                    },
                    error: function(xhr) {
                        console.log("AJAX error:", xhr.responseText);
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        // Hide results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-results').length) {
                $('#search-results').hide();
            }
        });
    });

    // Show/Hide search results functions
    function search_result_show() {
        $('#search-results').show();
    }

    function search_result_hide() {
        setTimeout(function() {
            $('#search-results').hide();
        }, 200);
    }
</script>
@include('wholeseller.cart-container')
@endsection