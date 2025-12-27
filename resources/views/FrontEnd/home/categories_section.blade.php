<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<style>
  /* Top Categories Section */
  .top-categories-section {
    padding: 15px;
    background-color: white;
    border-radius: 8px;
    margin-bottom: 20px;
    max-width: 100%;
  }

  .categories-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding: 0 10px;
    flex-wrap: wrap;
    gap: 15px;
  }

  .categories-header h2 {
    font-size: 32px;
    font-weight: 600;
    color: #003E32;
    margin: 0;
  }

  .categories-header p {
    font-size: 14px;
    color: #666;
    margin: 0;
  }

  .categories-header-left {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .view-all-btn {
    background-color: #003E32 !important;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    text-decoration: none;
  }

  .view-all-btn:hover {
    background-color: #e55b00;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
  }

  .categories-slider {
    position: relative;
  }

  .category-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
    margin: 10px 5px;
    outline: none;
    text-align: center;
    padding: 10px;
  }

  .category-card:hover {
    transform: translateY(-5px);
  }

  .category-card img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #003E32;
  }

  .category-card h3 {
    font-size: 14px;
    font-weight: bold;
    color: #003E32;
    padding: 8px 5px;
    margin: 0;
    word-break: break-word;
  }

  /* Owl Carousel Customization */
  .owl-carousel .owl-nav button.owl-prev,
  .owl-carousel .owl-nav button.owl-next {
    background-color: rgba(255, 98, 0, 0.7) !important;
    border-radius: 50%;
    width: 50px !important;
    height: 50px !important;
    display: flex !important;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .owl-carousel .owl-nav button.owl-prev:hover,
  .owl-carousel .owl-nav button.owl-next:hover {
    background-color: #003E32 !important;
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

  @media (max-width: 768px) {
    .categories-header {
      flex-direction: column;
      gap: 15px;
      text-align: center;
    }

    .categories-header h2 {
      font-size: 28px;
    }

    .view-all-btn {
      padding: 10px 25px;
      font-size: 14px;
    }

    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
      width: 35px !important;
      height: 35px !important;
    }

    .category-card img {
      height: 100px;
      width: 100px;
    }

    .category-card h3 {
      font-size: 16px;
      padding: 12px;
    }

    .top-categories-section {
      padding: 5px;
    }
  }

  @media (max-width: 480px) {
    .categories-header h2 {
      font-size: 24px;
    }

    .categories-header p {
      font-size: 14px;
    }

    .view-all-btn {
      width: 100%;
      padding: 12px 20px;
    }

    .category-card h3 {
      font-size: 12px;
    }

    .top-categories-section {
      padding: 0;
    }
  }
</style>

<!-- Top Categories Section -->
<section class="top-categories-section">
  <div class="categories-header">
    <div class="categories-header-left">
      <h2>
        @if (session()->get('language') == 'bangla')
          ক্যাটাগোরি
        @else
          Categories
        @endif
      </h2>
      <p>
        @if (session()->get('language') == 'bangla')
          আমাদের জনপ্রিয় ক্যাটাগরি অন্বেষণ করুন
        @else
          Explore our most popular categories
        @endif
      </p>
    </div>
    <a href="{{ route('category_list.index') }}" class="view-all-btn">View All</a>
  </div>
  <div class="categories-slider owl-carousel owl-theme">
    @foreach ($featured_category as $category)
      <div class="item">
        <a href="{{ route('product.category', $category->slug) }}" class="category-card">
          <img src="{{ asset($category->image) }}" alt="{{ $category->name_en }}" />
          <h3>
            @if (session()->get('language') == 'bangla')
              {{ $category->name_bn }}
            @else
              {{ $category->name_en }}
            @endif
          </h3>
        </a>
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
      margin: 10,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      navText: ['<span class="fas fa-chevron-left"></span>', '<span class="fas fa-chevron-right"></span>'],
      responsive: {
        0: {
          items: 2
        },
        480: {
          items: 3
        },
        768: {
          items: 3
        },
        1024: {
          items: 4
        },
        1200: {
          items: 6
        }
      }
    });
  });
</script>