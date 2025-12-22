@extends('FrontEnd.master')
@section('title')
Shopping Cart
@endsection
@section('content')
<style>
    .cart-header {
        padding: 15px 0;
    }

    .breadcrumb-cart {
        background: transparent;
        font-weight: 500;
        font-size: 16px !important;
        list-style: none;
    }

    .breadcrumb-cart .breadcrumb-item {
        color: #28a745;
        text-decoration: none;
        transition: color 0.2s;
        font-size: 16px !important;
    }

    .product-name a {
        font-size: 18px !important;
        font-weight: 600;
        line-height: 1.5;
    }

    .cart-items {
        padding: 28px;
    }

    @media (max-width: 767px) {
        .cart-items {
            padding:  10px;
        }

        .mx{
            margin-right: 15px;
        }
    }
</style>
<!-- Cart Header Start -->
<div class="cart-header">
    <div class="custom_container  ">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb-cart d-flex  align-items-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" style="color: #28a745; text-decoration: none;">
                                @if (session()->get('language') == 'bangla')
                                হোম
                                @else
                                Home
                                @endif
                            </a>
                        </li>
                        <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
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
<section class="custom_container  ">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="cart-container shadow-sm"
                style="background: #fff; border-radius: 20px;  margin-bottom: 32px; border: 1px solid #e0e0e0; overflow: hidden;">
                <div style="padding: 23px; background-color: #28a745;">
                    <h4 class="" style="color: #fafafa;">
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
            <div class="summary-card shadow-sm"
                style="background: #fff; border-radius: 20px; overflow: hidden; margin-bottom: 24px; border: 1px solid #e0e0e0;">
                <div class="summary-header" style="background: #28a745; padding: 22px 20px; color: #fff;">
                    <h4 class="mb-0 text-white">
                        @if (session()->get('language') == 'bangla')
                        কার্ট সারাংশ
                        @else
                        Cart Summary
                        @endif
                    </h4>
                </div>
                <div class="summary-body" style="padding: 22px 20px;">
                    <div class="summary-row d-flex justify-content-between align-items-center mb-3">
                        <span style="color: #343a40;">
                            @if (session()->get('language') == 'bangla')
                            সাবটোটাল
                            @else
                            Subtotal
                            @endif
                        </span>
                        <span style="color: #28a745; font-size: 1.1rem;">৳<span id="cartSubTotal"></span></span>
                    </div>
                    <div class="summary-total pt-3 border-top" style="font-size: 1.25rem; font-weight: 600;">
                        <div class="d-flex justify-content-between align-items-center my-2">
                            <span style="color: #343a40;">
                                @if (session()->get('language') == 'bangla')
                                মোট
                                @else
                                Total
                                @endif
                            </span>
                            <span style="color: #28a745;">৳<span id="cartTotal"></span></span>
                        </div>
                    </div>
                    <div class="checkout-actions text-end mt-3">
                        @if (Auth::check() || !Auth::check())
                        <a href="{{ route('checkout') }}" class="btn btn-lg py-3 px-4 block w-100"
                            style="background: #28a745; color: #fff; border-radius: 40px; border: none; box-shadow: 0 2px 12px rgba(0,0,0,0.1); transition: all 0.2s;">
                            @if (session()->get('language') == 'bangla')
                            চেকআউটে যান
                            @else
                            Proceed To Checkout
                            @endif
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @endif
                        {{-- @auth
                  <a href="{{ route('checkout') }}" class="btn btn-lg py-3 px-4 block w-100"
                        style="background: #28a745; color: #fff; border-radius: 40px; border: none; box-shadow: 0 2px 12px rgba(0,0,0,0.1); transition: all 0.2s;">
                        @if (session()->get('language') == 'bangla')
                        চেকআউটে যান
                        @else
                        Proceed To Checkout
                        @endif
                        <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @endauth --}}
                        {{-- @guest
                  <a href="{{ route('login') }}" class="btn btn-lg py-3 px-4 d-block w-100"
                        style="background: #28a745; color: #fff; border-radius: 40px; border: none; box-shadow: 0 2px 12px rgba(0,0,0,0.1); transition: all 0.2s;">
                        @if (session()->get('language') == 'bangla')
                        অর্ডার করুন
                        @else
                        Place Order
                        @endif
                        <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        @endguest --}}
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
                                                           <div class="product-card p-3 mb-3 shadow-sm" style="border-radius: 14px; background: #fafbfc; border: 1px solid #f2cbc6;">
                                                               <div class="row align-items-center">
                                                                   <div class="col-md-2 col-4 mb-2 mb-md-0">
                                                                       <img src="/${value.options.image}" class="product-img img-fluid" style="border-radius: 10px; box-shadow: 0 2px 8px rgba(216,63,38,0.08);" alt="${value.name}">
                                                                   </div>
                                                                   <div class="col-md-6 col-8 mb-2 mb-md-0">
                                                                       <h5 class="product-name mb-2" style="color: #2D3142;">
                                                                           <a href="${base_url}/product-details/${slug}" style="text-decoration: none; color: #313131; transition: color 0.2s;">${value.name}</a>
                                                                       </h5>
                                                                       <div class="text-md-center mb-2 mb-md-0 d-flex align-items-center gap-3">
                                                                           <h5 class="price mb-0" style="color: #28a745;">Price: ${value.price} TK</h5>
                                                                           ${value.options.regular_price && value.options.regular_price != value.price
                                                                               ? `<del class="old-price" style="color: grey">${value.options.regular_price} TK</del>`
                                                                               : ''}
                                                                       </div>
   
                                                                       <div class="product-attributes">`;
                        $.each(value.options.attribute_names, function(index, val) {
                            rows +=
                                `<span class="attribute-tag" style="display: inline-block; padding: 3px 10px; background: #e9ecef; border-radius: 30px; font-size: 13px; margin-right: 6px; margin-bottom: 5px; color: #6c757d;">${val}: ${value.options.attribute_values[index]}</span>`;
                        });
                        rows += `
                                                                       </div>
                                                                   </div>
   
                                                                   <div class="col-md-2 col-4 text-md-center mb-2 mb-md-0 mx">
                                                                       <div class="quantity-control mx-auto" style="display: flex; align-items: center; background: #fff; border-radius: 30px; padding: 2px 8px; width: fit-content; border: 1px solid #e0e0e0;">
                                                                           ${value.qty > 1
                               ? `<button type="button" class="qty-btn qty-btn-minus" id="${value.rowId}" onclick="cartDecrement(this.id)" style="width: 32px; height: 32px; border-radius: 50%; border: none; background: #e9ecef; color: #28a745; font-weight: bold;">
                                                                                           <i class="fas fa-minus"></i>
                                                                                          </button>`
                               : `<button type="button" class="qty-btn qty-btn-minus" disabled style="width: 32px; height: 32px; border-radius: 50%; border: none; background: #f5f5f5; color: #ccc;">
                                                                                           <i class="fas fa-minus"></i>
                                                                                          </button>`
                           }
                            <input type="text" value="${value.qty}" class="qty-input" style="width: 40px; border: none; background: transparent; text-align: center; font-weight: 700; color: #2D3142;" disabled>
                            <button type="button" class="qty-btn qty-btn-plus" id="${value.rowId}" onclick="cartIncrement(this.id)" style="width: 32px; height: 32px; border-radius: 50%; border: none; background: #28a745; color: #fff; font-weight: bold;">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 text-md-center mb-2 mb-md-0 mx">
                        <h5 class="subtotal mb-0" style="color: #b82e18;">৳${value.subtotal}</h5>
                    </div>
                    <div class="col-md-1 col-2 text-center">
                        <button type="button" id="${value.rowId}" onclick="cartRemove(this.id)" class="remove-btn ms-auto" style="width: 36px; height: 36px; border-radius: 50%; background: #e9ecef; border: none; color: #28a745; display: flex; align-items: center; justify-content: center;">
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
                            <h4 style="color: #28a745; margin-bottom: 12px;">Your cart is empty!</h4>
                            <p class="text-muted mb-4" style="font-size: 1.1rem;">Looks like you haven't added anything to your cart yet.</p>
                            <a href="{{ route('home') }}" class="btn py-2 px-4" style="background: #28a745; color: #fff; border-radius: 40px; border: none;">
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

                // Start Message
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

                // Start Message
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
                // End Message
            }
        });
    }
    /* ==================== End Cart Remove ================== */
</script>
@endpush