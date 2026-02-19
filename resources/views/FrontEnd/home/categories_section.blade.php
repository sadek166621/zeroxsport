<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<style>
    .categories-section {
        margin-bottom: 40px;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .section-title {
        font-size: 26px;
        font-weight: 600;
        color: #242424;
        margin: 0;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: #ed1c24;
    }
    
    .view-all-btn {
        background: transparent;
        color: #242424;
        border: 2px solid #e5e5e5;
        padding: 10px 25px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .view-all-btn:hover {
        background: #ed1c24;
        border-color: #ed1c24;
        color: white;
        transform: translateY(-2px);
    }
    
    .category-item {
        margin: 10px 5px;
        text-align: center;
    }
    
    .category-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e5e5e5;
        cursor: pointer;
        text-decoration: none;
        display: block;
        width: 100%;
        aspect-ratio: 1 / 1;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(237, 28, 36, 0.1);
        border-color: #ed1c24;
    }
    
    .category-image {
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .category-card:hover .category-image img {
        transform: scale(1.1);
    }
    
    .category-name {
        font-size: 16px;
        font-weight: 600;
        color: #242424;
        margin: 12px 0 5px 0;
        text-transform: uppercase;
        text-decoration: none;
        display: block;
    }
    
    .category-name:hover {
        color: #ed1c24;
    }
    
    .category-count {
        font-size: 14px;
        color: #ed1c24;
        font-weight: 500;
        display: block;
        margin-bottom: 5px;
    }
    
    /* Owl Carousel Customization */
    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
        background: #ed1c24 !important;
        color: white !important;
        width: 40px;
        height: 40px;
        border-radius: 50% !important;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(237, 28, 36, 0.3);
    }
    
    .owl-carousel .owl-nav button.owl-prev:hover,
    .owl-carousel .owl-nav button.owl-next:hover {
        background: #c9171e !important;
        transform: scale(1.1);
    }
    
    .owl-carousel .owl-nav button span {
        font-size: 24px;
        line-height: 1;
    }
    
    .owl-carousel .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        pointer-events: none;
    }
    
    .owl-carousel .owl-nav button {
        position: absolute;
        pointer-events: all;
    }
    
    .owl-carousel .owl-nav button.owl-prev {
        left: -20px;
    }
    
    .owl-carousel .owl-nav button.owl-next {
        right: -20px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .view-all-btn {
            width: 100%;
            text-align: center;
        }
        
        .owl-carousel .owl-nav {
            display: none;
        }
        
        .category-name {
            font-size: 14px;
            margin-top: 10px;
        }
        
        .category-count {
            font-size: 12px;
        }
    }
    
    @media (max-width: 480px) {
        .category-name {
            font-size: 13px;
            margin-top: 8px;
        }
    }
</style>

<section class="categories-section">
    <div class="section-header">
        <h2 class="section-title">Shop By Collection</h2>
        <a href="{{ route('category_list.index') }}" class="view-all-btn">View All</a>
    </div>
    
    <div class="categories-slider owl-carousel owl-theme">
        @foreach($featured_category as $category)
        <div class="category-item">
            <a href="{{ route('product.category', $category->slug) }}" class="category-card">
                <div class="category-image">
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name_en }}">
                </div>
            </a>
            <a href="{{ route('product.category', $category->slug) }}" class="category-name">
                {{ session()->get('language') == 'bangla' ? $category->name_bn : $category->name_en }}
            </a>
            <!-- <span class="category-count">({{ $category->products_count ?? 0 }} items)</span> -->
        </div>
        @endforeach
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $(".categories-slider").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            navText: ['‹', '›'],
            responsive: {
                0: { 
                    items: 2,
                    margin: 10
                },
                480: { 
                    items: 3,
                    margin: 15
                },
                768: { 
                    items: 4,
                    margin: 20
                },
                992: { 
                    items: 5,
                    margin: 20
                },
                1200: { 
                    items: 5,
                    margin: 20
                }
            }
        });
    });
</script>