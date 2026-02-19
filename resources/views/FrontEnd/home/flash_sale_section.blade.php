@php
$campaign = \App\Models\Campaing::where('status', 1)->where('is_featured', 1)->orderBy('id', 'desc')->first();
@endphp

@if($campaign)
@php
$flash_end = date_create($campaign->flash_end);
$end_diff = $flash_end->getTimestamp() - time();
$end_diff2 = date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
@endphp

@if($end_diff2->invert == 0)
<style>
    .flash-sale-section {
        margin-bottom: 40px;
        background: linear-gradient(135deg, #fff5f5 0%, #ffe9e9 100%);
        padding: 30px;
        border-radius: 10px;
        border: 2px solid var(--primary-color);
    }
    
    .flash-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .flash-title {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .flash-title h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }
    
    .flash-icon {
        font-size: 40px;
        color: var(--primary-color);
        animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.7; transform: scale(1.1); }
    }
    
    .countdown-timer {
        background: var(--primary-color);
        padding: 15px 25px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .timer-label {
        color: white;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .timer-display {
        display: flex;
        gap: 10px;
        color: white;
        font-size: 24px;
        font-weight: 700;
    }
    
    .timer-display span {
        background: rgba(255,255,255,0.2);
        padding: 5px 10px;
        border-radius: 5px;
        min-width: 50px;
        text-align: center;
    }
    
    .flash-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .flash-product-card {
        background: white;
        border-radius: 8px;
        padding: 15px;
        position: relative;
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
        cursor: pointer;
    }
    
    .flash-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(237, 28, 36, 0.2);
        border-color: var(--primary-color);
    }
    
    .flash-discount {
        position: absolute;
        top: 10px;
        left: 10px;
        background: var(--primary-color);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
    }
    
    @media (max-width: 768px) {
        .flash-sale-section {
            padding: 20px;
        }
        
        .flash-header {
            flex-direction: column;
            text-align: center;
        }
        
        .flash-title h2 {
            font-size: 22px;
        }
        
        .countdown-timer {
            width: 100%;
            justify-content: center;
        }
        
        .timer-display {
            font-size: 18px;
        }
        
        .timer-display span {
            min-width: 35px;
            padding: 3px 5px;
        }
        
        .flash-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<section class="flash-sale-section">
    <div class="flash-header">
        <div class="flash-title">
            <i class="fas fa-bolt flash-icon"></i>
            <h2>Flash Sale</h2>
        </div>
        
        <div class="countdown-timer">
            <span class="timer-label">Ending In</span>
            <div class="timer-display" id="flashCountdown"></div>
        </div>
    </div>
    
    <div class="flash-grid">
        @foreach($campaign->campaing_products as $product)
        @php $data = calculateDiscount($product->product->id); @endphp
        
        <div class="flash-product-card" data-product-slug="{{ $product->product->slug }}">
            @if($data['text'])
            <div class="flash-discount">{{ $data['text'] }}</div>
            @endif
            
            <div class="product-image" style="height: 150px;">
                <img src="{{ asset($product->product->product_thumbnail) }}" alt="{{ $product->product->name_en }}" style="max-width: 100%; max-height: 100%;">
            </div>
            
            <h3 class="product-name" style="font-size: 14px; min-height: 36px;">
                @if(session()->get('language') == 'bangla')
                {{ Str::limit($product->product->name_bn, 25) }}
                @else
                {{ Str::limit($product->product->name_en, 25) }}
                @endif
            </h3>
            
            <div class="product-price" style="margin-bottom: 5px;">
                <span class="current-price">৳ {{ number_format($data['discount']) }}</span>
                @if($product->product->regular_price != $data['discount'])
                <span class="original-price">৳ {{ number_format($product->product->regular_price) }}</span>
                @endif
            </div>
            
            @if($product->product->stock_qty > 0)
                @if(Auth::check() && Auth::user()->role == '5')
                <button onclick="wholesellerAlert()" class="add-to-cart-btn" style="padding: 8px;">
                    Add to Cart
                </button>
                @elseif($product->product->is_varient == 1)
                <button onclick="productView({{ $product->product->id }})" class="add-to-cart-btn" style="padding: 8px;" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                    Add to Cart
                </button>
                @else
                <button onclick="addToCartDirect({{ $product->product->id }})" class="add-to-cart-btn" style="padding: 8px;">
                    Add to Cart
                </button>
                @endif
            @else
            <button class="out-of-stock-btn" style="padding: 8px;" disabled>
                Out of Stock
            </button>
            @endif
        </div>
        @endforeach
    </div>
</section>

<script>
    var endTime = <?php echo $end_diff * 1000; ?>;
    var countDownDate = new Date(Date.now() + endTime);
    
    var timer = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        
        document.getElementById("flashCountdown").innerHTML = 
            '<span>' + hours + '</span>:<span>' + minutes + '</span>:<span>' + seconds + '</span>';
        
        if (distance < 0) {
            clearInterval(timer);
            document.getElementById("flashCountdown").innerHTML = "EXPIRED";
        }
    }, 1000);
    
    // Navigate to product details
    $('.flash-product-card').on('click', function(e) {
        if (!$(e.target).closest('.add-to-cart-btn, .out-of-stock-btn').length) {
            const productSlug = $(this).data('product-slug');
            if (productSlug) {
                window.location.href = '/product-details/' + productSlug;
            }
        }
    });
</script>
@endif
@endif