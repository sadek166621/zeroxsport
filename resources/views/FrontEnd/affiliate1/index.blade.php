@extends('FrontEnd.master')
@section('content')

{{-- Hide the header --}}
<style>
    .navbar {
        display: none;
    }

    /* ========== CUSTOM HEADER ========== */
    .affiliate-header {
        background: white;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 0;
        z-index: 1000;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        width: 100%;
    }

    .header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 75px;
        gap: 30px;
        position: relative;
    }

    .header-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        font-size: 22px;
        font-weight: 700;
        color: #2d3748;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .header-logo:hover {
        transform: scale(1.05);
    }

    .logo-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(238, 89, 42, 0.3);
    }

    .header-nav {
        display: flex;
        gap: 35px;
        align-items: center;
        flex: 1;
        margin: 0 20px;
    }

    .nav-link {
        color: #718096;
        text-decoration: none;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link:hover {
        color: #EE592A;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: #EE592A;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .header-auth {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-shrink: 0;
    }

    .nav-btn {
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .nav-btn.login {
        color: #718096;
        background: transparent;
        border: 1.5px solid #e2e8f0;
    }

    .nav-btn.login:hover {
        color: #EE592A;
        border-color: #EE592A;
        background: rgba(238, 89, 42, 0.05);
    }

    .nav-btn.register,
    .nav-btn.dashboard {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(238, 89, 42, 0.3);
    }

    .nav-btn.register:hover,
    .nav-btn.dashboard:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(238, 89, 42, 0.4);
    }

    .header-cta {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
        padding: 12px 28px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .header-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(238, 89, 42, 0.3);
    }

    .mobile-menu-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        flex-shrink: 0;
    }

    .mobile-menu-toggle span {
        width: 25px;
        height: 3px;
        background: #2d3748;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(10px, 10px);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -7px);
    }

    .mobile-menu {
        display: none;
        position: fixed;
        top: 75px;
        left: 0;
        right: 0;
        background: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        flex-direction: column;
        padding: 20px;
        gap: 10px;
        z-index: 998;
        max-height: calc(100vh - 75px);
        overflow-y: auto;
        border-top: 1px solid #e2e8f0;
        width: 100%;
    }

    .mobile-menu.active {
        display: flex;
    }

    .mobile-menu .nav-link {
        padding: 12px 15px;
        display: block;
        color: #718096;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .mobile-menu .nav-link:hover {
        background: rgba(238, 89, 42, 0.1);
        color: #EE592A;
    }

    .mobile-menu .nav-link::after {
        display: none;
    }

    .mobile-menu-auth {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid #e2e8f0;
        margin-top: 10px;
    }

    .mobile-menu .nav-btn {
        width: 100%;
        text-align: center;
        padding: 12px 18px;
    }

    .mobile-menu .nav-btn.login {
        color: #718096;
        border: 1.5px solid #e2e8f0;
    }

    /* ========== RESPONSIVE HEADER ========== */
    @media (max-width: 768px) {
        .header-container {
            height: 65px;
            gap: 15px;
        }

        .header-nav {
            display: none;
        }

        .header-auth {
            display: none;
        }

        .mobile-menu-toggle {
            display: flex;
        }

        .mobile-menu {
            top: 65px;
        }

        .header-logo {
            font-size: 18px;
            gap: 8px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }
    }

    /* ========== HERO SECTION ========== */
    .hero {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        position: relative;
        overflow: hidden;
        color: white;
        text-align: center;
        padding: 40px 20px;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }



    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
    }

    .hero h1 {
        font-size: 56px;
        margin-bottom: 25px;
        font-weight: 700;
        letter-spacing: -0.5px;
        animation: slideInDown 0.8s ease;
    }

    .hero .subtitle {
        font-size: 22px;
        margin-bottom: 40px;
        opacity: 0.95;
        font-weight: 300;
        line-height: 1.6;
        animation: slideInUp 0.8s ease 0.2s both;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 50px;
        animation: fadeIn 1s ease 0.4s both;
    }

    .stat {
        background: rgba(255, 255, 255, 0.1);
        padding: 25px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        display: block;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 14px;
        opacity: 0.9;
        font-weight: 500;
    }

    .cta-button {
        background: white;
        color: #EE592A;
        padding: 16px 45px;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(238, 89, 42, 0.3);
        animation: slideInUp 0.8s ease 0.3s both;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(245, 87, 108, 0.4);
    }

    .cta-button-secondary {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 14px 40px;
        margin-left: 15px;
    }

    .cta-button-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    /* ========== SECTIONS ========== */
    section {
        padding: 40px 20px;
        position: relative;
    }

    section h2 {
        font-size: 40px;
        margin-bottom: 15px;
        color: #2d3748;
        font-weight: 700;
    }

    section>p {
        font-size: 18px;
        color: #718096;
        margin-bottom: 50px;
    }

    /* ========== BENEFITS SECTION ========== */
    .benefits {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1300px;
        margin: 0 auto;
    }

    .benefit {
        background: white;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 4px solid #EE592A;
        position: relative;
        overflow: hidden;
    }

    .benefit::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(238, 89, 42, 0.1) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .benefit:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .benefit:hover::before {
        opacity: 1;
    }

    .benefit-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 20px;
    }

    .benefit h3 {
        color: #2d3748;
        font-size: 22px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .benefit p {
        color: #718096;
        font-size: 15px;
        line-height: 1.6;
    }

    /* ========== STEPS SECTION ========== */
    .steps {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 30px;
        position: relative;
    }

    .step {
        background: white;
        padding: 35px 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: all 0.3s ease;
        counter-increment: step-counter;
        position: relative;
    }

    .step::before {
        content: counter(step-counter);
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 24px;
        box-shadow: 0 5px 15px rgba(238, 89, 42, 0.3);
    }

    .step:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .step h3 {
        color: #2d3748;
        font-size: 20px;
        margin-bottom: 15px;
        margin-top: 15px;
        font-weight: 600;
    }

    .step p {
        color: #718096;
        font-size: 15px;
        line-height: 1.6;
    }

    .steps {
        counter-reset: step-counter;
    }

    /* ========== COMMISSION TABLE ========== */
    .table-wrapper {
        max-width: 1000px;
        margin: 0 auto;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    th {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
        padding: 20px;
        text-align: left;
        font-weight: 600;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        padding: 18px 20px;
        border-bottom: 1px solid #e2e8f0;
        color: #4a5568;
        font-size: 15px;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background: #f7fafc;
    }

    /* ========== TESTIMONIALS SECTION ========== */
    .testimonials {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
    }

    .testimonials h2 {
        color: white;
    }

    .testimonials-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .testimonial {
        background: rgba(255, 255, 255, 0.1);
        padding: 30px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .testimonial:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .testimonial p {
        font-size: 16px;
        margin-bottom: 20px;
        line-height: 1.8;
        font-style: italic;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .author-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .author-info strong {
        display: block;
        margin-bottom: 3px;
    }

    .author-info small {
        opacity: 0.8;
    }

    /* ========== FAQ SECTION ========== */
    .faq {
        max-width: 900px;
        margin: 0 auto;
        text-align: left;
    }

    .faq details {
        margin-bottom: 20px;
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #EE592A;
        transition: all 0.3s ease;
    }

    .faq details:hover {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .faq details[open] {
        background: #f7fafc;
    }

    .faq summary {
        color: #2d3748;
        font-weight: 600;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq summary::after {
        content: '→';
        transition: transform 0.3s ease;
        margin-left: 10px;
    }

    .faq details[open] summary::after {
        transform: rotate(90deg);
    }

    .faq details p {
        margin-top: 15px;
        color: #718096;
        line-height: 1.7;
    }

    /* ========== SIGNUP SECTION ========== */
    #signup {
        background: linear-gradient(135deg, #EE592A 0%, #D64422 100%);
        color: white;
        text-align: center;
        padding: 100px 20px;
    }

    #signup h2 {
        color: white;
        font-size: 48px;
    }

    #signup p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 20px;
        margin-bottom: 40px;
    }

    /* ========== ANIMATIONS ========== */
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .hero {
            padding: 20px 10px;
            min-height: auto;
        }

        .hero h1 {
            font-size: 38px;
        }

        .hero .subtitle {
            font-size: 18px;
        }

        .hero-stats {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .cta-button-secondary {
            margin-left: 0;
            display: block;
            margin-top: 15px;
        }

        section h2 {
            font-size: 32px;
        }

        .benefit {
            padding: 30px 20px;
        }

        table {
            font-size: 13px;
        }

        th,
        td {
            padding: 15px 10px;
        }

        #signup h2 {
            font-size: 36px;
        }
    }

    @media (max-width: 480px) {
        .hero h1 {
            font-size: 28px;
        }

        .hero .subtitle {
            font-size: 16px;
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        section {
            padding: 20px 15px;
        }
    }
</style>

<!-- Custom Header -->
<header class="affiliate-header">
    <div class="header-container">
        <a href="#" class="header-logo">
            <div class="logo-icon">A</div>
            <span>Affiliate Hub</span>
        </a>
        <nav class="header-nav">
            <a href="#benefits" class="nav-link">Benefits</a>
            <a href="#how-it-works" class="nav-link">How It Works</a>
            <a href="#commissions" class="nav-link">Commissions</a>
            <a href="#faq" class="nav-link">FAQ</a>
        </nav>
        <div class="header-auth">
            @auth('affiliate')
                <a href="{{ route('affiliate.dashboard') }}" class="nav-btn dashboard">
                    Dashboard
                </a>
            @endauth

            @guest('affiliate')
                <a href="{{ route('login.affiliate') }}" class="nav-btn login">
                    Login
                </a>
                <a href="{{ route('register.affiliate') }}" class="nav-btn register">
                    Register
                </a>
            @endguest
        </div>
        
    </div>
    
    <!-- Mobile Menu -->
    <nav class="mobile-menu" id="mobileMenu">
        <a href="#benefits" class="nav-link">Benefits</a>
        <a href="#how-it-works" class="nav-link">How It Works</a>
        <a href="#commissions" class="nav-link">Commissions</a>
        <a href="#faq" class="nav-link">FAQ</a>
        
        <div class="mobile-menu-auth">
            @auth('affiliate')
                <a href="{{ route('affiliate.dashboard') }}" class="nav-btn dashboard">
                    Dashboard
                </a>
            @endauth

            @guest('affiliate')
                <a href="{{ route('login.affiliate') }}" class="nav-btn login">
                    Login
                </a>
                <a href="{{ route('register.affiliate') }}" class="nav-btn register">
                    Register
                </a>
            @endguest
        </div>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">
        <h1>Join Our Elite Affiliate Network</h1>
        <p class="subtitle">Partner with us and unlock unlimited earning potential. Turn your audience into passive income.</p>

        <div class="hero-stats">
            <div class="stat">
                <span class="stat-number">15,000+</span>
                <span class="stat-label">Active Affiliates</span>
            </div>
            <div class="stat">
                <span class="stat-number">$2.5M+</span>
                <span class="stat-label">Paid Out</span>
            </div>
            <div class="stat">
                <span class="stat-number">up to 15%</span>
                <span class="stat-label">Commission Rate</span>
            </div>
        </div>

        <div>
            <a href="#signup" class="cta-button">Start Earning Today</a>
            <a href="#how-it-works" class="cta-button cta-button-secondary">Learn More</a>
        </div>
    </div>
</section>

<section id="benefits">
    <h2>Why Partner With Us?</h2>
    <p>Experience industry-leading benefits designed to help you succeed</p>
    <div class="benefits">
        <div class="benefit">
            <div class="benefit-icon">💰</div>
            <h3>Competitive Commissions</h3>
            <p>Earn industry-leading commissions up to 15% on every sale you refer. Higher tier rates available for top performers.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">🛠️</div>
            <h3>Powerful Tools & Resources</h3>
            <p>Access our comprehensive suite of marketing materials, banners, templates, and promotional content to maximize conversions.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">📊</div>
            <h3>Real-Time Analytics Dashboard</h3>
            <p>Track your clicks, conversions, and earnings in real-time with our intuitive, detailed performance dashboard.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">🎯</div>
            <h3>Dedicated Support Team</h3>
            <p>Get personalized assistance from our expert support team available 24/7 to help you optimize your performance.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">⚡</div>
            <h3>Fast & Reliable Payouts</h3>
            <p>Receive timely payments via PayPal, bank transfer, or cryptocurrency. No minimum payout threshold.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">🌐</div>
            <h3>Global Network</h3>
            <p>Join thousands of successful affiliates across the globe and become part of our thriving community.</p>
        </div>
    </div>
</section>

<section id="how-it-works">
    <h2>How It Works</h2>
    <p style="display: flex; align-items: center; justify-content: center;">Get started in four simple steps</p>
    <div class="steps">
        <div class="step">
            <h3>Sign Up</h3>
            <p>Complete our quick and easy application form. Approval typically takes 24-48 hours.</p>
        </div>
        <div class="step">
            <h3>Get Your Links</h3>
            <p>Receive unique affiliate links and promotional materials tailored to your marketing channels.</p>
        </div>
        <div class="step">
            <h3>Start Promoting</h3>
            <p>Share your links across your blog, social media, email list, website, or any other platform.</p>
        </div>
        <div class="step">
            <h3>Earn Commissions</h3>
            <p>Get paid for every sale generated through your referral links. Payouts every month.</p>
        </div>
    </div>
</section>


<section class="testimonials">
    <h2>What Our Top Affiliates Say</h2>
    <div class="testimonials-grid">
        <div class="testimonial">
            <p>"This program has transformed my side hustle into a consistent income stream. The support team is incredibly responsive and helpful!"</p>
            <div class="testimonial-author">
                <div class="author-avatar">JD</div>
                <div class="author-info">
                    <strong>Jane D.</strong>
                    <small>Blog Owner, 50K+ monthly traffic</small>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <p>"The dashboard is intuitive, payouts are reliable, and the commission rates are the best I've seen in the industry. Highly recommended!"</p>
            <div class="testimonial-author">
                <div class="author-avatar">JS</div>
                <div class="author-info">
                    <strong>John S.</strong>
                    <small>Content Creator, YouTube Channel</small>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <p>"Started as a side project, now it's my primary income source. Great commission rates and an amazing community of fellow affiliates."</p>
            <div class="testimonial-author">
                <div class="author-avatar">MC</div>
                <div class="author-info">
                    <strong>Maria C.</strong>
                    <small>Social Media Influencer</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="faq">
    <h2>Frequently Asked Questions</h2>
    <details>
        <summary>What is the cookie duration for my referral links?</summary>
        <p>Our cookie duration is 30 days. This means if a user clicks your affiliate link and makes a purchase within 30 days, you'll earn the commission.</p>
    </details>
    <details>
        <summary>How are commissions calculated and paid?</summary>
        <p>Commissions are calculated automatically based on the product category. Payments are processed monthly and can be sent via PayPal, direct bank transfer, or cryptocurrency. You'll receive your payment within 5-10 business days after the month ends.</p>
    </details>
    <details>
        <summary>Is there a minimum payout threshold?</summary>
        <p>No! There's no minimum payout threshold. You can request payment as soon as you have earned commissions, with no waiting period required.</p>
    </details>
    <details>
        <summary>What marketing materials are available?</summary>
        <p>We provide a comprehensive library of marketing assets including banner ads (various sizes), product images, email templates, social media graphics, and more. All materials are optimized for conversions.</p>
    </details>
    <details>
        <summary>Can I promote using paid advertising?</summary>
        <p>Yes! You can use PPC, Facebook Ads, Google Ads, and other paid channels. However, we prohibit bidding on branded keywords. Our team can help you develop compliant campaigns.</p>
    </details>
    <details>
        <summary>How do I track my performance?</summary>
        <p>Your personal affiliate dashboard provides real-time tracking of clicks, conversions, revenue, and pending commissions. You can filter data by date range, product category, or traffic source.</p>
    </details>
    <details>
        <summary>What is your approval timeline?</summary>
        <p>Most applications are reviewed and approved within 24-48 hours. Our team reviews your application to ensure quality and brand alignment.</p>
    </details>
    <details>
        <summary>Can I earn higher commissions?</summary>
        <p>Yes! We reward top performers with higher commission rates and exclusive bonuses. Reach out to your account manager to discuss tiered performance incentives.</p>
    </details>
</section>

<section id="signup">
    <h2>Ready to Start Earning?</h2>
    <p>Join thousands of successful affiliates and turn your audience into income</p>
    <a href="signup-form.html" class="cta-button">Apply to Our Program</a>
</section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const navLinks = mobileMenu.querySelectorAll('.nav-link, .nav-btn');

        // Toggle menu on button click
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenuToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        });

        // Close menu when a link is clicked
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.affiliate-header')) {
                mobileMenuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
            }
        });
    });
</script>