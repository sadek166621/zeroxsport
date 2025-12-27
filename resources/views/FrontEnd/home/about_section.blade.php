<style>
    .about-section {
        padding: 15px;
    }

    .overview-card {
        background: #ffffff;
        padding: 20px;
        text-align: center;
        border-radius: 15px;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
    }

    .brand-badge {
        width: 60px;
        height: 60px;
        background: #003E32;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    .company-initial {
        color: white;
        font-size: 28px;
        font-weight: 700;
    }

    .company-title {
        font-size: 22px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }

    .company-subtitle {
        font-size: 14px;
        color: #666;
    }

    .mission-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        position: relative;
    }

    .quote-mark {
        position: absolute;
        top: 10px;
        left: 15px;
        font-size: 40px;
        color: #003E32;
        opacity: 0.2;
        font-family: Georgia, serif;
    }

    .mission-text {
        font-size: 14px;
        line-height: 1.6;
        color: #444;
        position: relative;
        z-index: 1;
    }

    .feature-box {
        background: white;
        padding: 20px;
        border-radius: 12px;
        height: 100%;
        transition: transform 0.3s;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
    }

    .feature-box:hover {
        transform: translateY(-3px);
    }

    .feature-icon {
        font-size: 28px;
        color: #003E32;
        margin-bottom: 15px;
    }

    .feature-content h3 {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    .feature-content p {
        color: #666;
        line-height: 1.5;
        font-size: 13px;
    }

    .policy-card {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
    }

    .policy-card h3 {
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        font-size: 18px;
    }

    .policy-points {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 20px;
    }

    .policy-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .policy-item i {
        color: #003E32;
        font-size: 16px;
    }

    .policy-item span {
        color: #444;
        font-size: 13px;
    }

    .policy-link {
        display: block;
        text-align: center;
        color: #003E32;
        text-decoration: none;
        font-weight: 600;
        margin-top: 15px;
        font-size: 13px;
    }

    .policy-link:hover {
        text-decoration: underline;
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
        .about-section {
            padding: 18px;
        }

        .overview-card {
            padding: 30px;
        }

        .brand-badge {
            width: 70px;
            height: 70px;
        }

        .company-initial {
            font-size: 35px;
        }

        .company-title {
            font-size: 26px;
        }

        .company-subtitle {
            font-size: 16px;
        }

        .mission-card {
            padding: 30px;
        }

        .mission-text {
            font-size: 16px;
        }

        .feature-box {
            padding: 25px;
        }

        .feature-icon {
            font-size: 32px;
        }

        .feature-content h3 {
            font-size: 18px;
        }

        .feature-content p {
            font-size: 14px;
        }

        .policy-card {
            padding: 30px;
        }

        .policy-card h3 {
            font-size: 20px;
        }

        .policy-points {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .policy-item span {
            font-size: 14px;
        }
    }

    /* Tablets (768px and up) */
    @media (min-width: 768px) {
        .about-section {
            padding: 20px;
        }

        .overview-card {
            padding: 40px;
        }

        .brand-badge {
            width: 80px;
            height: 80px;
        }

        .company-initial {
            font-size: 40px;
        }

        .company-title {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .company-subtitle {
            font-size: 18px;
        }

        .mission-card {
            padding: 40px;
        }

        .quote-mark {
            top: 20px;
            left: 20px;
            font-size: 60px;
        }

        .mission-text {
            font-size: 18px;
            line-height: 1.8;
        }

        .feature-box {
            padding: 30px;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .feature-content h3 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .feature-content p {
            font-size: 15px;
            line-height: 1.6;
        }

        .policy-card {
            padding: 40px;
        }

        .policy-card h3 {
            font-size: 22px;
            margin-bottom: 30px;
        }

        .policy-points {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .policy-item span {
            font-size: 15px;
        }

        .policy-link {
            margin-top: 20px;
            font-size: 15px;
        }
    }
</style>

<section class="my-5">
    <div class="about-section">
        <div class="row mb-4">
            <div class="col-12">
                <div class="overview-card">
                    <div class="brand-badge">
                        <span class="company-initial">{{ substr(get_setting('site_name')->value ?? 'D', 0, 1) }}</span>
                    </div>
                    <h1 class="company-title">{{ get_setting('site_name')->value ?? '' }}</h1>
                    <p class="company-subtitle">Redefining Your Shopping Experience</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="mission-card">
                    <div class="quote-mark">"</div>
                    <p class="mission-text">
                        Empowering customers with premium products, exceptional service, and innovative shopping solutions.
                        Explore our wide range of categories including
                        @foreach ($featured_category as $key => $fc)
                        @php
                        if ($key == 5) {
                        break;
                        }
                        @endphp
                        <a href="{{ route('product.category', $fc->slug) }}" class="category-link">
                            {{ $fc->name_en }}@if ($key < 4), @endif
                                </a>
                                @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="row features-row">
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-percent"></i>
                    </div>
                    <div class="feature-content">
                        <h3>EMI Available</h3>
                        <p>Flexible payment options with 0% interest installment plans available on selected products</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Warranty Assured</h3>
                        <p>Every product comes with official warranty coverage and genuine product guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-undo-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Easy Returns</h3>
                        <p>Hassle-free 3-day return policy with quick refund processing</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="policy-card">
                    <h3>Our Commitment</h3>
                    <div class="policy-points">
                        <div class="policy-item">
                            <i class="fas fa-check-circle"></i>
                            <span>100% Authentic Products</span>
                        </div>
                        <div class="policy-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Secure Payment Options</span>
                        </div>
                        <div class="policy-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Express Delivery</span>
                        </div>
                        <div class="policy-item">
                            <i class="fas fa-check-circle"></i>
                            <span>24/7 Customer Support</span>
                        </div>
                    </div>
                    <a href="#" class="policy-link">Learn More About Our Policies</a>
                </div>
            </div>
        </div>
    </div>
</section>