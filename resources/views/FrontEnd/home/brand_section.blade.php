<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<style>
  /* Popular Brands Section */
  .popular-brands-section {
    padding: 10px;
    background-color: white;
    border-radius: 8px;
    margin-bottom: 20px;
    max-width: 1400px;
  }

  .brands-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 0 10px;
  }

  .brands-header h2 {
    font-size: 32px;
    color: #003E32;
    margin: 0;
  }

  .brands-header p {
    font-size: 14px;
    color: #666;
    margin: 0;
  }

  .brands-header-left {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .view-all-brands-btn {
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

  .view-all-brands-btn:hover {
    background-color: #e55b00;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 98, 0, 0.3);
  }

  .brands-slider {
    position: relative;
  }

  .brand-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
    margin: 10px;
    outline: none;
    text-align: center;
  }

  .brand-card:hover {
    transform: translateY(-5px);
  }

  .brand-card img {
    width: 120px;
    height: 120px;
    object-fit: contain;
    border-radius: 12px;
    border: 2px solid #003E32;
    padding: 10px;
    background-color: white;
  }

  .brand-card h3 {
    font-size: 14px;
    font-weight: bold;
    color: #003E32;
    padding: 5px;
    margin: 0;
    text-decoration: none;
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
    bottom: 50%;
    pointer-events: all;
  }

  .owl-carousel .owl-nav button.owl-next {
    position: absolute;
    right: 0;
    bottom: 50%;
    pointer-events: all;
  }

  @media (max-width: 768px) {
    .brands-header {
      flex-direction: column;
      gap: 15px;
      text-align: center;
    }

    .brands-header h2 {
      font-size: 28px;
    }

    .view-all-brands-btn {
      padding: 10px 25px;
      font-size: 14px;
    }

    .owl-carousel .owl-nav button.owl-prev,
    .owl-carousel .owl-nav button.owl-next {
      width: 35px !important;
      height: 35px !important;
    }

    .brand-card img {
      height: 100px;
      width: 100px;
    }

    .brand-card h3 {
      font-size: 16px;
      padding: 12px;
    }

    .popular-brands-section {
      padding: 5px;
    }
  }

  @media (max-width: 480px) {
    .brands-header h2 {
      font-size: 24px;
    }

    .brands-header p {
      font-size: 14px;
    }

    .view-all-brands-btn {
      width: 100%;
      padding: 12px 20px;
    }

    .brand-card h3 {
      font-size: 14px;
    }

    .popular-brands-section {
      padding: 0;
    }
  }
</style>

<!-- Popular Brands Section -->
<section class="popular-brands-section">
  <div class="brands-header">
    <div class="brands-header-left">
      <h2>Popular Brands</h2>
      <p>Shop from trusted brands</p>
    </div>
    <a href="{{ route('product.show') }}" class="view-all-brands-btn">View All</a>
  </div>
  <div class="brands-slider owl-carousel owl-theme">
    @forelse ($brands as $brand)
      @if ($brand->name_en != 'Non Brand')
        <div class="item">
          <a href="#" class="brand-card">
            <img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->name_en }}" />
            <h3>
              @if (session()->get('language') == 'bangla')
                {{ $brand->name_bn }}
              @else
                {{ $brand->name_en }}
              @endif
            </h3>
          </a>
        </div>
      @endif
    @empty
      <p style="text-align: center; padding: 20px;">No brands available</p>
    @endforelse
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function() {
    $(".brands-slider").owlCarousel({
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