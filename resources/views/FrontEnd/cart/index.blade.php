@extends('FrontEnd.master')
@section('title')
Shopping Cart
@endsection
@section('content')
<style>
    .cart-header {
        padding: 20px 0;
        background: linear-gradient(135deg, #036042 0%, #054a3a 100%);
    }

    .breadcrumb-cart {
        background: transparent;
        font-weight: 500;
        font-size: 16px !important;
        list-style: none;
    }

    .breadcrumb-cart .breadcrumb-item {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
        font-size: 16px !important;
    }

    .breadcrumb-cart .breadcrumb-item:hover {
        color: #e0f2f1;
    }

    .breadcrumb-cart .breadcrumb-item.active {
        color: #e0f2f1;
    }

    .product-name a {
        font-size: 17px !important;
        font-weight: 600;
        line-height: 1.5;
        color: #1a1a1a;
        transition: color 0.3s;
    }

    .product-name a:hover {
        color: #036042;
        text-decoration: none;
    }

    .cart-items {
        padding: 28px;
    }

    .cart-container {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 20px rgba(3, 96, 66, 0.08);
        transition: box-shadow 0.3s ease;
    }

    .cart-container:hover {
        box-shadow: 0 6px 28px rgba(3, 96, 66, 0.12);
    }

    .product-card {
        background: #f8faf9;
        border-radius: 12px;
        border: 1px solid #e8eae8;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        background: #f1f5f3;
        border-color: #036042;
        box-shadow: 0 4px 16px rgba(3, 96, 66, 0.1);
    }

    .product-img {
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(3, 96, 66, 0.1);
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .quantity-control {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 8px;
        padding: 4px;
        border: 2px solid #e8eae8;
        transition: border-color 0.3s;
    }

    .quantity-control:focus-within {
        border-color: #036042;
    }

    .qty-btn {
        width: 26px;
        height: 26px;
        border-radius: 6px;
        border: none;
        font-weight: bold;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-btn-minus {
        background: #f0f2f1;
        color: #036042;
    }

    .qty-btn-minus:hover:not(:disabled) {
        background: #036042;
        color: #fff;
    }

    .qty-btn-minus:disabled {
        background: #f5f5f5;
        color: #ccc;
        cursor: not-allowed;
    }

    .qty-btn-plus {
        background: #036042;
        color: #fff;
    }

    .qty-btn-plus:hover {
        background: #024d34;
        box-shadow: 0 2px 8px rgba(3, 96, 66, 0.3);
    }

    .qty-input {
        width: 40px;
        border: none;
        background: transparent;
        text-align: center;
        font-weight: 700;
        color: #1a1a1a;
    }

    .remove-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #fff3f0;
        border: 1px solid #ffccc7;
        color: #d9534f;
        transition: all 0.3s;
    }

    .remove-btn:hover {
        background: #d9534f;
        color: #fff;
        border-color: #d9534f;
    }

    .summary-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 20px rgba(3, 96, 66, 0.08);
        position: sticky;
        top: 20px;
    }

    .summary-header {
        background: linear-gradient(135deg, #036042 0%, #054a3a 100%);
        padding: 24px;
        color: #fff;
    }

    .summary-header h4 {
        margin: 0;
        font-weight: 700;
        font-size: 1.3rem;
        color: white !important;
    }

    .summary-body {
        padding: 28px;
    }

    .summary-row {
        font-size: 1rem;
        color: #666;
        margin-bottom: 16px;
    }

    .summary-row span:first-child {
        font-weight: 500;
    }

    .summary-row span:last-child {
        color: #036042;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .summary-total {
        padding-top: 20px;
        border-top: 2px solid #e8eae8;
    }

    .summary-total .d-flex span:first-child {
        font-weight: 600;
        color: #1a1a1a;
    }

    .summary-total .d-flex span:last-child {
        color: #036042;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .checkout-actions {
        margin-top: 28px;
    }

    .checkout-actions .btn {
        background: linear-gradient(135deg, #036042 0%, #024d34 100%);
        color: #fff;
        border-radius: 10px;
        border: none;
        font-weight: 600;
        padding: 14px 28px;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(3, 96, 66, 0.2);
    }

    .checkout-actions .btn:hover {
        background: linear-gradient(135deg, #024d34 0%, #012e1f 100%);
        box-shadow: 0 6px 20px rgba(3, 96, 66, 0.3);
        transform: translateY(-2px);
        color: #fff;
    }

    .price {
        color: #036042;
        font-weight: 600;
    }

    .old-price {
        color: #999;
        text-decoration: line-through;
    }

    .attribute-tag {
        display: inline-block;
        padding: 4px 12px;
        background: #e8f4f1;
        border-radius: 6px;
        font-size: 13px;
        margin-right: 8px;
        margin-bottom: 6px;
        color: #036042;
        font-weight: 500;
    }

    .subtotal {
        color: #036042;
        font-weight: 700;
    }

    @media (max-width: 767px) {
        .cart-items {
            padding: 16px;
        }

        .mx {
            margin-right: 12px;
        }

        .summary-card {
            position: relative;
            top: auto;
        }

        .summary-header h4 {
            font-size: 1.1rem;
        }

        .summary-body {
            padding: 20px;
        }

        .breadcrumb-cart .breadcrumb-item {
            font-size: 14px !important;
        }

        .product-name a {
            font-size: 16px !important;
        }
    }
</style>
<!-- Cart Header Start -->
<div class="cart-header">
    <div class="custom_container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb-cart d-flex align-items-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" style="text-decoration: none;">
                                @if (session()->get('language') == 'bangla')
                                হোম
                                @else
                                Home
                                @endif
                            </a>
                        </li>
                        <i class="fa fa-chevron-right mx-2" aria-hidden="true" style="color: #fff;"></i>
                        <li class="breadcrumb-item active">
                            @if (session()->get('language') == 'bangla')
                            শপিং কার্ট
                            @else
                            Shopping Cart
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Cart Header End -->
<!-- Cart Content Start -->
<section class="custom_container">
    <div class="row g-4 py-5">
        <div class="col-lg-8">
            <div class="cart-container">
                <div style="padding: 24px; background: linear-gradient(135deg, #036042 0%, #054a3a 100%);">
                    <h4 class="mb-0" style="color: #fff; font-weight: 700; font-size: 1.3rem;">
                        @if (session()->get('language') == 'bangla')
                        আপনার কার্ট আইটেম
                        @else
                        Your Cart Items
                        @endif
                    </h4>
                </div>
                <div class="cart-items" id="cartPage">
                    <!-- Cart items will be loaded dynamically here -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="summary-card">
                <div class="summary-header">
                    <h4>
                        @if (session()->get('language') == 'bangla')
                        কার্ট সারাংশ
                        @else
                        Cart Summary
                        @endif
                    </h4>
                </div>
                <div class="summary-body">
                    <div class="summary-row d-flex justify-content-between align-items-center">
                        <span>
                            @if (session()->get('language') == 'bangla')
                            সাবটোটাল
                            @else
                            Subtotal
                            @endif
                        </span>
                        <span>৳<span id="cartSubTotal"></span></span>
                    </div>
                    <div class="summary-total">
                        <div class="d-flex justify-content-between align-items-center my-3">
                            <span>
                                @if (session()->get('language') == 'bangla')
                                মোট
                                @else
                                Total
                                @endif
                            </span>
                            <span>৳<span id="cartTotal"></span></span>
                        </div>
                    </div>
          <div class="checkout-actions text-center mt-4">
                <a href="{{ Auth::check() ? route('checkout') : route('login') }}" 
                class="btn btn-lg w-100" style="text-decoration: none;">
                    @if (session()->get('language') == 'bangla')
                        চেকআউটে যান
                    @else
                        Proceed To Checkout
                    @endif
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Content End -->
{{-- side cart page trigger --}}
@include('FrontEnd.include.cart-contianer')
@endsection
@push('js')
<script>
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType: 'json',
            success: function(response) {
                var rows = "";
                $('#total_cart_qty').text(Object.keys(response.carts).length);

                if (Object.keys(response.carts).length > 0) {
                    var subtotal = 0;

                    $.each(response.carts, function(key, value) {
                        var slug = value.options.slug;
                        var base_url = window.location.origin;
                        subtotal += value.subtotal;

                        rows += `
                            <div class="product-card p-3 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-4 mb-2 mb-md-0">
                                        <img src="/${value.options.image}" class="product-img img-fluid" alt="${value.name}">
                                    </div>
                                    <div class="col-md-6 col-8 mb-2 mb-md-0">
                                        <h5 class="product-name mb-2">
                                            <a href="${base_url}/product-details/${slug}">${value.name}</a>
                                        </h5>
                                        <div class="mb-2 d-flex align-items-center gap-3">
                                            <span class="price">Price: ${value.price} TK</span>
                                            ${value.options.regular_price && value.options.regular_price != value.price
                                                ? `<del class="old-price">${value.options.regular_price} TK</del>`
                                                : ''}
                                        </div>
                                        <div class="product-attributes">`;
                        $.each(value.options.attribute_names, function(index, val) {
                            rows += `<span class="attribute-tag">${val}: ${value.options.attribute_values[index]}</span>`;
                        });
                        rows += `
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-4 text-md-center mb-2 mb-md-0 mx">
                                        <div class="quantity-control mx-auto">
                                            ${value.qty > 1
                               ? `<button type="button" class="qty-btn qty-btn-minus" id="${value.rowId}" onclick="cartDecrement(this.id)">
                                    <i class="fas fa-minus"></i>
                                </button>`
                               : `<button type="button" class="qty-btn qty-btn-minus" disabled>
                                    <i class="fas fa-minus"></i>
                                </button>`
                           }
                            <input type="text" value="${value.qty}" class="qty-input" disabled>
                            <button type="button" class="qty-btn qty-btn-plus" id="${value.rowId}" onclick="cartIncrement(this.id)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 text-md-center mb-2 mb-md-0 mx">
                        <h5 class="subtotal mb-0">৳${value.subtotal}</h5>
                    </div>
                    <div class="col-md-1 col-2 text-center">
                        <button type="button" id="${value.rowId}" onclick="cartRemove(this.id)" class="remove-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>`;
                    });

                    $('#cartPage').html(rows);
                    $('#cartSubTotal').text(subtotal);
                    $('#cartTotal').text(subtotal);

                } else {
                    rows = `
                        <div class="text-center py-5">
                            <img src="{{ asset('FrontEnd/img/empty-cart.png') }}" alt="Empty Cart" style="max-width: 160px; margin-bottom: 24px;">
                            <h4 style="color: #036042; margin-bottom: 12px; font-weight: 700;">Your cart is empty!</h4>
                            <p class="text-muted mb-4" style="font-size: 1.1rem;">Looks like you haven't added anything to your cart yet.</p>
                            <a href="{{ route('home') }}" class="btn" style="background: #036042; color: #fff; border-radius: 10px; border: none; padding: 10px 28px; text-decoration: none; transition: all 0.3s;">
                                Continue Shopping
                            </a>
                        </div>`;
                    $('#cartPage').html(rows);
                    $('#cartSubTotal').text(0);
                    $('#cartTotal').text(0);
                }
            }
        });
    }
    cart();

    /* ==================== Start cartIncrement ================== */
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1200
                })

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
        });
    }
    /* ==================== End cartIncrement ================== */

    /* ==================== Start Cart Decrement ================== */
    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
        });
    }
    /* ==================== End Cart Decrement ================== */

    /* ================ Start My Cart Remove Product =========== */
    function cartRemove(id) {
        $.ajax({
            type: 'GET',
            url: '/cart-remove/' + id,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
        });
    }
    /* ==================== End Cart Remove ================== */
</script>
@endpush