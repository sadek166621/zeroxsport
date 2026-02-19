<style>
    .about-section {
        padding: 40px 0;
    }
    
    .about-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .about-header h2 {
        font-size: 32px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    
    .about-header p {
        font-size: 16px;
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .brand-showcase {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
        color: white;
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .brand-initial {
        font-size: 60px;
        font-weight: 900;
        margin-bottom: 15px;
    }
    
    .brand-name {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .brand-tagline {
        font-size: 18px;
        opacity: 0.9;
    }
    
    .mission-statement {
        background: var(--bg-light);
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 40px;
        font-size: 18px;
        line-height: 1.8;
        color: var(--text-dark);
        border-left: 5px solid var(--primary-color);
    }
    
    .mission-statement a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }
    
    .mission-statement a:hover {
        text-decoration: underline;
    }
    
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    
    .feature-item {
        background: white;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
    }
    
    .feature-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(237, 28, 36, 0.1);
        border-color: var(--primary-color);
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 15px;
    }
    
    .feature-item h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
    }
    
    .feature-item p {
        font-size: 14px;
        color: var(--text-light);
        line-height: 1.6;
    }
    
    .commitment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .commitment-item {
        text-align: center;
        padding: 20px;
    }
    
    .commitment-icon {
        width: 60px;
        height: 60px;
        background: var(--bg-light);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto 15px;
        transition: all 0.3s ease;
    }
    
    .commitment-item:hover .commitment-icon {
        background: var(--primary-color);
        color: white;
    }
    
    .commitment-item h4 {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }
    
    .commitment-item p {
        font-size: 13px;
        color: var(--text-light);
        line-height: 1.5;
    }
    
    .policy-link {
        text-align: center;
    }
    
    .policy-link a {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 12px 35px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .policy-link a:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(237, 28, 36, 0.3);
    }
    
    @media (max-width: 768px) {
        .about-header h2 {
            font-size: 26px;
        }
        
        .brand-name {
            font-size: 28px;
        }
        
        .mission-statement {
            font-size: 16px;
        }
        
        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .commitment-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }
    
    @media (max-width: 480px) {
        .feature-grid {
            grid-template-columns: 1fr;
        }
        
        .commitment-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="about-section">
    <div class="container">
        <div class="about-header">
            <h2>About {{ get_setting('site_name')->value ?? 'Us' }}</h2>
            <p>Your trusted partner for premium shopping experience with exceptional quality and service</p>
        </div>
        
        <!-- Brand Showcase -->
        <div class="brand-showcase">
            <div class="brand-initial">{{ substr(get_setting('site_name')->value ?? 'D', 0, 1) }}</div>
            <h3 class="brand-name">{{ get_setting('site_name')->value ?? 'DhakaStore' }}</h3>
            <p class="brand-tagline">Redefining Your Shopping Experience</p>
        </div>
        
        <!-- Mission Statement -->
        <!--<div class="mission-statement">-->
        <!--    <i class="fas fa-quote-left" style="color: var(--primary-color); opacity: 0.3; font-size: 40px; margin-right: 10px;"></i>-->
        <!--    Empowering customers with premium products, exceptional service, and innovative shopping solutions.-->
        <!--    Explore our wide range of categories including-->
        <!--    @foreach($featured_category as $key => $fc)-->
        <!--        @if($key < 5)-->
        <!--            <a href="{{ route('product.category', $fc->slug) }}">-->
        <!--                {{ $fc->name_en }}@if($key < 4), @endif-->
        <!--            </a>-->
        <!--        @endif-->
        <!--    @endforeach-->
        <!--</div>-->
        
        <!-- Features -->
        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-percent"></i>
                </div>
                <h3>Flexible Payment</h3>
                <p>EMI with 0% interest available on selected products for your convenience</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Warranty Assured</h3>
                <p>Every product backed by official warranty and genuine product guarantee</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <h3>Easy Returns</h3>
                <p>Hassle-free 3-day return policy with fast refund processing</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3>Fast Delivery</h3>
                <p>Express shipping options with real-time tracking</p>
            </div>
        </div>
        
        <!-- Commitments -->
        <div class="commitment-grid">
            <div class="commitment-item">
                <div class="commitment-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h4>100% Authentic</h4>
                <p>We guarantee genuine products with official verification</p>
            </div>
            <div class="commitment-item">
                <div class="commitment-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h4>Secure Payment</h4>
                <p>Encrypted transactions with buyer protection</p>
            </div>
            <div class="commitment-item">
                <div class="commitment-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h4>Best Prices</h4>
                <p>Competitive prices with exclusive deals</p>
            </div>
            <div class="commitment-item">
                <div class="commitment-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>24/7 Support</h4>
                <p>Round-the-clock customer support for any assistance</p>
            </div>
        </div>
        
        <!--<div class="policy-link">-->
        <!--    <a href="{{ route('page.policy') }}">Learn More About Our Policies</a>-->
        <!--</div>-->
    </div>
</section>