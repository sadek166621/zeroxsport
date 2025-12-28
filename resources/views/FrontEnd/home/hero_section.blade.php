<style>
    /* Hero Slider Section */
    .hero {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
        background: #000;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.6s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slide.active {
        opacity: 1;
    }

    .slide-bg {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 1;
    }

    .slide-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Banner Section */
    .banner-section {
        width: 100%;
        margin: 30px 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .banner-section img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .banner-section img:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(255, 98, 0, 0.2);
    }

    /* Slider Navigation */
    .slider-nav {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        gap: 15px;#003E32
    }

    .dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.4s ease;
        border: 2px solid transparent;
    }

    .dot.active {
        background-color: #003E32;
        width: 36px;
        border-radius: 7px;
        box-shadow: 0 0 10px rgba(255, 98, 0, 0.6);
    }

    .dot:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }

    /* Slider Arrow Controls */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: #003E32;
        color: white;
        border: none;
        font-size: 28px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slider-arrow:hover {
        background-color: rgba(255, 98, 0, 0.8);
    }

    .prev {
        left: 20px;
    }

    .next {
        right: 20px;
    }

    @media (max-width: 1024px) {
        .hero {
            height: 300px;
        }

        .banner-section {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
    }

    @media (max-width: 768px) {
        .hero {
            height: 250px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .slider-arrow {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .slider-nav {
            bottom: 15px;
            gap: 10px;
        }

        .dot {
            width: 10px;
            height: 10px;
        }

        .dot.active {
            width: 28px;
        }

        .banner-section {
            grid-template-columns: 1fr;
            gap: 12px;
            margin: 15px 0;
        }
    }

    @media (max-width: 520px) {
        .hero {
            height: 200px;
            border-radius: 4px;
            margin-bottom: 12px;
        }

        .slider-arrow {
            width: 35px;
            height: 35px;
            font-size: 18px;
        }

        .prev {
            left: 8px;
        }

        .next {
            right: 8px;
        }

        .slider-nav {
            bottom: 12px;
            gap: 8px;
        }

        .dot {
            width: 8px;
            height: 8px;
        }

        .dot.active {
            width: 24px;
        }

        .banner-section {
            display: none;
        }
    }

    @media (max-width: 375px) {
        .hero {
            height: 180px;
            margin-bottom: 10px;
        }

        .slider-arrow {
            width: 30px;
            height: 30px;
            font-size: 16px;
        }

        .prev {
            left: 5px;
        }

        .next {
            right: 5px;
        }

        .slider-nav {
            bottom: 10px;
            gap: 6px;
        }

        .dot {
            width: 7px;
            height: 7px;
        }

        .dot.active {
            width: 20px;
        }
    }

    @media (max-width: 320px) {
        .hero {
            height: 150px;
            margin-bottom: 8px;
        }

        .slider-arrow {
            width: 28px;
            height: 28px;
            font-size: 14px;
        }

        .slider-nav {
            bottom: 8px;
            gap: 5px;
        }

        .dot {
            width: 6px;
            height: 6px;
        }

        .dot.active {
            width: 18px;
        }
    }
</style>

<section class="mb-4">
    <section class="hero">
        <div class="slider-container">
            @foreach ($sliders as $index => $slider)
            <div class="slide {{ $index === 0 ? 'active' : '' }}">
                <div class="slide-bg">
                    <img src="{{ asset($slider->slider_img) }}" alt="Slider {{ $index + 1 }}" />
                </div>
            </div>
            @endforeach
        </div>

        <!-- Navigation Dots -->
        <!-- <div class="slider-nav">
            @foreach ($sliders as $index => $slider)
            <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="currentSlide({{ $index }})"></span>
            @endforeach
        </div> -->

        <!-- Arrow Controls -->
        <button class="slider-arrow prev" onclick="changeSlide(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-arrow next" onclick="changeSlide(1)">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>

    <section class="banner-section">
        @foreach ($home_banners as $banner)
        <img src="{{ asset($banner->banner_img) }}" alt="Banner Image" />
        @endforeach
    </section>
</section>

<script>
    let currentSlideIndex = 0;
    let autoSlideTimer;

    function showSlide(n) {
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");

        if (n >= slides.length) {
            currentSlideIndex = 0;
        }
        if (n < 0) {
            currentSlideIndex = slides.length - 1;
        }

        slides.forEach((slide) => slide.classList.remove("active"));
        dots.forEach((dot) => dot.classList.remove("active"));

        slides[currentSlideIndex].classList.add("active");
        dots[currentSlideIndex].classList.add("active");
    }

    function changeSlide(n) {
        clearTimeout(autoSlideTimer);
        currentSlideIndex += n;
        showSlide(currentSlideIndex);
        startAutoSlide();
    }

    function currentSlide(n) {
        clearTimeout(autoSlideTimer);
        currentSlideIndex = n;
        showSlide(currentSlideIndex);
        startAutoSlide();
    }

    function autoSlide() {
        currentSlideIndex++;
        showSlide(currentSlideIndex);
        startAutoSlide();
    }

    function startAutoSlide() {
        autoSlideTimer = setTimeout(autoSlide, 5000);
    }

    showSlide(currentSlideIndex);
    startAutoSlide();
</script>