<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<style>
    /* Latest Products Section */
    .latest-products-section {
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        margin-bottom: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .latest-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 0 10px;
    }

    .latest-header h2 {
        font-size: 32px;
        color: #003E32;
        margin: 0;
    }

    .latest-header p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    .latest-header-left {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .view-all-latest-btn {
        background-color: #003E32;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        white-space: nowrap;
    }

    .view-all-latest-btn:hover {
        background-color: #e55b00;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 15px;
        padding: 10px;
    }

    .latest-product-card {
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
    }

    .latest-product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(255, 98, 0, 0.15);
        border-color: #003E32;
    }

    .product-image-wrapper {
        width: 100%;
        height: 200px;
        background: #f5f5f5;
        position: relative;
        overflow: hidden;
    }

    .product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .latest-product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #003E32;
        color: white;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
        z-index: 2;
    }

    .product-info {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
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

    .product-rating {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 8px;
        font-size: 12px;
    }

    .product-rating i {
        color: #ffc107;
        font-size: 11px;
    }

    .product-rating span {
        color: #666;
    }

    .latest-product-price {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .current-price {
        font-size: 18px;
        font-weight: bold;
        color: #003E32;
    }

    .original-price {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
    }

    .discount-badge {
        background-color: #003E32;
        color: white;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: bold;
    }

    .add-to-cart-btn {
        background: linear-gradient(135deg, #003E32, #003E32);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .out-of-stock-btn {
        background: #ccc;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        cursor: not-allowed;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .add-to-cart-btn:hover {
        background: #036A46;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
    }

    .add-to-cart-btn:active {
        transform: translateY(0);
    }

    .load-more-container {
        text-align: center;
        margin-top: 30px;
        padding: 0 10px;
    }

    .load-more-btn {
        background: linear-gradient(135deg, #003E32, #003E32);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .load-more-btn:hover {
        background: #036A46;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
    }

    /* Extra Small Devices (320px and up) */
    @media (max-width: 320px) {
        .latest-products-section {
            padding: 5px;
            margin-bottom: 15px;
        }

        .latest-header {
            flex-direction: column;
            gap: 10px;
            text-align: center;
            margin-bottom: 15px;
            padding: 0 5px;
        }

        .latest-header h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .latest-header p {
            font-size: 11px;
            margin-bottom: 10px;
        }

        .view-all-latest-btn {
            width: 100%;
            padding: 10px 12px;
            font-size: 12px;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 6px;
            padding: 5px;
        }

        .product-image-wrapper {
            height: 100px;
        }

        .product-info {
            padding: 8px;
        }

        .product-name {
            font-size: 10px;
            min-height: 24px;
            margin-bottom: 4px;
            -webkit-line-clamp: 1;
        }

        .product-rating {
            font-size: 10px;
            margin-bottom: 4px;
        }

        .product-rating i {
            font-size: 9px;
        }

        .product-rating span {
            font-size: 10px;
        }

        .latest-product-price {
            margin-bottom: 8px;
            gap: 4px;
        }

        .current-price {
            font-size: 12px;
        }

        .original-price {
            font-size: 10px;
        }

        .product-badge {
            padding: 2px 6px;
            font-size: 9px;
        }

        .add-to-cart-btn,
        .out-of-stock-btn {
            padding: 6px 8px;
            font-size: 10px;
            min-height: 34px;
        }

        .load-more-container {
            margin-top: 15px;
            padding: 0 5px;
        }

        .load-more-btn {
            width: 100%;
            padding: 10px 12px;
            font-size: 12px;
        }
    }

    /* Small Devices (321px to 480px) */
    @media (min-width: 321px) and (max-width: 480px) {
        .latest-products-section {
            padding: 0;
            margin-bottom: 20px;
        }

        .latest-header {
            flex-direction: column;
            gap: 12px;
            text-align: center;
            margin-bottom: 20px;
            padding: 0 5px;
        }

        .latest-header h2 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .latest-header p {
            font-size: 12px;
        }

        .view-all-latest-btn {
            width: 100%;
            padding: 11px 15px;
            font-size: 13px;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            padding: 8px;
        }

        .product-image-wrapper {
            height: 130px;
        }

        .product-info {
            padding: 10px;
        }

        .product-name {
            font-size: 11px;
            min-height: 28px;
            margin-bottom: 6px;
        }

        .product-rating {
            font-size: 11px;
            margin-bottom: 6px;
        }

        .product-rating i {
            font-size: 10px;
        }

        .latest-product-price {
            margin-bottom: 10px;
        }

        .current-price {
            font-size: 13px;
        }

        .original-price {
            font-size: 11px;
        }

        .product-badge {
            padding: 3px 8px;
            font-size: 10px;
        }

        .add-to-cart-btn,
        .out-of-stock-btn {
            padding: 8px 10px;
            font-size: 11px;
            min-height: 36px;
        }

        .load-more-container {
            margin-top: 20px;
            padding: 0 5px;
        }

        .load-more-btn {
            width: 100%;
            padding: 11px 15px;
            font-size: 13px;
        }
    }

    /* Tablet Devices (481px to 768px) */
    @media (min-width: 481px) and (max-width: 768px) {
        .latest-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .latest-header h2 {
            font-size: 28px;
        }

        .view-all-latest-btn {
            width: 100%;
            padding: 10px 25px;
            font-size: 14px;
        }

        .products-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            padding: 5px;
        }

        .product-image-wrapper {
            height: 150px;
        }

        .product-info {
            padding: 12px;
        }

        .product-name {
            font-size: 13px;
        }

        .current-price {
            font-size: 16px;
        }

        .latest-products-section {
            padding: 5px;
        }

        .load-more-container {
            margin-top: 25px;
        }

        .load-more-btn {
            padding: 11px 25px;
            font-size: 14px;
        }
    }

    /* Medium Devices (769px to 992px) */
    @media (min-width: 769px) and (max-width: 992px) {
        .products-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .latest-header h2 {
            font-size: 30px;
        }
    }

    /* Large Devices (993px to 1200px) */
    @media (min-width: 993px) and (max-width: 1200px) {
        .products-grid {
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
    }

    /* Extra Large Devices (1201px and up) */
    @media (min-width: 1201px) {
        .products-grid {
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
        }

        .latest-header h2 {
            font-size: 32px;
        }
    }
</style>

<!-- Products Section -->
<section class="latest-products-section">
    <div class="latest-header">
        <div class="latest-header-left">
            <h2>
                @if (session()->get('language') == 'bangla')
                    সাম্প্রতিক পণ্যসমূহ
                @else
                    Latest Products
                @endif
            </h2>
            <p>
                @if (session()->get('language') == 'bangla')
                    আমাদের সংগ্রহে নতুনভাবে যুক্ত আইটেমসমূহ
                @else
                    Newly added items to our collection
                @endif
            </p>
        </div>
        <a href="{{ route('product.show') }}" class="view-all-latest-btn">View All</a>
    </div>

    <div class="products-grid">
        @forelse ($product_trendings as $product)
            @php
                $data = calculateDiscount($product->id);

                $summary = getProductReviewsSummary($product->id);
                $average_rating = $summary['average_rating'];
                $total_ratings = $summary['total_ratings'] ?? 0;
            @endphp

            <div class="latest-product-card" data-product-slug="{{ $product->slug }}">
                <div class="product-image-wrapper">
                    <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}" />
                    @if ($product->regular_price != $data['discount'] && $data['text'])
                        <span class="product-badge">{{ $data['text'] }}</span>
                    @endif
                </div>

                <div class="product-info">
                    <h3 class="product-name">
                        @if (session()->get('language') == 'bangla')
                            {{ $product->name_bn }}
                        @else
                            {{ $product->name_en }}
                        @endif
                    </h3>
                    <div class="product-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $average_rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="fas fa-star" style="color: #ddd;"></i>
                            @endif
                        @endfor

                        <span>({{ $total_ratings }})</span>
                    </div>

                    {{-- Price --}}
                    <div class="latest-product-price">
                        <span class="current-price">{{ $data['discount'] }} TK</span>
                        @if ($product->regular_price != $data['discount'])
                            <span class="original-price">{{ $product->regular_price }} TK</span>
                        @endif
                    </div>



                    {{-- Cart Button Logic --}}
                    @if ($product->stock_qty > 0)
                        @if (Auth::check() && Auth::user()->role == '5')
                            <button onclick="wholesellerAlert()" class="add-to-cart-btn">
                                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                            </button>
                        @else
                            @if ($product->is_varient == 1)
                                <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                    data-bs-target="#quickViewModal" class="add-to-cart-btn">
                                    {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                </button>
                            @else
                                <button onclick="addToCartDirect({{ $product->id }})" class="add-to-cart-btn">
                                    {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                </button>
                                <input type="hidden" id="pfrom" value="direct">
                                <input type="hidden" id="product_product_id" value="{{ $product->id }}"
                                    min="1">
                                <input type="hidden" id="{{ $product->id }}-product_pname"
                                    value="{{ $product->name_en }}">
                            @endif
                        @endif
                    @else
                        <button class="out-of-stock-btn" disabled>
                            {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                        </button>
                    @endif
                </div>
            </div>

        @empty
            <p style="text-align: center; padding: 20px;">No latest products available</p>
        @endforelse
    </div>

    <div class="load-more-container">
        <button type="button" id="load-more-btn" class="load-more-btn">
            @if (session()->get('language') == 'bangla')
                আরো দেখুন
            @else
                View More
            @endif
        </button>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Navigate to product details on card click
        $('.latest-product-card').on('click', function(e) {
            if (!$(e.target).closest('.add-to-cart-btn, .out-of-stock-btn').length) {
                const productSlug = $(this).data('product-slug');
                if (productSlug) {
                    window.location.href = '/product-details/' + productSlug;
                }
            }
        });
    });

    var offset = 12;
    $('#load-more-btn').click(function() {
        showLoader();
        $.ajax({
            url: '/load-more-products',
            method: 'GET',
            data: {
                offset: offset,
                count: 12
            },
            success: function(response) {
                var products = response.products;
                if (products.length > 0) {
                    products.forEach(function(product) {
                        var reviews = product.reviews_count || 0;
                        var averageRating = product.average_rating || 0;
                        var discountText = product.discount_text || '';
                        var discountPrice = product.discount_price || product.regular_price;
                        var starsHtml = '';

                        if (reviews > 0) {
                            for (let i = 1; i <= 5; i++) {
                                if (i <= Math.floor(averageRating)) {
                                    starsHtml += '<i class="fas fa-star"></i>';
                                } else if (i - averageRating < 1) {
                                    starsHtml += '<i class="fas fa-star-half-alt"></i>';
                                } else {
                                    starsHtml +=
                                        '<i class="fas fa-star" style="color:#ddd;"></i>';
                                }
                            }
                        } else {

                            for (let i = 1; i <= 5; i++) {
                                starsHtml +=
                                    '<i class="fas fa-star" style="color:#ddd;"></i>';
                            }
                        }


                        var productHtml = `
              <div class="latest-product-card" data-product-slug="${product.slug}">
                <div class="product-image-wrapper">
                  <img src="${product.product_thumbnail}" alt="${product.name_en}" />
                  ${product.regular_price != product.discount_price && product.discount_text ? `
                    <span class="product-badge">${product.discount_text}</span>
                  ` : ''}
                </div>
                <div class="product-info">
                  <h3 class="product-name">
                    ${$("#language_status").val() == 'bangla' ? product.name_bn : product.name_en}
                  </h3>
                  
           
                    <div class="product-rating">
                      ${starsHtml}
                      <span>(${reviews})</span>
                    </div>
              

                  <div class="latest-product-price">
                    <span class="current-price">${discountPrice} TK</span>
                    ${product.regular_price != discountPrice ? `
                      <span class="original-price">${product.regular_price} TK</span>
                    ` : ''}
                  </div>

                  ${product.stock_qty > 0 ? (
                    product.is_varient == 1 ? `
                      <button onclick="productView(${product.id})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="add-to-cart-btn">
                        ${$("#language_status").val() == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart'}
                      </button>
                    ` : `
                      <button onclick="addToCartDirect(${product.id})" class="add-to-cart-btn">
                        ${$("#language_status").val() == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart'}
                      </button>
                      <input type="hidden" id="pfrom" value="direct">
                      <input type="hidden" id="product_product_id" value="${product.id}" min="1">
                      <input type="hidden" id="${product.id}-product_pname" value="${product.name_en}">
                    `
                  ) : `
                    <button class="out-of-stock-btn" disabled>
                      ${$("#language_status").val() == 'bangla' ? 'স্টক আউট' : 'Out of Stock'}
                    </button>
                  `}
                </div>
              </div>
            `;
                        $('.products-grid').append(productHtml);

                        // Attach click handler to newly added card
                        $('.products-grid').find('[data-product-slug="' + product.slug +
                            '"]').on('click', function(e) {
                            if (!$(e.target).closest(
                                    '.add-to-cart-btn, .out-of-stock-btn').length) {
                                const productSlug = $(this).data('product-slug');
                                if (productSlug) {
                                    window.location.href = '/product-details/' +
                                        productSlug;
                                }
                            }
                        });
                    });
                    offset += products.length;
                } else {
                    $('#load-more-btn').hide();
                }
            },
            error: function(error) {
                console.error(error);
                hideLoader();
            },
            complete: function() {
                hideLoader();
            }
        });
    });

    function showLoader() {
        $('#load-more-btn').addClass('loading');
        $('#load-more-btn').html(
            '<span class="spinner" style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: #fff; animation: spin 1s linear infinite;"></span> Loading...'
        );
        $('#load-more-btn').css({
            'opacity': '0.7',
            'cursor': 'wait'
        });
    }

    function hideLoader() {
        $('#load-more-btn').removeClass('loading');
        $('#load-more-btn').html(
            "@if (session()->get('language') == 'bangla') আরো দেখুন @else View More @endif"
        );
        $('#load-more-btn').css({
            'opacity': '1',
            'cursor': 'pointer'
        });
    }
</script>
