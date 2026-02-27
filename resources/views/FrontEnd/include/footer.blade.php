<style>
    .footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        position: relative;
        padding-top: 60px;
        margin-top: 50px;
        color: #f0f0f0;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #f09220, #ffb347, #f09220);
        background-size: 200% 100%;
        animation: gradientMove 3s ease infinite;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .footer p,
    .footer a {
        font-size: 14px !important;
        transition: all 0.3s ease;
        color: #b0b0b0;
        text-decoration: none;
        line-height: 1.7;
    }

    .footer a:hover {
        color: #f09220 !important;
        transform: translateX(5px);
    }

    .footer h4 {
        color: #ffffff;
        font-weight: 600;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        font-size: 18px;
        letter-spacing: 0.5px;
    }

    .footer h4:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #f09220, #ffb347);
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .footer h4:hover:after {
        width: 70px;
    }

    .contact-info p {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .contact-info p:hover {
        background: rgba(240, 146, 32, 0.1);
        transform: translateY(-2px);
    }

    .contact-info i {
        width: 35px;
        height: 35px;
        background: rgba(240, 146, 32, 0.15);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #f09220;
        margin-right: 15px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .contact-info p:hover i {
        background: #f09220;
        color: white;
        transform: rotate(360deg);
    }

    .social-links {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        color: #b0b0b0;
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .social-links a i {
        width: 35px;
        height: 35px;
        background: rgba(240, 146, 32, 0.15);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        transition: all 0.3s ease;
        color: #f09220;
        font-size: 16px;
    }

    .social-links a:hover {
        background: rgba(240, 146, 32, 0.15);
        transform: translateY(-2px);
    }

    .social-links a:hover i {
        background: #f09220;
        color: white;
        transform: rotate(360deg);
    }

    .quick-links {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .quick-links a {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .quick-links a::before {
        content: '→';
        position: absolute;
        right: -20px;
        opacity: 0;
        transition: all 0.3s ease;
        color: #f09220;
    }

    .quick-links a:hover {
        background: rgba(240, 146, 32, 0.1);
        padding-left: 20px;
    }

    .quick-links a:hover::before {
        right: 15px;
        opacity: 1;
    }

    .main-logo {
        max-width: 180px;
        height: auto;
        margin-bottom: 25px;
        transition: all 0.3s ease;
        padding: 10px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        backdrop-filter: blur(5px);
    }

    .main-logo:hover {
        transform: scale(1.05);
        background: rgba(255, 255, 255, 0.15);
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        padding-bottom: 40px;
    }

    .footer-grid > div {
        background: rgba(255, 255, 255, 0.02);
        padding: 25px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .footer-grid > div:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(240, 146, 32, 0.3);
        transform: translateY(-5px);
    }

    /* Copyright Section */
    .copyright-area {
        background: rgba(0, 0, 0, 0.3);
        padding: 20px 0;
        margin-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .copyright-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .copyright-text {
        color: #b0b0b0;
        font-size: 14px;
    }

    .copyright-text a {
        color: #f09220;
        font-weight: 600;
    }

    .footer-menu {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
    }

    .footer-menu a {
        color: #b0b0b0;
        position: relative;
        padding: 5px 0;
    }

    .footer-menu a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #f09220, #ffb347);
        transition: width 0.3s ease;
    }

    .footer-menu a:hover:after {
        width: 100%;
    }

    .payment-section {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }

    .payment-section img {
        height: 30px;
        transition: all 0.3s ease;
        filter: grayscale(100%);
        opacity: 0.7;
        border-radius: 6px;
    }

    .payment-section img:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }

    /* Mobile Responsive */
    @media (max-width: 992px) {
        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .footer {
            padding-top: 40px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            padding: 0 15px 30px;
        }

        .footer-grid > div {
            padding: 20px;
            text-align: left;
            width: 100%;
        }

        .footer h4 {
            font-size: 16px;
            text-align: left;
            margin-bottom: 20px;
        }

        .footer h4:after {
            left: 0;
            width: 40px;
        }

        .footer h4:hover:after {
            width: 60px;
        }

        .main-logo {
            margin-left: 0;
            max-width: 150px;
        }

        .contact-info p {
            justify-content: flex-start;
        }

        .quick-links a {
            justify-content: flex-start;
            width: 100%;
        }

        .social-links a {
            justify-content: flex-start;
            width: 100%;
        }

        .copyright-content {
            flex-direction: column;
            text-align: center;
            padding: 0 15px;
        }

        .footer-menu {
            justify-content: center;
            gap: 15px;
        }

        .payment-section {
            justify-content: center;
        }

        .copyright-text {
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .footer-grid {
            gap: 1rem;
        }

        .footer-grid > div {
            padding: 15px;
        }

        .footer h4 {
            font-size: 15px;
            margin-bottom: 15px;
        }

        .contact-info p {
            padding: 8px 12px;
            font-size: 13px !important;
        }

        .contact-info i {
            width: 30px;
            height: 30px;
            font-size: 14px;
            margin-right: 10px;
        }

        .quick-links a,
        .social-links a {
            padding: 8px 12px;
            font-size: 13px !important;
        }

        .quick-links a i,
        .social-links a i {
            width: 30px;
            height: 30px;
            font-size: 14px;
            margin-right: 10px;
        }

        .main-logo {
            max-width: 130px;
            margin-bottom: 20px;
        }

        .footer-menu {
            gap: 10px;
            flex-direction: column;
            align-items: center;
        }

        .payment-section {
            gap: 10px;
        }

        .payment-section img {
            height: 25px;
        }

        .copyright-text {
            font-size: 12px;
        }
    }

    /* Animation for footer appearance */
    .footer {
        animation: fadeInUp 0.8s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<footer class="footer wow fadeIn" data-wow-delay="0.1s">
    <div class="custom_container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div>
                <a class="d-block" href="{{route('home')}}">
                    <img src="{{asset(get_setting('site_footer_logo')->value ?? '')}}" alt="logo" class="main-logo">
                </a>
                <p class="mb-4" style="color: #b0b0b0;">{{get_setting('short_description')->value ?? ''}}</p>
                <div class="contact-info">
                    <p>
                        <i class="fa fa-map-marker-alt"></i>
                        <span>{{get_setting('business_address')->value ?? ''}}</span>
                    </p>
                    <p>
                        <i class="fa fa-phone-alt"></i>
                        <span>{{get_setting('phone')->value ?? ''}}</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <span>{{get_setting('email')->value ?? ''}}</span>
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') দ্রুত লিঙ্ক @else Quick Links @endif</h4>
                <div class="quick-links">
                    <a href="@if(Auth::user() && Auth::user()->role == 3) {{route('dashboard')}} @else {{route('login')}} @endif">
                        <i class="fas fa-user"></i>
                        @if(session()->get('language') == 'bangla')
                            @if(Auth::user() && Auth::user()->role == 3) আপনার অ্যাকাউন্ট @else লগইন @endif
                        @else
                            @if(Auth::user() && Auth::user()->role == 3) Your Account @else Login @endif
                        @endif
                    </a>
                    <a href="{{route('page.about')}}">
                        <i class="fas fa-info-circle"></i>
                        @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে @else About Us @endif
                    </a>
                    <a href="{{route('page.contact')}}">
                        <i class="fas fa-envelope"></i>
                        @if(session()->get('language') == 'bangla') যোগাযোগ @else Contact Us @endif
                    </a>
                </div>
            </div>

            <!-- Help & Support -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') সহায়তা @else Help & Support @endif</h4>
                <div class="quick-links">
                    <a href="{{route('page.faq')}}">
                        <i class="fas fa-question-circle"></i>
                        @if(session()->get('language') == 'bangla') সাধারণ জিজ্ঞাসা @else FAQs @endif
                    </a>
                    <a href="{{route('page.terms')}}">
                        <i class="fas fa-file-contract"></i>
                        @if(session()->get('language') == 'bangla') শর্তাবলী @else Terms & Conditions @endif
                    </a>
                    <a href="{{route('page.policy')}}">
                        <i class="fas fa-shield-alt"></i>
                        @if(session()->get('language') == 'bangla') গোপনীয়তা নীতি @else Privacy Policy @endif
                    </a>
                    <a href="{{route('page.help')}}">
                        <i class="fas fa-headset"></i>
                        @if(session()->get('language') == 'bangla') সাহায্য @else Help Center @endif
                    </a>
                </div>
            </div>

            <!-- Connect -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') সংযোগ করুন @else Connect With Us @endif</h4>
                <div class="social-links">
                    <a href="{{get_setting('facebook_url')->value ?? '#'}}">
                        <i class="fab fa-facebook-f"></i>
                        <span>@if(session()->get('language') == 'bangla') ফেসবুক @else Facebook @endif</span>
                    </a>
                    <a href="{{get_setting('instagram_url')->value ?? '#'}}">
                        <i class="fab fa-instagram"></i>
                        <span>@if(session()->get('language') == 'bangla') ইনস্টাগ্রাম @else Instagram @endif</span>
                    </a>
                    <a href="{{get_setting('twitter_url')->value ?? '#'}}">
                        <i class="fab fa-twitter"></i>
                        <span>@if(session()->get('language') == 'bangla') টুইটার @else Twitter @endif</span>
                    </a>
                    <a href="{{get_setting('linkedin_url')->value ?? '#'}}">
                        <i class="fab fa-linkedin-in"></i>
                        <span>@if(session()->get('language') == 'bangla') লিঙ্কডইন @else LinkedIn @endif</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    {{-- <div class="copyright-area">
        <div class="custom_container">
            <div class="copyright-content">
                <div class="copyright-text">
                    &copy; {{ date('Y') }} <a href="{{route('home')}}">{{get_setting('site_name')->value ?? ''}}</a>. 
                    @if(session()->get('language') == 'bangla')
                        সর্বস্বত্ব সংরক্ষিত।
                    @else
                        All Rights Reserved.
                    @endif
                </div>
                
                <div class="footer-menu">
                    <a href="{{route('page.terms')}}">
                        @if(session()->get('language') == 'bangla') শর্তাবলী @else Terms @endif
                    </a>
                    <a href="{{route('page.policy')}}">
                        @if(session()->get('language') == 'bangla') গোপনীয়তা @else Privacy @endif
                    </a>
                    <a href="{{route('page.help')}}">
                        @if(session()->get('language') == 'bangla') সাহায্য @else Help @endif
                    </a>
                </div>

                <div class="payment-section">
                    <img src="{{asset('FrontEnd')}}/logo/visa.png" alt="Visa">
                    <img src="{{asset('FrontEnd')}}/logo/mastercard.png" alt="Mastercard">
                    <img src="{{asset('FrontEnd')}}/logo/bkash.png" alt="bKash">
                    <img src="{{asset('FrontEnd')}}/logo/nagad.png" alt="Nagad">
                </div>
            </div>
        </div>
    </div> --}}
</footer>