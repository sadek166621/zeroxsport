<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<style>
    .latest-products-section {
        padding: 10px 15px;
        background-color: #e8e8e8;
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
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
    }

    .latest-header-left {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .latest-header p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    .view-all-latest-btn {
        background-color: ##f09220;
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
        background-color: #066552;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 124, 102, 0.3);
    }

    .latest-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 15px;
    }

    .latest-product-card {
        background: white;
        border-radius: 10px;
        padding: 15px;
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .latest-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .discount-badge {
        background: ##f09220;
        color: white;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 700;
    }

    .card-actions {
        display: flex;
        gap: 6px;
    }

    .icon-btn {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1.5px solid #ddd;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .icon-btn:hover {
        border-color: ##f09220;
        background: #f0f9f7;
    }

    .product-image-wrapper {
        position: relative;
        margin-bottom: 12px;
        text-align: center;
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f5f5;
        border-radius: 8px;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        margin-bottom: 8px;
    }

    .price-tag {
        position: absolute;
        top: 0;
        right: 0;
        background: #e91e63;
        color: white;
        padding: 5px 12px;
        border-radius: 3px;
        font-weight: 700;
        font-size: 11px;
        z-index: 2;
    }

    .price-tag::after {
        content: '';
        position: absolute;
        bottom: -6px;
        right: 10px;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #e91e63;
    }

    .old-price-tag {
        background: white;
        color: #666;
        text-decoration: line-through;
        border: 1px solid #e91e63;
    }

    .old-price-tag::after {
        border-top-color: white;
    }

    .emi-text {
        font-size: 9px;
        color: #333;
        margin-top: 3px;
        text-align: right;
    }

    .product-badges {
        display: flex;
        gap: 5px;
        margin-top: 8px;
        flex-wrap: wrap;
    }

    .badge {
        height: 35px;
    }

    .badge-official {
        width: auto;
        height: 38px;
    }

    .product-info {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        margin-bottom: 10px;
        min-height: 36px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
        cursor: pointer;
    }

    .latest-product-price {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin-bottom: 8px;
    }

    .current-price {
        font-size: 20px;
        font-weight: 700;
        color: ##f09220;
    }

    .original-price {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .stars {
        display: flex;
        gap: 1px;
    }

    .star {
        color: #ffc107;
        font-size: 22px !important;
    }

    .review-count {
        font-size: 11px;
        color: #666;
    }

    .express-badge {
        font-size: 11px;
        font-weight: 600;
        color: #333;
    }

    .express-badge .ex {
        color: #e91e63;
    }

    .add-to-cart-btn {
        background: ##f09220;
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
        background: #066552;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 124, 102, 0.3);
    }

    .load-more-container {
        text-align: center;
        margin-top: 30px;
        padding: 0 10px;
    }

    .load-more-btn {
        background: ##f09220;
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
        background: #066552;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 124, 102, 0.3);
    }

    @media (max-width: 1400px) {
        .latest-products-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .latest-products-section {
            padding: 20px 15px;
        }

        .latest-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .view-all-latest-btn {
            width: 100%;
        }

        .latest-products-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
        }

        .latest-header h2 {
            font-size: 26px;
        }

        .product-image {
            height: 140px;
        }
    }

    @media (max-width: 480px) {
        .latest-products-section {
            padding: 15px 10px;
        }

        .latest-header {
            flex-direction: column;
            gap: 12px;
        }

        .latest-header h2 {
            font-size: 22px;
        }

        .latest-products-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .latest-product-card {
            padding: 12px;
        }

        .product-image {
            height: 120px;
        }

        .product-name {
            font-size: 12px;
            min-height: 32px;
        }

        .current-price {
            font-size: 18px;
        }

        .original-price {
            font-size: 12px;
        }
    }

    .bengali {
        font-family: 'Noto Sans Bengali', 'SolaimanLipi', sans-serif;
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

    <div class="latest-products-grid">
        @forelse ($product_trendings as $product)
        @php
        $data = calculateDiscount($product->id);

        $summary = getProductReviewsSummary($product->id);
        $average_rating = $summary['average_rating'];
        $total_ratings = $summary['total_ratings'] ?? 0;
        @endphp

        <!-- Product Card -->
        <div class="latest-product-card" data-product-slug="{{ $product->slug }}">
            <div class="card-header">
                @if ($product->regular_price != $data['discount'] && $data['text'])
                <span class="discount-badge">{{ $data['text'] }}</span>
                @else
                <span class="discount-badge" style="visibility: hidden;">-0%</span>
                @endif
                <div class="card-actions">
                    <button class="icon-btn" title="Quick View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    <button class="icon-btn" title="Add to Wishlist">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="product-image-wrapper">
                <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}" class="product-image" />
            </div>

            <h3 class="product-name">
                @if (session()->get('language') == 'bangla')
                {{ $product->name_bn }}
                @else
                {{ $product->name_en }}
                @endif
            </h3>

            <div class="latest-product-price">
                <span class="current-price">৳ {{ $data['discount'] }}</span>
                @if ($product->regular_price != $data['discount'])
                <span class="original-price">৳ {{ $product->regular_price }}</span>
                @endif
            </div>

            <div class="product-rating">
                <div class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <=$average_rating)
                        <span class="star">★</span>
                        @else
                        <span class="star" style="color: #ddd;">★</span>
                        @endif
                        @endfor
                </div>
                <span class="review-count">({{ $total_ratings }})</span>
            </div>

            {{-- Cart Button Logic --}}
            @if ($product->stock_qty > 0)
            @if (Auth::check() && Auth::user()->role == '5')
            <button onclick="wholesellerAlert()" class="add-to-cart-btn">
                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
            </button>
            @else
            @if ($product->is_varient == 1)
            <!-- <button onclick="productView({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="add-to-cart-btn">
                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
            </button> -->
            @else
            <!-- <button onclick="addToCartDirect({{ $product->id }})" class="add-to-cart-btn">
                {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
            </button> -->
            <input type="hidden" id="pfrom" value="direct">
            <input type="hidden" id="product_product_id" value="{{ $product->id }}" min="1">
            <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">
            @endif
            @endif
            @else
            <!-- <button class="out-of-stock-btn" disabled>
                {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
            </button> -->
            @endif
        </div>

        @empty
        <p style="text-align: center; padding: 20px;">No latest products available</p>
        @endforelse
    </div>

    <div class="load-more-container" >
        <button type="button" id="load-more-btn" class="load-more-btn"style="
    background: #f09220;
">
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
                                    starsHtml += '<span class="star">★</span>';
                                } else if (i - averageRating < 1) {
                                    starsHtml += '<span class="star">★</span>';
                                } else {
                                    starsHtml +=
                                        '<span class="star" style="color:#ddd;">★</span>';
                                }
                            }
                        } else {

                            for (let i = 1; i <= 5; i++) {
                                starsHtml +=
                                    '<span class="star" style="color:#ddd;">★</span>';
                            }
                        }


                        var productHtml = `
              <div class="latest-product-card" data-product-slug="${product.slug}">
                <div class="card-header">
                  ${product.regular_price != product.discount_price && product.discount_text ? `
                    <span class="discount-badge">${product.discount_text}</span>
                  ` : `
                    <span class="discount-badge" style="visibility: hidden;">-0%</span>
                  `}
                  <div class="card-actions">
                    <button class="icon-btn" title="Quick View">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>
                    </button>
                    <button class="icon-btn" title="Add to Wishlist">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="product-image-wrapper">
                  <img src="${product.product_thumbnail}" alt="${product.name_en}" class="product-image" />
                </div>
                <h3 class="product-name">
                  ${$("#language_status").val() == 'bangla' ? product.name_bn : product.name_en}
                </h3>

                <div class="latest-product-price">
                  <span class="current-price">৳ ${discountPrice}</span>
                  ${product.regular_price != discountPrice ? `
                    <span class="original-price">৳ ${product.regular_price}</span>
                  ` : ''}
                </div>

                <div class="product-rating">
                  <div class="stars">
                    ${starsHtml}
                  </div>
                  <span class="review-count">(${reviews})</span>
                </div>

                ${product.stock_qty > 0 ? (
                  product.is_varient == 1 ? `
                    
                  ` : `
                    
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
            `;
                        $('.latest-products-grid').append(productHtml);

                        // Attach click handler to newly added card
                        $('.latest-products-grid').find('[data-product-slug="' + product.slug +
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

    // Add to Cart Functionality
    function addToCartDirect(productId) {
        $.ajax({
            type: 'POST',
            url: '/cart/data/store/' + productId,
            data: {
                qty: 1,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart',
                        text: response.message || 'Product added to cart successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    getMiniCart();
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to add product to cart'
                });
            }
        });
    }

    // Product View for variants
    function productView(productId) {
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + productId,
            success: function(response) {
                $('#quickViewModal .modal-body').html(generateProductModal(response.product, response
                    .attributes));
                $('#quickViewModal').modal('show');
            },
            error: function(error) {
                console.error('Error loading product:', error);
            }
        });
    }

    // Generate product modal HTML
    function generateProductModal(product, attributes) {
        let html = `
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('') }}${product.product_thumbnail}" class="img-fluid" alt="${product.name_en}">
        </div>
        <div class="col-md-6">
          <h3>${product.name_en}</h3>
          <p class="text-muted">${product.category.name_en}</p>
          <h4 class="text-danger">Tk ${product.regular_price}</h4>
          <p>${product.short_des}</p>
    `;

        html += `
          <div class="mb-3">
            <label class="form-label"><strong>Quantity</strong></label>
            <input type="number" id="qty" class="form-control" value="1" min="1" max="${product.stock_qty}">
          </div>
          <button class="btn btn-primary" onclick="addVariantToCart(${product.id})">
            Add to Cart
          </button>
        </div>
      </div>
    `;
        return html;
    }

    // Add variant product to cart
    function addVariantToCart(productId) {
        const qty = $('#qty').val();
        const variants = {};

        $('.variant-select').each(function() {
            const attrId = $(this).data('attribute');
            const value = $(this).val();
            if (value) {
                variants[attrId] = value;
            }
        });

        $.ajax({
            type: 'POST',
            url: '/cart/data/store/' + productId,
            data: {
                qty: qty,
                variants: JSON.stringify(variants),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart',
                        text: 'Product added to cart successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#quickViewModal').modal('hide');
                    getMiniCart();
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to add product to cart'
                });
            }
        });
    }

    // Get Mini Cart
    function getMiniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            success: function(response) {
                $('#cartCount').html(response.cartCount || 0);
            }
        });
    }

    // Wholeseller Alert
    function wholesellerAlert() {
        Swal.fire({
            icon: 'info',
            title: 'You are a Wholeseller!',
            text: 'Please go to your dashboard to manage orders.',
            showCancelButton: true,
            confirmButtonText: 'Go to Dashboard',
            cancelButtonText: 'Close',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('wholeseller.dashboard') }}";
            }
        });
    }
</script>