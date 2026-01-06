@extends('FrontEnd.master')
@section('title')
About Us
@endsection
@section('content')

<style>
    :root {
        --primary-color: #036243;
        --primary-dark: #024a33;
        --primary-light: #048554;
    }

    .hero-banner {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        padding: 40px 0 60px;
        position: relative;
        overflow: hidden;
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin-bottom: 20px;
    }

    .breadcrumb-custom a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s;
    }

    .breadcrumb-custom a:hover {
        color: #fff;
    }

    .breadcrumb-custom span {
        color: #fff;
        font-weight: 500;
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s;
    }

    .stats-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-5px);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
    }

    .stats-label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
    }

    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 15px;
        font-weight: 600;
    }

    /* .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-color);
    } */

    .about-image-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(3, 98, 67, 0.2);
    }

    .about-image-wrapper::before {
        content: '';
        position: absolute;
        top: -20px;
        right: -20px;
        width: 150px;
        height: 150px;
        background: var(--primary-color);
        opacity: 0.1;
        border-radius: 50%;
        z-index: -1;
    }

    .feature-icon-box {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #fff;
        box-shadow: 0 10px 30px rgba(3, 98, 67, 0.3);
        transition: all 0.3s;
    }

    .feature-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        transition: all 0.3s;
        border: 2px solid transparent;
        height: 100%;
    }

    .feature-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(3, 98, 67, 0.15);
    }

    .feature-card:hover .feature-icon-box {
        transform: scale(1.1) rotate(5deg);
    }

    .value-card {
        background: #fff;
        border-radius: 20px;
        padding: 20px 15px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
        transform: scaleX(0);
        transition: transform 0.3s;
    }

    .value-card:hover::before {
        transform: scaleX(1);
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(3, 98, 67, 0.2);
    }

    .value-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(3, 98, 67, 0.1), rgba(3, 98, 67, 0.2));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        color: var(--primary-color);
    }

    .team-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(3, 98, 67, 0.2);
    }

    .team-image {
        position: relative;
        overflow: hidden;
        height: 350px;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .team-card:hover .team-image img {
        transform: scale(1.1);
    }

    .team-social {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        opacity: 0;
        transition: all 0.3s;
    }

    .team-card:hover .team-social {
        opacity: 1;
        bottom: 30px;
    }

    .team-social a {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        transition: all 0.3s;
        text-decoration: none;
    }

    .team-social a:hover {
        background: var(--primary-color);
        color: #fff;
        transform: translateY(-3px);
    }

    .team-info {
        padding: 30px;
        text-align: center;
    }

    .timeline-step {
        position: relative;
        text-align: center;
    }

    .timeline-icon {
        width: 100px;
        height: 100px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 10px 30px rgba(3, 98, 67, 0.2);
        position: relative;
        z-index: 2;
        font-size: 2.5rem;
        color: var(--primary-color);
        transition: all 0.3s;
    }

    .timeline-step:hover .timeline-icon {
        background: var(--primary-color);
        color: #fff;
        transform: scale(1.1);
    }

    .timeline-number {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 35px;
        height: 35px;
        background: var(--primary-color);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 5px 15px rgba(3, 98, 67, 0.3);
    }

    .cta-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: 25px;
        padding: 60px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .btn-custom {
        background: #fff;
        color: var(--primary-color);
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
        border: 2px solid #fff;
    }

    .btn-custom:hover {
        background: transparent;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .hero-banner {
            padding: 20px 0 15px;
        }

        .stats-number {
            font-size: 2rem;
        }

        .cta-section {
            padding: 40px 30px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-banner">
    <div class="custom_container">
        <div class="hero-content">
            <nav class="breadcrumb-custom">
                <a href="{{route('home')}}">Home</a>
                <span class="mx-2">/</span>
                <span>About Us</span>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h1 class="display-4 text-white fw-bold mb-4">
                        Your Trusted Shopping <br>Destination
                    </h1>
                    <p class="lead text-white mb-0" style="opacity: 0.9;">
                        We're dedicated to bringing you quality products, exceptional service,
                        and an unforgettable shopping experience.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-number">10K+</div>
                                <div class="stats-label">Happy Customers</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-number">50K+</div>
                                <div class="stats-label">Products Sold</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-number">4.9★</div>
                                <div class="stats-label">Customer Rating</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-number">24/7</div>
                                <div class="stats-label">Support Available</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Content Section -->
<section class="py-5">
    <div class="custom_container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d"
                        alt="About Us" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-uppercase mb-3" style="color: var(--primary-color); font-weight: 600; letter-spacing: 1px;">
                    About Our Company
                </h6>
                <h2 class="section-title display-5 mb-4">
                    Building Trust Through Excellence
                </h2>
                <p class="text-muted mb-4" style="font-size: 1.1rem; line-height: 1.8;">
                    Since our inception, we've been committed to revolutionizing the online shopping
                    experience. Our platform combines cutting-edge technology with personalized service
                    to deliver products that enhance your lifestyle.
                </p>
                <p class="text-muted mb-4" style="line-height: 1.8;">
                    We carefully curate every product in our collection, ensuring that quality and value
                    are never compromised. Our dedicated team works tirelessly to bring you the latest
                    trends and timeless classics from around the world.
                </p>

                <div class="row g-4 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon-box me-3" style="width: 50px; height: 50px; font-size: 1.3rem;">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Premium Quality</h5>
                                <p class="text-muted mb-0 small">Hand-picked products from trusted brands</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon-box me-3" style="width: 50px; height: 50px; font-size: 1.3rem;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h5 class="mb-2">Secure Shopping</h5>
                                <p class="text-muted mb-0 small">100% secure payment & data protection</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5" style="background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
    <div class="custom_container">
        <div class="text-center mb-2">
            <h6 class="text-uppercase mb-3" style="color: var(--primary-color); font-weight: 600; letter-spacing: 1px;">
                Why Choose Us
            </h6>
            <h2 class="section-title display-5 " style="display: block;">
                What Sets Us Apart
            </h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-box mb-4">
                        <i class="fas fa-truck-fast"></i>
                    </div>
                    <h4 class="mb-3">Fast Delivery</h4>
                    <p class="text-muted mb-0">
                        Swift nationwide shipping with real-time tracking for complete peace of mind.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-box mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="mb-3">24/7 Support</h4>
                    <p class="text-muted mb-0">
                        Round-the-clock customer service team ready to assist with any inquiry.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-box mb-4">
                        <i class="fas fa-rotate-left"></i>
                    </div>
                    <h4 class="mb-3">Easy Returns</h4>
                    <p class="text-muted mb-0">
                        Hassle-free 30-day return policy with no questions asked guarantee.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-box mb-4">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4 class="mb-3">Secure Payment</h4>
                    <p class="text-muted mb-0">
                        SSL encrypted transactions ensuring your financial data stays protected.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="py-5">
    <div class="custom_container">
        <div class="text-center mb-2">
            <h6 class="text-uppercase mb-3" style="color: var(--primary-color); font-weight: 600; letter-spacing: 1px;">
                Our Core Values
            </h6>
            <h2 class="section-title display-5" style="display: block;">
                What We Stand For
            </h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4 class="mb-3">Customer First</h4>
                    <p class="text-muted mb-0">
                        Your satisfaction is our priority. We go above and beyond to ensure
                        every interaction exceeds expectations.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h4 class="mb-3">Quality Excellence</h4>
                    <p class="text-muted mb-0">
                        We never compromise on quality. Each product undergoes rigorous
                        quality checks before reaching you.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="mb-3">Innovation</h4>
                    <p class="text-muted mb-0">
                        Constantly evolving our platform with the latest technology to
                        enhance your shopping experience.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="mb-3">Integrity</h4>
                    <p class="text-muted mb-0">
                        Transparent pricing, honest communication, and ethical business
                        practices in everything we do.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="mb-3">Sustainability</h4>
                    <p class="text-muted mb-0">
                        Committed to eco-friendly practices and partnering with brands
                        that share our environmental values.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="mb-3">Community</h4>
                    <p class="text-muted mb-0">
                        Building a vibrant community of shoppers who trust us for their
                        everyday needs and special occasions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<!-- <section class="py-5" style="background: #f8f9fa;">
    <div class="custom_container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase mb-3" style="color: var(--primary-color); font-weight: 600; letter-spacing: 1px;">
                Meet The Team
            </h6>
            <h2 class="section-title display-5 fw-bold" style="display: block;">
                Leadership That Inspires
            </h2>
            <p class="text-muted mt-3">The passionate minds driving our mission forward</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="John Doe">
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="mb-1">John Doe</h4>
                        <p class="mb-0" style="color: var(--primary-color); font-weight: 500;">
                            Chief Executive Officer
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Sarah Johnson">
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="mb-1">Sarah Johnson</h4>
                        <p class="mb-0" style="color: var(--primary-color); font-weight: 500;">
                            Operations Director
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e" alt="Mike Wilson">
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="mb-1">Mike Wilson</h4>
                        <p class="mb-0" style="color: var(--primary-color); font-weight: 500;">
                            Technology Lead
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Shopping Journey Section -->
<section class="py-5">
    <div class="custom_container">
        <div class="text-center mb-2">
            <h6 class="text-uppercase mb-3" style="color: var(--primary-color); font-weight: 600; letter-spacing: 1px;">
                How It Works
            </h6>
            <h2 class="section-title display-5" style="display: block;">
                Your Shopping Journey
            </h2>
            <p class="text-muted mt-3">Simple, seamless, and secure - shopping made easy</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="timeline-step">
                    <div class="timeline-icon">
                        <i class="fas fa-search"></i>
                        <div class="timeline-number">1</div>
                    </div>
                    <h4 class="mb-3">Explore Products</h4>
                    <p class="text-muted mb-0">
                        Browse through our extensive collection of premium products
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="timeline-step">
                    <div class="timeline-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="timeline-number">2</div>
                    </div>
                    <h4 class="mb-3">Add to Cart</h4>
                    <p class="text-muted mb-0">
                        Select your favorites and add them to your shopping cart
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="timeline-step">
                    <div class="timeline-icon">
                        <i class="fas fa-credit-card"></i>
                        <div class="timeline-number">3</div>
                    </div>
                    <h4 class="mb-3">Secure Checkout</h4>
                    <p class="text-muted mb-0">
                        Complete your purchase with our secure payment gateway
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="timeline-step">
                    <div class="timeline-icon">
                        <i class="fas fa-box-open"></i>
                        <div class="timeline-number">4</div>
                    </div>
                    <h4 class="mb-3">Fast Delivery</h4>
                    <p class="text-muted mb-0">
                        Receive your order quickly with tracked shipping
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 mb-5">
    <div class="custom_container">
        <div class="cta-section">
            <div class="row align-items-center justify-content-between" style="position: relative; z-index: 2;">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-3">Ready to Start Shopping?</h2>
                    <p class="mb-0" style="font-size: 1.1rem; opacity: 0.9;">
                        Join thousands of satisfied customers and discover amazing products at unbeatable prices.
                    </p>
                </div>
                <div class="col-lg-auto text-lg-end">
                    <a href="{{route('home')}}" class="btn-custom">
                        <i class="fas fa-shopping-bag me-2"></i>
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection