<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<style>
    /* Featured Products Section */
    .products-section {
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        margin-bottom: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 0 10px;
    }

    .products-header h2 {
        font-size: 32px;
        color: #003E32;
        margin: 0;
    }

    .view-all-btn {
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
    }

    .view-all-btn:hover {
        background-color: #e55b00;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
    }

    .products-slider {
        position: relative;
    }

    .product-card {
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

    .product-card:hover {
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

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #003E32 !important;
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

    .featured-product-price {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
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

    .discount-badge {
        background-color: #003E32;
        color: white;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: bold;
    }

    .add-to-cart {
        background: linear-gradient(135deg, #003E32, #036645);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .out-of-stock {
        background: #ccc;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: not-allowed;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .add-to-cart:hover {
        background: #036A46;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
    }

    .add-to-cart:active {
        transform: translateY(0);
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

    /* Extra Small Devices (320px and up) */
    @media (max-width: 320px) {
        .products-section {
            padding: 5px;
            margin-bottom: 15px;
        }

        .products-header {
            flex-direction: column;
            gap: 10px;
            text-align: center;
            margin-bottom: 15px;
            padding: 0 5px;
        }

        .products-header h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .view-all-btn {
            width: 100%;
            padding: 10px 15px;
            font-size: 12px;
        }

        .product-card {
            margin: 3px;
        }

        .product-image-wrapper {
            height: 120px;
        }

        .product-info {
            padding: 8px;
        }

        .product-name {
            font-size: 11px;
            min-height: 28px;
            margin-bottom: 6px;
        }

        .featured-product-price {
            margin-bottom: 8px;
            gap: 4px !important;
        }

        .current-price {
            font-size: 13px;
        }

        .original-price {
            font-size: 10px;
        }

        .add-to-cart,
        .out-of-stock {
            padding: 7px 8px;
            font-size: 11px;
            min-height: 34px;
        }

        .product-badge {
            padding: 2px 6px;
            font-size: 9px;
            top: 5px;
            right: 5px;
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

        .owl-carousel .owl-nav button.owl-prev {
            left: -5px;
        }

        .owl-carousel .owl-nav button.owl-next {
            right: -5px;
        }
    }

    /* Small Devices (321px to 480px) */
    @media (min-width: 321px) and (max-width: 480px) {
        .products-section {
            padding: 8px;
            margin-bottom: 20px;
        }

        .products-header {
            flex-direction: column;
            gap: 12px;
            text-align: center;
            margin-bottom: 20px;
            padding: 0 5px;
        }

        .products-header h2 {
            font-size: 22px;
        }

        .view-all-btn {
            width: 100%;
            padding: 11px 20px;
            font-size: 13px;
        }

        .product-card {
            margin: 4px;
        }

        .product-image-wrapper {
            height: 140px;
        }

        .product-info {
            padding: 10px;
        }

        .product-name {
            font-size: 12px;
            min-height: 32px;
            margin-bottom: 6px;
        }

        .featured-product-price {
            margin-bottom: 10px;
        }

        .current-price {
            font-size: 14px;
        }

        .original-price {
            font-size: 12px;
        }

        .discount-badge {
            padding: 3px 8px;
            font-size: 10px;
        }

        .add-to-cart,
        .out-of-stock {
            padding: 8px 10px;
            font-size: 12px;
            min-height: 38px;
        }

        .product-badge {
            padding: 3px 10px;
            font-size: 10px;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            width: 38px !important;
            height: 38px !important;
        }

        .owl-carousel .owl-nav button span {
            font-size: 17px;
        }
    }

    /* Medium Devices (481px to 768px) */
    @media (min-width: 481px) and (max-width: 768px) {
        .products-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .products-header h2 {
            font-size: 28px;
        }

        .view-all-btn {
            width: 100%;
            padding: 10px 25px;
            font-size: 14px;
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

        .products-section {
            padding: 5px;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            width: 40px !important;
            height: 40px !important;
        }
    }

    /* Large Devices (769px to 1199px) */
    @media (min-width: 769px) and (max-width: 1199px) {
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .products-header h2 {
            font-size: 28px;
        }

        .view-all-btn {
            padding: 12px 25px;
            font-size: 15px;
        }
    }

    /* Extra Large Devices (1200px and up) */
    @media (min-width: 1200px) {
        .products-header h2 {
            font-size: 32px;
        }

        .view-all-btn {
            padding: 12px 30px;
            font-size: 16px;
        }
    }
</style>

<!-- Products Section -->
<section class="products-section">
    <div class="products-header">
        <h2>Featured Products</h2>
        <a href="{{ route('product.show') }}" class="view-all-btn">View All</a>
    </div>

    <div class="products-slider owl-carousel owl-theme">
        @forelse ($product_featured as $product)
            @php
                $data = calculateDiscount($product->id);

                $summary = getProductReviewsSummary($product->id);
                $average_rating = $summary['average_rating'];
                $total_ratings = $summary['total_ratings'] ?? 0;
            @endphp
            <div class="item">
                <div class="product-card" data-product-slug="{{ $product->slug }}">
                    <div class="product-image-wrapper">
                        <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name_en }}" />
                        @if ($data['text'])
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

                        <div class="featured-product-price">
                            <span class="current-price">{{ $data['discount'] }} TK</span>
                            @if ($product->regular_price != $data['discount'])
                                <span class="original-price">{{ $product->regular_price }} TK</span>
                            @endif
                        </div>

                        @if ($product->stock_qty > 0)
                            @if (Auth::check() && Auth::user()->role == '5')
                                <button onclick="wholesellerAlert()" class="add-to-cart">
                                    {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                </button>
                            @else
                                @if ($product->is_varient == 1)
                                    <button onclick="productView({{ $product->id }})" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal" class="add-to-cart">
                                        {{ session()->get('language') == 'bangla' ? 'কার্টে যোগ করুন' : 'Add to Cart' }}
                                    </button>
                                @else
                                    <button onclick="addToCartDirect({{ $product->id }})" class="add-to-cart">
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
                            <button class="out-of-stock" disabled>
                                {{ session()->get('language') == 'bangla' ? 'স্টক আউট' : 'Out of Stock' }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p style="text-align: center; padding: 20px;">No featured products available</p>
        @endforelse
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $(".products-slider").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navText: ['<span class="fas fa-chevron-left"></span>',
                '<span class="fas fa-chevron-right"></span>'
            ],
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

        // Navigate to product details on card click
        $('.product-card').on('click', function(e) {
            if (!$(e.target).closest('.add-to-cart, .out-of-stock').length) {
                const productSlug = $(this).data('product-slug');
                if (productSlug) {
                    window.location.href = '/product-details/' + productSlug;
                }
            }
        });
    });
</script>

<script>
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
