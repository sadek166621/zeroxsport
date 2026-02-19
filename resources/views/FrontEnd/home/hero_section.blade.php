<style>
    .hero-wrapper {
        margin-bottom: 40px;
        width: 100%;
    }
    
    .hero-grid {
        width: 100%;
    }
    
    /* Main Slider - Full Size */
    .hero-slider {
        position: relative;
        width: 100%;
        height: 500px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.6s ease;
    }
    
    .slide.active {
        opacity: 1;
    }
    
    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Slider Navigation */
    .slider-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 10;
    }
    
    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        background: var(--primary-color);
        width: 30px;
        border-radius: 6px;
    }
    
    .dot:hover {
        background: white;
    }
    
    /* Slider Arrows */
    .slider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(237, 28, 36, 0.8);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 24px;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .slider-arrow:hover {
        background: var(--primary-color);
        transform: translateY(-50%) scale(1.1);
    }
    
    .prev-arrow {
        left: 20px;
    }
    
    .next-arrow {
        right: 20px;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .hero-slider {
            height: 450px;
        }
    }
    
    @media (max-width: 992px) {
        .hero-slider {
            height: 400px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-slider {
            height: 300px;
            border-radius: 8px;
        }
        
        .slider-arrow {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
        
        .prev-arrow {
            left: 10px;
        }
        
        .next-arrow {
            right: 10px;
        }
        
        .dot {
            width: 10px;
            height: 10px;
        }
        
        .dot.active {
            width: 24px;
        }
    }
    
    @media (max-width: 480px) {
        .hero-slider {
            height: 200px;
        }
        
        .slider-arrow {
            width: 35px;
            height: 35px;
            font-size: 18px;
        }
        
        .prev-arrow {
            left: 8px;
        }
        
        .next-arrow {
            right: 8px;
        }
        
        .slider-dots {
            bottom: 10px;
        }
        
        .dot {
            width: 8px;
            height: 8px;
        }
        
        .dot.active {
            width: 20px;
        }
    }
    
    @media (max-width: 320px) {
        .hero-slider {
            height: 150px;
        }
        
        .slider-arrow {
            width: 30px;
            height: 30px;
            font-size: 16px;
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

<div class="hero-wrapper">
    <div class="hero-grid">
        <!-- Full Size Slider -->
        <div class="hero-slider" id="heroSlider">
            @foreach($sliders as $index => $slider)
            <div class="slide {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset($slider->slider_img) }}" alt="Slide {{ $index + 1 }}">
            </div>
            @endforeach
            
            <!-- Slider Arrows -->
            <button class="slider-arrow prev-arrow" onclick="changeSlide(-1)">‹</button>
            <button class="slider-arrow next-arrow" onclick="changeSlide(1)">›</button>
            
            <!-- Slider Dots -->
            <div class="slider-dots">
                @foreach($sliders as $index => $slider)
                <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="currentSlide({{ $index }})"></span>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    let currentSlideIndex = 0;
    let autoSlideTimer;
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    function showSlide(n) {
        if (n >= slides.length) currentSlideIndex = 0;
        if (n < 0) currentSlideIndex = slides.length - 1;

        slides.forEach(slide => slide.classList.remove("active"));
        dots.forEach(dot => dot.classList.remove("active"));

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

    // Initialize
    showSlide(currentSlideIndex);
    startAutoSlide();

    // Pause auto-slide on hover
    const slider = document.getElementById('heroSlider');
    slider.addEventListener('mouseenter', () => {
        clearTimeout(autoSlideTimer);
    });
    
    slider.addEventListener('mouseleave', () => {
        startAutoSlide();
    });
</script>