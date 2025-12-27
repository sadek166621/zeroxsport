<style>
    .flash-sale-section {
        position: relative;
        overflow: hidden;
        padding: 10px 0 20px 0;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
        position: relative;
        z-index: 2;
    }

    .flash-sale-content {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        height: 100%;
    }

    .sale-header {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .flash-title {
        font-size: 2.6rem;
        font-weight: 600;
        color: #01B45E;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
        margin: 0;
        animation: slideInDown 0.6s ease-out;
        letter-spacing: 1px;
    }

    .campaign-name {
        font-size: 1.5rem;
        font-weight: 500;
        color: #ffffff;
        margin: 12px 0;
        animation: slideInUp 0.6s ease-out;
    }

    .timer-section {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.15);
        padding: 20px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease;
    }

    .ending-text {
        font-size: 1.3rem;
        color: #ffffff;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .countdown-display {
        font-size: 1.1rem;
        font-weight: 600;
        color: #ffffff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .countdown-display span {
        display: inline-block;
        background: #01B45E;
        padding: 8px 12px;
        border-radius: 8px;
        margin: 0 4px;
        min-width: 50px;
        transition: transform 0.3s ease;
    }

    .countdown-display span:hover {
        transform: scale(1.1);
    }

    .countdown-display small {
        color: #FFEA00;
        font-weight: 500;
    }

    .shop-more-container {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .shop-more-btn {
        display: inline-flex;
        align-items: center;
        background: #01B45E;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.4s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-shine {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.7), transparent);
        transition: left 0.5s ease;
    }

    .shop-more-btn:hover .btn-shine {
        left: 100%;
    }

    .flash-product-card {
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .flas-product-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        line-height: 1.3;
        transition: color 0.3s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 36px;
    }

    /* Media queries for responsiveness */
    @media (max-width: 768px) {
        .flash-title {
            font-size: 2.1rem;
        }

        /* ... (other media queries from the original) */
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
    <div class="custom_container">
        <div class="flas-sale-content row">
            <div class="flash-sale-banner col-md-4 mb-md-0 mb-3">
                <div class="flash-sale-content" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url('{{ asset($campaign->campaing_image) }}'); background-size: cover; background-position: center; border-radius: 20px; padding: 30px; position: relative; overflow: hidden;">
                    <div class="sale-header mb-4">
                        <h3 class="flash-title">
                            @if (session()->get('language') == 'bangla')
                            ফ্ল্যাশ সেল
                            @else
                            Flash Sale
                            @endif
                        </h3>
                        <h3 class="campaign-name">
                            @if (session()->get('language') == 'bangla')
                            {{ $campaign->name_bn ?? 'ফ্ল্যাশ সেল' }}
                            @else
                            {{ $campaign->name_en ?? 'Flash Sale' }}
                            @endif
                        </h3>
                    </div>
                    <div class="timer-section text-center mb-5">
                        <div class="ending-text">
                            @if (session()->get('language') == 'bangla')
                            শেষ হচ্ছে
                            @else
                            Ending In
                            @endif
                        </div>
                        <div id="demo" class="countdown-display"></div>
                    </div>
                    <div class="shop-more-container">
                        <a href="{{ route('campaign.product') }}" class="shop-more-btn">
                            <span>
                                @if (session()->get('language') == 'bangla')
                                আরো কিনুন
                                @else
                                Shop More
                                @endif
                            </span>
                            <div class="btn-shine"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="products-carousel-wrapper col-md-8">
                <div class="owl-carousel owl-theme flash_sale" id="flash-sale-carousel">
                    @foreach ($campaign->campaing_products as $product)
                    @php $data = calculateDiscount($product->product->id); @endphp
                    <div class="flash-product-card">
                        @if ($data['text'])
                        <div class="discount-badge">
                            Save {{ $data['text'] }}
                        </div>
                        @endif
                        <div class="" style="width: 100%; height: 100%;">
                            <a style="width: 100%; height: 100%;" href="{{ route('product.details', $product->product->slug) }}">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset($product->product->product_thumbnail) }}" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-details">
                            <a href="{{ route('product.details', $product->product->slug) }}" class="product-link">
                                <h3 class="flas-product-title">
                                    @if (session()->get('language') == 'bangla')
                                    {!! Str::substr($product->product->name_bn, 0, 25) !!}
                                    @else
                                    {!! Str::substr($product->product->name_en, 0, 25) !!}
                                    @endif
                                </h3>
                            </a>
                            <div class="price-section">
                                <h4 class="current-price">{{ $data['discount'] }} TK</h4>
                                <span class="original-price">{{ $product->product->regular_price }} TK</span>
                            </div>
                            <div class="action-buttons">
                                @if ($product->product->stock_qty > 0)
                                @if (Auth::check() && Auth::user()->role == '5')
                                <button onclick="wholesellerAlert()" class="btn-buy-now">
                                    {{ session()->get('language') == 'bangla' ? 'এখনি কিনুন' : 'Buy Now' }}
                                </button>
                                <button onclick="wholesellerAlert()" class="btn-add-cart">
                                    {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                </button>
                                @else
                                @if ($product->product->is_varient == 1)
                                <button onclick="productView({{ $product->product->id }})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-buy-now">
                                    {{ session()->get('language') == 'bangla' ? ' কিনুন' : 'Buy Now' }}
                                </button>
                                <button onclick="productView({{ $product->product->id }})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="btn-add-cart">
                                    {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                </button>
                                @else
                                <button onclick="buyNow({{ $product->product->id }})" class="btn-buy-now">
                                    {{ session()->get('language') == 'bangla' ? ' কিনুন' : 'Buy Now' }}
                                </button>
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
                    @endforeach
                </div>
            </div>
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
        var html =
            `<span>${days}D</span> <small>:</small> <span>${hours}H</span> <small>:</small> <span>${minutes}M</span> <small>:</small> <span>${seconds}s</span>`;
        document.getElementById("demo").innerHTML = html;
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

    $(document).ready(function() {
        $('#flash-sale-carousel').owlCarousel({
            loop: true,
            margin: 5,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1400: {
                    items: 3
                }
            },
            navText: [
                '<span style="font-size:2rem;line-height:1;">&#8249;</span>',
                '<span style="font-size:2rem;line-height:1;">&#8250;</span>'
            ]
        });
    });
</script>