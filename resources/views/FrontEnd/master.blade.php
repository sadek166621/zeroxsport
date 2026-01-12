<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{get_setting('business_name')->value}} | @yield('title')</title>
    <!-- Add this in your <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="shortcut icon" href="{{asset(get_setting('site_favicon')->value ?? '')}}" type="image/x-icon">

    <style>
        .quantity-controls {
            display: inline-flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
            padding: 4px;
        }

        .qty-btn {
            background: #026544;
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

        /* ==================== Custom Modal Styling ==================== */
        .custom-modal {
            --bs-modal-bg: #ffffff;
            --bs-modal-border-color: transparent;
        }

        .custom-modal .modal-dialog {
            max-width: 900px;
            margin: 2rem auto;
        }

        .custom-modal .modal-content {
            border: none;
            box-shadow: 0 10px 40px rgba(2, 99, 67, 0.15);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .custom-modal .modal-content:hover {
            box-shadow: 0 15px 50px rgba(2, 99, 67, 0.2);
        }

        /* Close Button Styling */
        .custom-modal .btn-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #f0f0f0 0%, #e8e8e8 100%);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .custom-modal .btn-close:hover {
            background: linear-gradient(135deg, #026343 0%, #015230 100%);
            transform: rotate(90deg);
        }

        .custom-modal .btn-close:hover::after,
        .custom-modal .btn-close:hover::before {
            background-color: white;
        }

        .custom-modal .btn-close::after,
        .custom-modal .btn-close::before {
            content: '';
            position: absolute;
            background-color: #666;
            transition: all 0.3s ease;
        }

        .custom-modal .btn-close::before {
            width: 16px;
            height: 2px;
            transform: rotate(45deg);
        }

        .custom-modal .btn-close::after {
            width: 16px;
            height: 2px;
            transform: rotate(-45deg);
        }

        /* Modal Body */
        .custom-modal .modal-body {
            padding: 32px;
            position: relative;
        }

        /* Modal Header Styling */
        .custom-modal .modal-header {
            background: linear-gradient(135deg, #026343 0%, #015230 100%);
            border: none;
            padding: 24px 32px;
            border-bottom: 3px solid #01b573;
        }

        .custom-modal .modal-header .modal-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            letter-spacing: 0.3px;
        }

        /* Title Detail */
        .custom-modal .modal-body .title-detail {
            font-size: 20px;
            font-weight: 700;
            color: #026343;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .custom-modal .modal-body .title-detail:hover {
            color: #015230;
        }

        .custom-modal .modal-body .title-detail a {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .custom-modal .modal-body .title-detail a:hover {
            color: #01b573;
            text-decoration: underline;
        }

        /* Product Price Section */
        .custom-modal .product-price-cover {
            padding: 16px 0;
            border-top: 1px solid #e8e8e8;
            border-bottom: 1px solid #e8e8e8;
            margin: 16px 0;
        }

        .custom-modal .product-price {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .custom-modal .current-price {
            font-size: 28px;
            font-weight: 800;
            color: #026343;
            letter-spacing: -0.5px;
        }

        .custom-modal .old-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            font-weight: 500;
        }

        .custom-modal .save-price {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Form Controls */
        .custom-modal .form-group label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .custom-modal .form-control,
        .custom-modal select {
            border: 1.5px solid #e0e0e0;
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }

        .custom-modal .form-control:focus,
        .custom-modal select:focus {
            border-color: #026343;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(2, 99, 67, 0.1);
            outline: none;
        }

        /* Action Buttons */
        .custom-modal .modal-footer {
            padding: 20px 32px;
            border-top: 1px solid #e8e8e8;
            gap: 12px;
        }

        .custom-modal .btn {
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .custom-modal .btn-primary {
            background: linear-gradient(135deg, #026343 0%, #015230 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(2, 99, 67, 0.25);
        }

        .custom-modal .btn-primary:hover {
            background: linear-gradient(135deg, #015230 0%, #00401e 100%);
            box-shadow: 0 6px 20px rgba(2, 99, 67, 0.35);
            transform: translateY(-2px);
        }

        .custom-modal .btn-secondary {
            background: #f0f0f0;
            color: #333;
            border: 1.5px solid #ddd;
        }

        .custom-modal .btn-secondary:hover {
            background: #e8e8e8;
            border-color: #026343;
            color: #026343;
        }

        /* Badge and Indicators */
        .custom-modal .stock-status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .custom-modal .in-stock {
            background: linear-gradient(135deg, #01b573 0%, #00a163 100%);
            color: white;
        }

        .custom-modal .out-stock {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            color: white;
        }

        /* Detail Gallery */
        .custom-modal .detail-gallery {
            position: relative;
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
        }

        .custom-modal .detail-gallery figure {
            margin: 0;
            padding: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .custom-modal .detail-gallery img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .custom-modal .detail-gallery:hover img {
            transform: scale(1.05);
        }

        /* Detail Info */
        .custom-modal .detail-info {
            padding: 16px;
            background: #f9f9f9;
            border-radius: 8px;
        }

        /* Product Rating */
        .custom-modal .product-detail-rating {
            margin: 12px 0;
        }

        .custom-modal .product-rate-cover {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .custom-modal .product-rate {
            display: inline-flex;
            align-items: center;
            background: #f0f0f0;
            border-radius: 4px;
            height: 18px;
            overflow: hidden;
        }

        .custom-modal .product-rating {
            background: linear-gradient(90deg, #ffc107 0%, #ffb300 100%);
            height: 100%;
        }

        /* Quantity Display */
        .custom-modal .quantity-input-group {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 16px 0;
        }

        /* Modal Fade Transition */
        .custom-modal .modal-dialog {
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .custom-modal.show .modal-dialog {
            opacity: 1;
            transform: scale(1);
        }

        /* ==================== Button Styling for Modal ==================== */
        .custom-modal .product-extra-link2 {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 20px;
        }

        /* Add to Cart Button */
        .custom-modal .add_to_cart {
            flex: 1;
            min-width: 200px;
            background: linear-gradient(135deg, #026343 0%, #015230 100%);
            color: white !important;
            border: 2px solid #026343;
            padding: 14px 24px !important;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(2, 99, 67, 0.25);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            white-space: nowrap;
        }

        .custom-modal .add_to_cart::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: 0;
        }

        .custom-modal .add_to_cart:hover::before {
            left: 100%;
        }

        .custom-modal .add_to_cart:hover {
            background: linear-gradient(135deg, #015230 0%, #00401e 100%);
            border-color: #01b573;
            box-shadow: 0 8px 24px rgba(2, 99, 67, 0.4);
            transform: translateY(-2px);
        }

        .custom-modal .add_to_cart:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(2, 99, 67, 0.2);
        }

        .custom-modal .add_to_cart i {
            font-size: 16px;
            display: inline-flex;
            position: relative;
            z-index: 1;
        }

        .custom-modal .add_to_cart span {
            display: inline-flex;
            position: relative;
            z-index: 1;
        }

        /* Buy Now Button */
        .custom-modal .buy_now {
            flex: 1;
            min-width: 200px;
            background: linear-gradient(135deg, #01b573 0%, #00a163 100%);
            color: white !important;
            border: 2px solid #01b573;
            padding: 14px 24px !important;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(1, 181, 115, 0.25);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            white-space: nowrap;
        }

        .custom-modal .buy_now::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
            z-index: 0;
        }

        .custom-modal .buy_now:hover::before {
            left: 100%;
        }

        .custom-modal .buy_now:hover {
            background: linear-gradient(135deg, #00a163 0%, #007a48 100%);
            border-color: #026343;
            box-shadow: 0 8px 24px rgba(1, 181, 115, 0.4);
            transform: translateY(-2px);
        }

        .custom-modal .buy_now:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(1, 181, 115, 0.2);
        }

        .custom-modal .buy_now i {
            font-size: 16px;
            display: inline-flex;
            position: relative;
            z-index: 1;
        }

        .custom-modal .buy_now span {
            display: inline-flex;
            position: relative;
            z-index: 1;
        }

        /* Remove ml-5 margin class styling for modal buttons */
        .custom-modal .product-extra-link2 .ml-5 {
            margin-left: 0 !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .custom-modal .modal-dialog {
                max-width: 95%;
                margin: 1.5rem auto;
            }

            .custom-modal .modal-content {
                border-radius: 8px;
            }

            .custom-modal .modal-body,
            .custom-modal .modal-header,
            .custom-modal .modal-footer {
                padding: 20px 16px;
            }

            .custom-modal .btn-close {
                width: 32px;
                height: 32px;
                top: 12px;
                right: 12px;
            }

            .custom-modal .title-detail {
                font-size: 18px;
            }

            .custom-modal .current-price {
                font-size: 24px;
            }

            .custom-modal .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .custom-modal .product-extra-link2 {
                gap: 10px;
            }

            .custom-modal .add_to_cart,
            .custom-modal .buy_now {
                padding: 12px 16px !important;
                font-size: 13px;
                min-width: 150px;
            }
        }

        @media (max-width: 576px) {
            .custom-modal .product-extra-link2 {
                flex-direction: column;
                gap: 10px;
            }

            .custom-modal .add_to_cart,
            .custom-modal .buy_now {
                width: 100%;
                min-width: 100%;
                padding: 12px 16px !important;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .custom-modal .modal-body {
                padding: 16px;
            }

            .custom-modal .detail-gallery figure {
                min-height: 200px;
            }

            .custom-modal .detail-info {
                padding: 12px;
            }

            .custom-modal .modal-footer {
                flex-direction: column;
            }

            .custom-modal .btn {
                width: 100%;
            }

            .custom-modal .product-extra-link2 {
                flex-direction: column;
                gap: 8px;
                margin-top: 16px;
            }

            .custom-modal .add_to_cart,
            .custom-modal .buy_now {
                width: 100%;
                min-width: 100%;
                padding: 10px 12px !important;
                font-size: 12px;
            }

            .custom-modal .add_to_cart i,
            .custom-modal .buy_now i {
                font-size: 14px;
            }
        }
    </style>

    @include('FrontEnd.include.style')



</head>

<body>
    <!-- Header Part Start -->
    @include('FrontEnd.include.header')
    <!-- Header Part End -->


    <main>
        @yield('content')
    </main>



    <!-- Footer Start -->
    @include('FrontEnd.include.footer')
    <!-- Footer End -->

    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="closeModel"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- <span class="zoom-icon"><i class="fi-rs-search"></i></span> -->
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img id="pimage" src="" class="img-fluid" width="375" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <!-- <div class="slider-nav-thumbnails">
                                    <div><img  src="" alt="product image" /></div>
                                </div> -->
                            </div>
                            <!-- End Gallery -->
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <!--  <span class="stock-status out-stock"> Sale Off </span> -->
                                <h3 class="title-detail"><a id="product_name" href="#" class="text-heading"></a></h3>
                                <!--  <div class="product-detail-rating">
                                     <div class="product-rate-cover text-end">
                                         <div class="product-rate d-inline-block">
                                             <div class="product-rating" style="width: 90%"></div>
                                         </div>
                                         <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                     </div>
                                 </div> -->
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price mb-2 d-flex text-brand">৳ <span
                                                id="pprice"></span></span>
                                        <span>
                                            <!--   <span class="save-price font-md color3 ml-15">26% Off</span> -->
                                            <del id="oldprice" class="old-price font-md ml-15 mb-2"
                                                style="color: grey">৳</del>
                                        </span>
                                    </div>
                                </div>
                                <form id="choice_form">
                                    <div class="row " id="attributes">
                                        <div class="form-group col-lg-6" id="colorArea">
                                            {{-- <label style=" font-weight:bold;color: black;">Chose Color
                                                <span>**</span></label>
                                            <select class="form-control" id="color" name="color">
                                                <option value="">--Choose Color--</option>
                                            </select> --}}
                                        </div>
                                    </div>

                                    <div class="row" id="attribute_alert">

                                    </div>
                                </form>
                                <div class="font-xs">
                                    <ul style="list-style: none">
                                        <li class="mb-1">
                                            {{session()->get('language') == 'bangla' ? 'ক্যাটাগোরি' : 'Category'}}:
                                            <span class="text-brand" id="pcategory">

                                            </span>
                                        </li>
                                        <li class="mb-1">
                                            {{session()->get('language') == 'bangla' ? 'ব্র্যান্ড' : 'Brand'}}:
                                            <span class="text-brand" id="pbrand">

                                            </span>
                                        </li>
                                        <li class="mb-1 d-none">
                                            {{session()->get('language') == 'bangla' ? 'পণ্য কোড' : 'Product Code'}}:
                                            <span class="text-brand" id="pcode">

                                            </span>
                                        </li>
                                        <li class="mb-1">{{session()->get('language') == 'bangla' ? 'স্টক' : 'Stock'}}:
                                            <span class="badge badge-pill badge-success" id="pavailable"
                                                style="background: green; color: white;">
                                                {{session()->get('language') == 'bangla' ? 'স্টকে আছে' : 'Available'}}
                                            </span>
                                            <span class="badge badge-pill badge-danger" id="pstockout"
                                                style="background: red; color: white;">
                                                {{session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Stock Out'}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="detail-extralink align-items-baseline d-flex" style="margin-top: 30px;">
                                    <div class="mr-10">
                                        <span class="">{{session()->get('language') == 'bangla' ? 'পরিমাণ' : 'Quantity'}}:</span>
                                    </div>
                                    <div class="quantity-controls">
                                        <button type="button" class="qty-btn qty-down" aria-label="Decrease quantity">
                                            <i class="fa fa-minus"></i>
                                        </button>

                                        <input type="text" name="quantity" class="qty-input" value="1"
                                            min="1" id="qty" readonly>

                                        <button type="button" class="qty-btn qty-up" aria-label="Increase quantity">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-block mt-3" id="qty_stock_alert">

                                </div>
                                <div class="detail-extralink d-md-flex mb-30" style="margin-top: 10px;">
                                    <!-- <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>

                                        <input type="text" name="quantity" class="qty-val" id="qty" value="1" min="1">

                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div> -->
                                    <div class="product-extra-link2">
                                        <input type="hidden" id="product_id">
                                        <input type="hidden" id="pname">
                                        <input type="hidden" id="product_price">
                                        <input type="hidden" id="discount_amount">
                                        <input type="hidden" id="pfrom" value="modal">
                                        <input type="hidden" id="pvarient" value="">

                                        <input type="hidden" id="minimum_buy_qty" value="">
                                        <input type="hidden" id="stock_qty" value="">

                                        <input type="hidden" id="buyNowCheck" value="0">

                                        <button class="like btn button button-add-to-cart add_to_cart" onclick="test()"
                                            id="closeModel"><i class="fi-rs-shopping-cart"></i>
                                            {{session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart'}}
                                        </button>

                                        <button class="like btn button button-add-to-cart ml-5 buy_now"
                                            onclick="buyProduct()"><i class="fi-rs-shopping-cart"></i>
                                            {{session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now'}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Detail Info -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('FrontEnd.include.script')
    
    @include('FrontEnd.include.checkout')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInput = document.getElementById('qty');
            const qtyUp = document.querySelector('.qty-up');
            const qtyDown = document.querySelector('.qty-down');
            const qtyAlert = document.getElementById('qty_stock_alert');

            if (!qtyInput || !qtyUp || !qtyDown) return;

            const minQty = parseInt(qtyInput.getAttribute('min')) || 1;
            const maxQty = parseInt(qtyInput.getAttribute('max')) || 100;
            let currentQty = parseInt(qtyInput.value) || minQty;

            function updateQuantity(qty) {
                currentQty = qty;
                qtyInput.value = qty;

                qtyDown.disabled = qty <= minQty;
                qtyUp.disabled = qty >= maxQty;

                if (qty >= maxQty) {
                    qtyAlert.textContent = '⚠️ Maximum stock limit reached.';
                } else if (qty <= minQty) {
                    qtyAlert.textContent = '';
                } else {
                    qtyAlert.textContent = '';
                }
            }

            updateQuantity(currentQty);

            qtyUp.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentQty < maxQty) {
                    updateQuantity(currentQty + 1);
                }
            });

            qtyDown.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentQty > minQty) {
                    updateQuantity(currentQty - 1);
                }
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
        const checkoutModal = document.getElementById('checkoutModal');
        const closeCheckoutModal = document.getElementById('closeCheckoutModal');
        const checkoutForm = document.getElementById('checkoutForm');

        // Open checkout modal using event delegation
        document.addEventListener('click', function(e) {
            if (e.target.id === 'checkoutButtonSidebar' || e.target.closest('#checkoutButtonSidebar')) {
                e.preventDefault();
                checkoutModal.classList.add('open');
                updateOrderSummary();
            }
        });

        // Close checkout modal
        if (closeCheckoutModal) {
            closeCheckoutModal.addEventListener('click', function() {
                checkoutModal.classList.remove('open');
            });
        }

        // Close modal when clicking overlay
        const checkoutOverlay = checkoutModal.querySelector('.checkout-modal-overlay');
        if (checkoutOverlay) {
            checkoutOverlay.addEventListener('click', function() {
                checkoutModal.classList.remove('open');
            });
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && checkoutModal.classList.contains('open')) {
                checkoutModal.classList.remove('open');
            }
        });

        // Update order summary when modal opens
        function updateOrderSummary() {
            const subtotalText = document.getElementById('cartSubtotal')?.textContent || '৳0.00';
            const shipping = 100; // Default shipping cost
            const subtotal = parseFloat(subtotalText.replace('৳', '').replace(',', '')) || 0;
            const total = subtotal + shipping;

            document.getElementById('summarySubtotal').textContent = subtotalText;
            document.getElementById('summaryShipping').textContent = '৳' + shipping.toFixed(2);
            document.getElementById('summaryTotal').textContent = '৳' + total.toFixed(2);
        }

        // Handle form submission
        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your form submission logic here
                console.log('Order submitted');
            });
        }
    });
</script>


    @stack('js')
</body>

</html>