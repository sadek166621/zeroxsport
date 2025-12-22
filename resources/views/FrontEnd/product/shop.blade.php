@extends('FrontEnd.master')
@section('title')
    All Products
@endsection
@section('content')
    <style>
        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            margin-bottom: 0px;
        }

        .breadcrumb-item,
        .breadcrumb-item a {
            padding: 20px 0;
            font-weight: 500;
            font-size: 16px !important;
        }

        .hero-section {

            padding-top: 2rem;
            color: #01B45E;
            margin-bottom: 2rem;
        }

        .filter-sidebar {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .filter-section {
            padding: 1rem 0;
            max-height: 250px;
            overflow-y: auto;
            margin-bottom: 15px;
        }



        .filter-section::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        .filter-section::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 7px;
            box-shadow: inset 0 0 6px rgba(2, 6, 23, 0.03);
        }

        .filter-section::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #cbd5e1 0%, #94a3b8 100%);
            border-radius: 7px;
            border: 2px solid #f1f5f9;
            background-clip: padding-box;
            transition: background-color 150ms ease, transform 150ms ease;
        }

        .filter-section::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #94a3b8 0%, #64748b 100%);
            transform: scale(1.02);
        }

        .filter-section::-webkit-scrollbar-thumb:active {
            transform: scale(0.98);
        }



        .filter-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #01B45E;
            margin-bottom: 1rem;
        }

        .price-inputs {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .price-input {
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.5rem;
        }

        .filter-btn {
            background: #01B45E;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            width: 100%;
            transition: all 0.3s;
        }


        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            position: relative;
            padding-top: 100%;
        }

        .product-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            padding: 1rem;
        }

        .product-name {
            font-size: 18px;
            font-weight: 500;
            line-height: 1.4;
            color: #1F2937;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 600;
            color: #01B45E;
        }

        .price-original {
            color: #6B7280;
            text-decoration: line-through;
            font-size: 0.875rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn-buy-now,
        .btn-add-cart {
            border: none;
            padding: 0.3rem;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
        }

        .btn-buy-now {
            background: #01B45E;
            color: white;
            box-shadow: 0 2px 8px rgba(216, 63, 38, 0.3);
        }

        .btn-buy-now:hover {
            background: #c2362a;
            transform: translateY(-1px);
        }

        .btn-add-cart {
            background: white;
            color: #01B45E;
            border: 1px solid #01B45E;
        }

        .btn-add-cart:hover {
            background: #01B45E;
            color: white;
            transform: translateY(-1px);
        }

        .btn-buy {
            background: #01B45E;
            color: white;

        }

        .btn-buy:hover {
            background: #059669;
        }

        .btn-cart {
            background: #E5E7EB;
            color: #01B45E;
            border: 1px solid #01B45E;
        }

        .btn-cart:hover {
            background: #D1D5DB;
        }

        .stock-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: #10B981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            line-height: 1.2;
        }

        .out-of-stock {
            background: #E9E9E9;
            /* Changed to red to better indicate unavailability */
            color: gray;
            padding: 0.3rem;
            text-align: center;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            width: 100%;
            /* Make it full width */
            display: block;
            /* Ensure block display */

            border: none;
            cursor: not-allowed;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .pagination svg {
            width: 15px !important;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: end;
            margin-bottom: 20px;
        }



        @media (max-width: 768px) {
            .filter-sidebar {
                margin-bottom: 2rem;
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .btn-buy-now {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .btn-buy-now {
                display: none;
            }

            .action-buttons {
                flex-direction: column !important;
                gap: 5px !important;
            }

            .btn-primary,
            .btn-secondary {
                width: 100% !important;
                padding: 2px 12px !important;
                font-size: 12px !important;
            }
        }
    </style>

    @php
        $min_price = 0;
        $max_price = 1000000000;
        if (isset($_GET['min_price']) && $_GET['min_price'] > 0) {
            $min_price = $_GET['min_price'];
        }
        if (isset($_GET['max_price']) && $_GET['max_price'] > 0) {
            $max_price = $_GET['max_price'];
        }
    @endphp

    <div class="shop-container">
        <div class="custom_container">

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
                        @if (session()->get('language') == 'bangla')
                            সমস্ত পণ্য
                        @else
                            All Products
                        @endif
                    </li>
                    <!-- <i class="fa fa-chevron-right mx-2" aria-hidden="true"></i>
                                                    <li class="breadcrumb-item active" style=" font-weight: 600;">
                                                        @if (session()->get('language') == 'bangla')
    পণ্যের বিবরণ
@else
    Product Details
    @endif
                                                    </li> -->
                </ol>
            </nav>
        </div>
        <!-- <div class="hero-section">
                                            <div class="custom_container"> -->
        <!-- <h1 class="text-center display-4 fw-bold">
                                                    {{ session()->get('language') == 'bangla' ? 'সমস্ত পণ্য' : 'All Products' }}
                                                </h1> -->
        <!-- <p class="text-center lead mb-0">
                                                    {{ session()->get('language') == 'bangla' ? 'ডিল প্রতিদিন আপডেট করা হয়' : 'Deals updated daily' }}
                                                </p> -->
        <!-- </div>
                                        </div> -->

        <div class="custom_container">
            <div class="row pb-3">
                <!-- Filter Sidebar -->
                <div class="col-lg-3">
                    <div class="filter-sidebar">
                        <form action="">

                            <div class="filter-section">
                                <h3 class="filter-title">
                                    {{ session()->get('language') == 'bangla' ? 'ক্যাটাগরি' : 'Categories' }}
                                </h3>
                                @foreach (get_categories() as $category)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="category[]"
                                            value="{{ $category->name_en }}"
                                            @isset($_GET['category']){{ in_array($category->name_en, $_GET['category']) ? 'checked' : '' }}@endisset>
                                        <label class="form-check-label">
                                            {{ session()->get('language') == 'bangla' ? $category->name_bn : $category->name_en }}
                                            <span class="badge"
                                                style="background-color: #01B45E; font-weight: 500;">{{ count(get_category_products($category->slug)) }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Brands -->
                            <div class="filter-section">
                                <h3 class="filter-title">
                                    {{ session()->get('language') == 'bangla' ? 'ব্র্যান্ড' : 'Brands' }}
                                </h3>
                                @foreach (get_brands() as $brand)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="brand[]"
                                            value="{{ $brand->name_en }}"
                                            @isset($_GET['brand']){{ in_array($brand->name_en, $_GET['brand']) ? 'checked' : '' }}@endisset>
                                        <label class="form-check-label">
                                            {{ session()->get('language') == 'bangla' ? $brand->name_bn : $brand->name_en }}
                                            <span
                                                class="badge bg-secondary">{{ count(get_brand_products($brand->id)) }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="filter-section">
                                <h3 class="filter-title">
                                    {{ session()->get('language') == 'bangla' ? 'মূল্য দ্বারা ফিল্টার' : 'Filter by price' }}
                                </h3>
                                <div class="price-inputs">
                                    <input type="number" name="min_price" class="price-input" placeholder="Min"
                                        value="@isset($_GET['min_price']){{ $_GET['min_price'] }}@endisset">
                                    <span>-</span>
                                    <input type="number" name="max_price" class="price-input" placeholder="Max"
                                        value="@isset($_GET['max_price']){{ $_GET['max_price'] }}@endisset">
                                </div>
                            </div>

                            <button type="submit" class="filter-btn">
                                {{ session()->get('language') == 'bangla' ? 'ফিল্টার' : 'Apply Filters' }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-lg-9">
                    <div class="product-grid">
                        @foreach ($products as $product)
                            @php $data = calculateDiscount($product->id) @endphp
                            @if ($data['discount'] >= $min_price && $data['discount'] <= $max_price)
                                <div class="product-card">
                                    <div class="product-image">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img src="{{ asset($product->product_thumbnail) }}"
                                                alt="{{ $product->name_en }}">
                                            @if ($product->stock_qty > 0)
                                                <span class="stock-badge">
                                                    {{ session()->get('language') == 'bangla' ? 'স্টকে আছে' : 'In Stock' }}
                                                </span>
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-details">
                                        <h3 class="product-name">
                                            @if (session()->get('language') == 'bangla')
                                                {!! Str::limit($product->name_bn, 35) !!}
                                            @else
                                                {!! Str::limit($product->name_en, 35) !!}
                                            @endif
                                        </h3>

                                        <div class="product-price">
                                            ৳{{ $data['discount'] }}
                                            <span class="price-original">৳{{ $product->regular_price }}</span>
                                        </div>

                                        <div class="action-buttons">
                                            @if ($product->stock_qty > 0)
                                                @if (Auth::check() && Auth::user()->role == '5')
                                                    {{-- Wholeseller restriction --}}
                                                    <button onclick="wholesellerAlert()" class="btn-buy-now">
                                                        {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                                    </button>
                                                    <button onclick="wholesellerAlert()" class="btn-add-cart">
                                                        {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                    </button>
                                                @else
                                                    {{-- Normal user actions --}}
                                                    @if ($product->is_varient == 1)
                                                        <button onclick="productView({{ $product->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                            class="btn-buy-now">
                                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                                        </button>
                                                        <button onclick="productView({{ $product->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                            class="btn-add-cart">
                                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                        </button>
                                                    @else
                                                        <button onclick="buyNow({{ $product->id }})" class="btn-buy-now">
                                                            {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                                        </button>

                                                        {{-- Hidden inputs for direct purchase --}}
                                                        <input type="hidden" id="pfrom" value="direct">
                                                        <input type="hidden" id="product_product_id"
                                                            value="{{ $product->id }}" min="1">
                                                        <input type="hidden" id="{{ $product->id }}-product_pname"
                                                            value="{{ $product->name_en }}">

                                                        <button onclick="addToCartDirect({{ $product->id }})"
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
                            @endif
                        @endforeach
                    </div>

                    <div class="pagination">
                        {{ $products->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
    <script>
        function addToCart() {
            var total_attributes = parseInt($('#total_attributes').val());
            //alert(total_attributes);
            var checkNotSelected = 0;
            var checkAlertHtml = '';
            for (var i = 1; i <= total_attributes; i++) {
                var checkSelected = parseInt($('#attribute_check_' + i).val());
                if (checkSelected == 0) {
                    checkNotSelected = 1;
                    checkAlertHtml +=
                        `<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Select ` +
                        $('#attribute_name_' + i).val() + `</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`;
                }
            }
            if (checkNotSelected == 1) {
                $('#qty_alert').html('');
                //$('#attribute_alert').html(checkAlertHtml);
                $('#attribute_alert').html(`<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Select all attributes</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`);
                return false;
            }
            $('.size-filter li').removeClass("active");
            var product_name = $('#pname').val();
            var id = $('#product_id').val();
            var price = $('#product_price').val();
            var color = $('#color option:selected').val();
            var size = $('#size option:selected').val();
            var quantity = $('#qty').val();
            var varient = $('#pvarient').val();

            var min_qty = parseInt($('#minimum_buy_qty').val());
            if (quantity < min_qty) {
                $('#attribute_alert').html('');
                $('#qty_alert').html(
                    `<div class="attr-detail mb-5">
                                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                                            <div>
                                                                                <i class="fa fa-warning mr-10"></i> <span> Minimum quantity ` +
                    min_qty + ` required.</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>`);
                return false;
            }
            // console.log(min_qty);
            var p_qty = parseInt($('#stock_qty').val());
            // if(quantity > p_qty){
            //     $('#stock_alert').html(`<div class="attr-detail mb-5">
        // 								<div class="alert alert-danger d-flex align-items-center" role="alert">
        // 									<div>
        // 										<i class="fa fa-warning mr-10"></i> <span> Not enough stock.</span>
        // 									</div>
        // 								</div>
        // 							</div>`);
            //     return false;
            // }


            // alert(varient);

            var options = $('#choice_form').serializeArray();
            var jsonString = JSON.stringify(options);
            //console.log(options);

            // Start Message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            });

            $.ajax({
                type: 'POST',
                url: '/cart/data/store/' + id,
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    product_price: price,
                    product_varient: varient,
                    options: jsonString,
                },
                success: function(data) {
                    // console.log(data);
                    miniCart();
                    $('#closeModel').click();

                    // Start Sweertaleart Message
                    if ($.isEmptyObject(data.error)) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }

                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })

                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                        $('#qty').val(min_qty);
                        $('#pvarient').val('');

                        for (var i = 1; i <= total_attributes; i++) {
                            $('#attribute_check_' + i).val(0);
                        }
                    }
                    // Start Sweertaleart Message
                    var buyNowCheck = $('#buyNowCheck').val();
                    //alert(buyNowCheck);
                    if (buyNowCheck && buyNowCheck == 1) {
                        $('#buyNowCheck').val(0);
                        window.location = '/checkout';
                    }

                }
            });
        }


        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {

                    miniCart();
                    cart();

                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
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
                cancelButtonColor: '#6c757d', // gray for close
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('wholeseller.dashboard') }}";
                }
            });
        }
    </script>
@endpush
