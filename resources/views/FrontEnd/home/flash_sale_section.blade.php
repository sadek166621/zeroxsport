<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<style>
    /* Flash Sale Section */
    .flash-sale-section {
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        margin-bottom: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .flash-sale-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 0 10px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .flash-title-container {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .flash-title {
        font-size: 32px;
        font-weight: 700;
        color: #003E32;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .flash-icon {
        font-size: 36px;
        color: #e55b00;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.6;
        }
    }

    .timer-container {
        background: linear-gradient(135deg, #003E32, #036645);
        padding: 15px 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 12px rgba(0, 62, 50, 0.2);
    }

    .timer-label {
        color: white;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .countdown-display {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .countdown-display span {
        background: #e55b00;
        padding: 8px 12px;
        border-radius: 6px;
        min-width: 45px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(229, 91, 0, 0.3);
    }

    .countdown-display span:hover {
        transform: scale(1.08);
        box-shadow: 0 4px 12px rgba(229, 91, 0, 0.4);
    }

    .countdown-display small {
        color: #ffd700;
        font-weight: 600;
        font-size: 12px;
    }

    .flash-sale-products {
        position: relative;
    }

    .flash-product-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 100%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin: 5px;
    }

    .flash-product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0, 62, 50, 0.15);
        border-color: #003E32;
    }

    .flash-product-image-wrapper {
        width: 100%;
        height: 200px;
        background: #f5f5f5;
        position: relative;
        overflow: hidden;
    }

    .flash-product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .flash-product-card:hover .flash-product-image-wrapper img {
        transform: scale(1.05);
    }

    .discount-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #003E32 !important;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(229, 91, 0, 0.3);
    }

    .flash-product-info {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .flas-product-title {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        line-height: 1.4;
        min-height: 40px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .flash-product-price {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .current-price {
        font-size: 18px;
        font-weight: bold;
        color: #003E32 !important;
    }

    .original-price {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: auto;
    }

    .btn-buy-now,
    .btn-add-cart {
        background: linear-gradient(135deg, #003E32, #036645);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-buy-now:hover,
    .btn-add-cart:hover {
        background: linear-gradient(135deg, #036645, #046A56);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 62, 50, 0.3);
    }

    .btn-buy-now:active,
    .btn-add-cart:active {
        transform: translateY(0);
    }

    .out-of-stock {
        background: #ccc;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: not-allowed;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        width: 100%;
    }

    /* Owl Carousel Customization */
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        background-color: #003E32 !important;
        border-radius: 50%;
        width: 45px !important;
        height: 45px !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .owl-carousel .owl-nav button.owl-prev:hover,
    .owl-carousel .owl-nav button.owl-next:hover {
        background-color: #e55b00 !important;
    }

    .owl-carousel .owl-nav button span {
        font-size: 20px;
        color: white;
    }

    .owl-carousel .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .owl-carousel .owl-nav button.owl-prev {
        position: absolute;
        left: 0;
        pointer-events: all;
    }

    .owl-carousel .owl-nav button.owl-next {
        position: absolute;
        right: 0;
        pointer-events: all;
    }

    /* Responsive Design */
    @media (max-width: 320px) {
        .flash-sale-header {
            flex-direction: column;
            text-align: center;
        }

        .flash-title {
            font-size: 20px;
        }

        .flash-icon {
            font-size: 24px;
        }

        .timer-container {
            flex-direction: column;
            padding: 12px 15px;
            width: 100%;
            gap: 10px;
        }

        .countdown-display {
            font-size: 0.9rem;
        }

        .countdown-display span {
            padding: 6px 8px;
            min-width: 38px;
            font-size: 11px;
        }

        .flash-product-image-wrapper {
            height: 120px;
        }

        .flas-product-title {
            font-size: 11px;
            min-height: 28px;
        }

        .current-price {
            font-size: 13px;
        }

        .original-price {
            font-size: 10px;
        }

        .btn-buy-now,
        .btn-add-cart,
        .out-of-stock {
            padding: 7px 8px;
            font-size: 11px;
            min-height: 34px;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            width: 32px !important;
            height: 32px !important;
            opacity: 0.7;
        }

        .owl-carousel .owl-nav button span {
            font-size: 14px;
        }
    }

    @media (min-width: 321px) and (max-width: 480px) {
        .flash-title {
            font-size: 22px;
        }

        .flash-icon {
            font-size: 28px;
        }

        .timer-container {
            flex-direction: column;
            padding: 12px 15px;
            width: 100%;
            gap: 10px;
        }

        .countdown-display {
            font-size: 0.95rem;
        }

        .countdown-display span {
            padding: 7px 10px;
            min-width: 40px;
        }

        .flash-product-image-wrapper {
            height: 140px;
        }

        .flas-product-title {
            font-size: 12px;
            min-height: 32px;
        }

        .current-price {
            font-size: 14px;
        }

        .btn-buy-now,
        .btn-add-cart,
        .out-of-stock {
            padding: 8px 10px;
            font-size: 12px;
            min-height: 38px;
        }
    }

    @media (min-width: 481px) and (max-width: 768px) {
        .flash-sale-header {
            flex-direction: column;
            text-align: center;
        }

        .flash-title {
            font-size: 26px;
        }

        .timer-container {
            flex-direction: column;
            width: 100%;
            gap: 10px;
        }

        .flash-product-image-wrapper {
            height: 150px;
        }

        .flas-product-title {
            font-size: 13px;
        }

        .current-price {
            font-size: 16px;
        }
    }

    @media (min-width: 769px) and (max-width: 1199px) {
        .flash-title {
            font-size: 28px;
        }

        .timer-container {
            flex-direction: row;
            gap: 15px;
        }
    }

    @media (min-width: 1200px) {
        .flash-title {
            font-size: 32px;
        }

        .timer-container {
            flex-direction: row;
            gap: 20px;
        }
    }
</style>

@php
$campaign = \App\Models\Campaing::where('status', 1)->where('is_featured', 1)->orderBy('id', 'desc')->first();
@endphp

@if ($campaign)
@php
$flash_start = date_create($campaign->flash_start);
$flash_end = date_create($campaign->flash_end);
$start_diff = $flash_start->getTimestamp() - time();
$end_diff = $flash_end->getTimestamp() - time();
$start_diff2 = date_diff(date_create($campaign->flash_start), date_create(date('d-m-Y H:i:s')));
$end_diff2 = date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
@endphp

@if ($start_diff2->invert == 0 && $end_diff2->invert == 0)
<section class="flash-sale-section mt-4">
    <div class="flash-sale-header">
        <div class="flash-title-container">
            <i class="fas fa-fire flash-icon"></i>
            <h2 class="flash-title">
                @if (session()->get('language') == 'bangla')
                ফ্ল্যাশ সেল
                @else
                Flash Sale
                @endif
            </h2>
        </div>
        <div class="timer-container">
            <span class="timer-label">
                @if (session()->get('language') == 'bangla')
                শেষ হচ্ছে
                @else
                Ending In
                @endif
            </span>
            <div id="demo" class="countdown-display"></div>
        </div>
    </div>

    <div class="flash-sale-products">
        <div class="owl-carousel owl-theme flash_sale" id="flash-sale-carousel">
            @foreach ($campaign->campaing_products as $product)
            @php $data = calculateDiscount($product->product->id); @endphp
            <div class="item">
                <div class="flash-product-card">
                    @if ($data['text'])
                    <div class="discount-badge">
                        {{ $data['text'] }}
                    </div>
                    @endif
                    <div class="flash-product-image-wrapper">
                        <a href="{{ route('product.details', $product->product->slug) }}" style="width: 100%; height: 100%; display: block;">
                            <img src="{{ asset($product->product->product_thumbnail) }}" alt="Product Image">
                        </a>
                    </div>
                    <div class="flash-product-info">
                        <a href="{{ route('product.details', $product->product->slug) }}" class="product-link" style="text-decoration: none; color: inherit;">
                            <h3 class="flas-product-title">
                                @if (session()->get('language') == 'bangla')
                                {!! Str::substr($product->product->name_bn, 0, 35) !!}
                                @else
                                {!! Str::substr($product->product->name_en, 0, 35) !!}
                                @endif
                            </h3>
                        </a>
                        <div class="flash-product-price">
                            <span class="current-price">{{ $data['discount'] }} TK</span>
                            @if ($product->product->regular_price != $data['discount'])
                            <span class="original-price">{{ $product->product->regular_price }} TK</span>
                            @endif
                        </div>
                        <div class="action-buttons">
                            @if ($product->product->stock_qty > 0)
                            @if (Auth::check() && Auth::user()->role == '5')
                            <!-- <button onclick="wholesellerAlert()" class="btn-buy-now">
                                {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                            </button> -->
                            <button onclick="wholesellerAlert()" class="btn-add-cart">
                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                            </button>
                            @else
                            @if ($product->product->is_varient == 1)
                            <!-- <button onclick="productView({{ $product->product->id }})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-buy-now">
                                {{ session()->get('language') == 'bangla' ? 'কিনুন' : 'Buy Now' }}
                            </button> -->
                            <button onclick="productView({{ $product->product->id }})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-add-cart">
                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                            </button>
                            @else
                            <!-- <button onclick="buyNow({{ $product->product->id }})" class="btn-buy-now">
                                {{ session()->get('language') == 'bangla' ? 'কিনুন' : 'Buy Now' }}
                            </button> -->
                            <input type="hidden" id="pfrom" value="direct">
                            <input type="hidden" id="product_product_id" value="{{ $product->product->id }}" min="1">
                            <input type="hidden" id="{{ $product->product->id }}-product_pname" value="{{ $product->product->name_en }}">
                            <button onclick="addToCartDirect({{ $product->product->id }})" class="btn-add-cart">
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
        </div>
    </div>
</section>
@endif
@endif

<script>
    var startDiff = <?php echo $start_diff * 1000; ?>;
    var endDiff = <?php echo $end_diff * 1000; ?>;
    var countDownDateStart = new Date(Date.now() + startDiff);
    var countDownDateEnd = new Date(Date.now() + endDiff);

    var x = setInterval(function() {
        var now = new Date().getTime();
        var countDownDate = (now < countDownDateStart.getTime()) ? countDownDateStart : countDownDateEnd;
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var html = `<span>${days}D</span> <small>:</small> <span>${hours}H</span> <small>:</small> <span>${minutes}M</span> <small>:</small> <span>${seconds}s</span>`;
        document.getElementById("demo").innerHTML = html;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

    $(document).ready(function() {
        $('#flash-sale-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            navText: ['<span class="fas fa-chevron-left"></span>', '<span class="fas fa-chevron-right"></span>'],
            responsive: {
                0: {
                    items: 1.5
                },
                320: {
                    items: 2
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                },
                1400: {
                    items: 5
                }
            }
        });

        $('.flash-product-card').on('click', function(e) {
            if (!$(e.target).closest('.btn-buy-now, .btn-add-cart, .out-of-stock').length) {
                const productLink = $(this).find('.product-link').attr('href');
                if (productLink) {
                    window.location.href = productLink;
                }
            }
        });
    });
</script>