@extends('FrontEnd.master')
@section('title')
    Flash Sale
@endsection

@section('content')
    <!-- Flash Sale Header Section -->
    <section class="flash-sale-header bg-gradient mb-4">
        <div class="custom_container">
            <div class="row align-items-center py-4">
                <div class="col-md-6">
                    <div class="sale-header-content">
                        <h2 class="sale-title fw-bold mb-2">
                            <i class="fas fa-bolt text-warning me-2"></i>
                            {{ session()->get('language') == 'bangla' ? 'ফ্ল্যাশ সেল' : 'Flash Sale' }}
                        </h2>
                        <p class="text-white mb-0">
                            <i class="fas fa-box-open me-1"></i>
                            {{ count($campaign->campaing_products) }}
                            {{ session()->get('language') == 'bangla' ? 'টি পণ্য পাওয়া গেছে' : 'Products Found' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="countdown-wrapper text-center">
                        <span class="countdown-label">
                            {{ session()->get('language') == 'bangla' ? 'শেষ হচ্ছে' : 'Ending In' }}
                        </span>
                        <div class="countdown-timer" id="demo"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PHP Date Calculations -->
    @php
        $flash_start = date_create($campaign->flash_start);
        $flash_end = date_create($campaign->flash_end);

        $start_diff = $flash_start->getTimestamp() - time();
        $end_diff = $flash_end->getTimestamp() - time();

        $start_diff2 = date_diff(date_create($campaign->flash_start), date_create(date('d-m-Y H:i:s')));
        $end_diff2 = date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
    @endphp
    <input type="hidden" id="language_status" value="{{ session()->get('language') }}">

    <!-- Products Grid Section -->
    <section class="flash-sale-products mb-5">
        <div class="custom_container">
            @if ($start_diff2->invert == 0 && $end_diff2->invert == 0)
                @if (count($campaign->campaing_products) > 0)
                    <div class="product-grid">
                        @foreach ($campaign->campaing_products as $product)
                            @php
                                if ($product->discount_type == 1) {
                                    $discount_price = $product->product->regular_price - $product->discount_price;
                                    $discount_label = '৳' . $product->discount_price;
                                    $discount_percent = round(
                                        ($product->discount_price / $product->product->regular_price) * 100,
                                    );
                                } else {
                                    $discount_percent = $product->discount_price;
                                    $discount_price =
                                        $product->product->regular_price -
                                        ($discount_percent * $product->product->regular_price) / 100;
                                    $discount_label = $discount_percent . '%';
                                }
                            @endphp

                            <div class="col">
                                <div class="product-card">
                                    <!-- Discount Badge -->
                                    <div class="discount-badge">
                                        <span>-{{ $discount_label }}</span>
                                    </div>

                                    <!-- Product Image -->
                                    <a href="{{ route('product.details', $product->product->slug) }}"
                                        class="product-img-wrap">
                                        <img src="{{ asset($product->product->product_thumbnail) }}" alt="Product Image">
                                    </a>

                                    <div class="product-details">
                                        <!-- Title -->
                                        <a href="{{ route('product.details', $product->product->slug) }}"
                                            class="product-title">
                                            @if (session()->get('language') == 'bangla')
                                                {!! Str::substr($product->product->name_bn, 0, 40) !!}{{ Str::length($product->product->name_bn) > 40 ? '...' : '' }}
                                            @else
                                                {!! Str::substr($product->product->name_en, 0, 40) !!}{{ Str::length($product->product->name_en) > 40 ? '...' : '' }}
                                            @endif
                                        </a>

                                        <!-- Price -->
                                        <div class="product-price">
                                            <span class="current-price">৳{{ number_format($discount_price, 0) }}</span>
                                            <span
                                                class="original-price">৳{{ number_format($product->product->regular_price, 0) }}</span>
                                        </div>

                                        <!-- Stock Status -->
                                        @if ($product->product->stock_qty > 0)
                                            <div class="stock-status in-stock">
                                                <i class="fas fa-check-circle"></i>
                                                {{ session()->get('language') == 'bangla' ? 'স্টকে আছে' : 'In Stock' }}
                                                <span>({{ $product->product->stock_qty }})</span>
                                            </div>
                                        @else
                                            <div class="stock-status out-of-stock">
                                                <i class="fas fa-times-circle"></i>
                                                {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                            </div>
                                        @endif

                                        <!-- Action Buttons -->
                                        @if ($product->product->stock_qty > 0)
                                            <div class="product-actions">
                                                @if (Auth::check() && Auth::user()->role == '5')
                                                    {{-- Wholeseller restriction --}}
                                                    <button onclick="wholesellerAlert()" class="btn-buy-now">
                                                        {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                                    </button>
                                                    <button onclick="wholesellerAlert()" class="btn-add-cart">
                                                        {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                    </button>
                                                @else
                                                    @if ($product->product->is_varient == 1)
                                                        <button type="button"
                                                            onclick="productView({{ $product->product->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                            class="btn-buy">
                                                            <!-- <i class="fas fa-shopping-cart me-1"></i> -->
                                                            {{ session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now' }}
                                                        </button>
                                                        <button type="button"
                                                            onclick="productView({{ $product->product->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                            class="btn-cart">
                                                            <!-- <i class="fas fa-cart-plus me-1"></i> -->
                                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            onclick="buyNow({{ $product->product->id }})" class="btn-buy">
                                                            <!-- <i class="fas fa-bolt me-1"></i> -->
                                                            {{ session()->get('language') == 'bangla' ? 'এখুনি কিনুন' : 'Buy Now' }}
                                                        </button>

                                                        <input type="hidden" id="pfrom" value="direct">
                                                        <input type="hidden" id="product_product_id"
                                                            value="{{ $product->product->id }}" min="1">
                                                        <input type="hidden"
                                                            id="{{ $product->product->id }}-product_pname"
                                                            value="{{ $product->product->name_en }}">

                                                        <button type="button"
                                                            onclick="addToCartDirect({{ $product->product->id }})"
                                                            class="btn-cart">
                                                            <!-- <i class="fas fa-cart-plus me-1"></i> -->
                                                            {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                        @else
                                            <button type="button" class="btn-disabled" disabled>
                                                <i class="fas fa-times-circle me-1"></i>
                                                {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty state with nice illustration -->
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <h3>{{ session()->get('language') == 'bangla' ? 'কোন পণ্য পাওয়া যায়নি' : 'No Products Found' }}
                        </h3>
                        <p>{{ session()->get('language') == 'bangla' ? 'দুঃখিত, এই মুহূর্তে কোন ফ্ল্যাশ সেল পণ্য নেই' : 'Sorry, there are no flash sale products at the moment' }}
                        </p>
                    </div>
                @endif
            @else
                <!-- Sale not active state -->
                <div class="sale-inactive">
                    <div class="sale-inactive-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>{{ session()->get('language') == 'bangla' ? 'ফ্ল্যাশ সেল এখনও শুরু হয়নি' : 'Flash Sale Has Not Started Yet' }}
                    </h3>
                    <p>{{ session()->get('language') == 'bangla' ? 'অনুগ্রহ করে অপেক্ষা করুন' : 'Please check back later' }}
                    </p>
                </div>
            @endif
        </div>
    </section>

    <style>
        .btn-buy-now {
            background: #01B45E;
            color: white;
            box-shadow: 0 2px 8px rgba(216, 63, 38, 0.3);
        }

        .btn-buy-now:hover {
            background: #c2362a;
            transform: translateY(-1px);
        }

        .btn-buy-now,
        .btn-add-cart {
            border: none;
            padding: 0px 3px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
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

        .btn-buy-now,
        .btn-add-cart {
            font-size: 12px;
        }


        /* Modern Flash Sale Styling */
        .bg-gradient {
            background: #008F4C;
            color: white;
        }

        .sale-header-content {
            padding: 1rem 0;
        }

        .sale-title {
            font-size: 2rem;
            margin: 0;
            color: white;
        }

        /* Countdown Styling */
        .countdown-wrapper {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 8px;
        }

        .countdown-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .countdown-box {
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            min-width: 60px;
            text-align: center;
        }

        .countdown-box span {
            font-size: 1.5rem;
            font-weight: bold;
            color: #01B45E;
            display: block;
        }

        .countdown-box small {
            color: #666;
            font-size: 0.75rem;
        }

        /* Product Card Styling */
        .product-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
            position: relative;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .discount-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: #ff5252;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            z-index: 2;
        }

        .product-img-wrap {
            display: block;
            padding: 1rem;
            background: #f8f9fa;
        }

        .product-img-wrap img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            transition: transform 0.2s ease;
        }

        .product-card:hover .product-img-wrap img {
            transform: scale(1.05);
        }

        .product-details {
            padding: .5rem;
        }

        .product-title {
            color: #333;
            font-size: 0.95rem;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            height: 2.8em;
            overflow: hidden;
        }

        .product-price {
            margin: 0.5rem 0;
        }

        .current-price {
            color: #01B45E;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .original-price {
            color: #999;
            text-decoration: line-through;
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        .stock-status {
            font-size: 0.85rem;
            margin: 0.5rem 0;
        }

        .in-stock {
            color: #01B45E;
        }

        .out-of-stock {
            color: #ff5252;
        }

        .product-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn-buy,
        .btn-cart,
        .btn-disabled {
            border: none;
            /* padding: 0.5rem; */
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-buy {
            background: #01B45E;
            color: white;
        }

        .btn-buy:hover {
            background: #008f4c;
        }

        .btn-cart {
            background: transparent;
            border: 1px solid #01B45E;
            color: #01B45E;
        }

        .btn-cart:hover {
            background: #01B45E;
            color: white;
        }

        .btn-disabled {
            background: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }

        /* Empty States */
        .empty-state,
        .sale-inactive {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-state-icon,
        .sale-inactive-icon {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        @media (max-width: 1024px) {
            .product-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sale-title {
                font-size: 1.5rem;
            }

            .countdown-box {
                min-width: 50px;
                padding: 0.25rem 0.5rem;
            }

            .countdown-box span {
                font-size: 1.25rem;
            }

            .product-img-wrap img {
                height: 150px;
            }

            .product-title {
                font-size: 0.85rem;
                height: 2.4em;
            }

            .product-actions {
                grid-template-columns: 1fr;
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .btn-buy {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

@endsection

@push('js')
    <script>
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
        // Convert PHP date differences to JavaScript format
        var startDiff = <?php echo $start_diff * 1000; ?>;
        var endDiff = <?php echo $end_diff * 1000; ?>;

        // Set the date we're counting down to based on PHP date differences
        var countDownDateStart = new Date(Date.now() + startDiff);
        var countDownDateEnd = new Date(Date.now() + endDiff);

        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();

            // Choose between start and end dates based on your requirement
            var countDownDate = (now < countDownDateStart.getTime()) ? countDownDateStart : countDownDateEnd;

            // Calculate the remaining time
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Format numbers to always have two digits
            days = days < 10 ? "0" + days : days;
            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Output the result in an element with id="demo"
            if ($('#language_status').val() == 'bangla') {
                var html = `
                <div class="countdown-box">
                    <span>${days}</span>
                    <small>দিন</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${hours}</span>
                    <small>ঘন্টা</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${minutes}</span>
                    <small>মিনিট</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${seconds}</span>
                    <small>সেকেন্ড</small>
                </div>
            `;
            } else {
                var html = `
                <div class="countdown-box">
                    <span>${days}</span>
                    <small>D</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${hours}</span>
                    <small>H</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${minutes}</span>
                    <small>M</small>
                </div>
                <span class="countdown-separator">:</span>
                <div class="countdown-box">
                    <span>${seconds}</span>
                    <small>S</small>
                </div>
            `;
            }

            document.getElementById("demo").innerHTML = html;

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                location.reload();
            }
        }, 1000);
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
