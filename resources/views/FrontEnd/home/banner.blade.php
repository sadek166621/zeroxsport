
    <style>

      .banner-container {
        position: relative;
        width: 100%;
        height: 450px;
        overflow: hidden;
        max-width: 1500px;
        margin: 0 auto;
      }

      .banner-slider {
        height: 100%;
      }

      .banner-slide {
        height: 450px;
        position: relative;
      }

      .banner-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .banner-gradient {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: linear-gradient(to bottom, transparent, #eaeded);
        pointer-events: none;
        z-index: 5;
      }

      /* Custom Slick Arrow Styles */
      .slick-prev,
      .slick-next {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.7) !important;
        border-radius: 50%;
        z-index: 10;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        opacity: 0;
        visibility: hidden;
      }

      .slick-prev:before,
      .slick-next:before {
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: #333;
        font-size: 20px;
        opacity: 1;
      }

      .slick-prev:before {
        content: "\f053";
      }

      .slick-next:before {
        content: "\f054";
      }

      .slick-prev:hover,
      .slick-next:hover {
        background-color: rgba(255, 255, 255, 0.9) !important;
        /* transform: scale(1.1); */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
      }

      .slick-prev:active,
      .slick-next:active {
        transform: scale(0.95);
      }

      .slick-prev {
        left: 20px;
      }

      .slick-next {
        right: 20px;
      }

      /* Show buttons on hover */
      .banner-container:hover .slick-prev,
      .banner-container:hover .slick-next {
        opacity: 1;
        visibility: visible;
      }

      /* Custom Slick Dots */
      .slick-dots {
        bottom: 10px;
        z-index: 10;
      }

      .slick-dots li {
        width: 12px;
        height: 12px;
        margin: 0 4px;
      }

      .slick-dots li button {
        width: 12px;
        height: 12px;
        padding: 0;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: 2px solid transparent;
        transition: all 0.3s ease;
      }

      .slick-dots li button:before {
        display: none;
      }

      .slick-dots li button:hover {
        background-color: rgba(255, 255, 255, 0.8);
        transform: scale(1.1);
      }

      .slick-dots li.slick-active button {
        background-color: rgba(255, 255, 255, 1);
        width: 16px;
        border-radius: 8px;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .banner-container {
          height: 400px;
        }

        .banner-slide {
          height: 400px;
        }

        .slick-prev,
        .slick-next {
          width: 40px;
          height: 40px;
          opacity: 0.8;
          visibility: visible;
        }

        .slick-prev:before,
        .slick-next:before {
          font-size: 16px;
        }

        .slick-prev:hover,
        .slick-next:hover {
          opacity: 1;
        }

        .banner-gradient {
          height: 150px;
        }

        .slick-dots {
          bottom: 60px;
        }
      }

      @media (max-width: 480px) {
        .banner-container {
          height: 300px;
        }

        .banner-slide {
          height: 300px;
        }

        .slick-prev,
        .slick-next {
          width: 35px;
          height: 35px;
          opacity: 0.7;
        }

        .slick-prev:before,
        .slick-next:before {
          font-size: 14px;
        }

        .slick-prev {
          left: 10px;
        }

        .slick-next {
          right: 10px;
        }

        .banner-gradient {
          height: 100px;
        }

        .slick-dots {
          bottom: 40px;
        }

        .slick-dots li {
          width: 10px;
          height: 10px;
          margin: 0 3px;
        }

        .slick-dots li button {
          width: 10px;
          height: 10px;
        }

        .slick-dots li.slick-active button {
          width: 14px;
        }
      }
    </style>


    <div class="banner-container">
      <div class="banner-slider">
        <div class="banner-slide">
          <img
            src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?w=1600&h=600&fit=crop"
            alt="Banner 1"
          />
        </div>
        <div class="banner-slide">
          <img
            src="https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=1600&h=600&fit=crop"
            alt="Banner 2"
          />
        </div>
        <div class="banner-slide">
          <img
            src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=1600&h=600&fit=crop"
            alt="Banner 3"
          />
        </div>
        <div class="banner-slide">
          <img
            src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=1600&h=600&fit=crop"
            alt="Banner 4"
          />
        </div>
        <div class="banner-slide">
          <img
            src="https://images.unsplash.com/photo-1560343090-f0409e92791a?w=1600&h=600&fit=crop"
            alt="Banner 5"
          />
        </div>
      </div>
      <div class="banner-gradient"></div>
    </div>

    <!-- script in master blade -->
  
