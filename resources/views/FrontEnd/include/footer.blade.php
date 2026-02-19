<style>
    .footer {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.03);
        position: relative;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #026544 0%, #02da72 100%);
    }

    .footer p,
    .footer a {
        font-size: 14px !important;
        transition: all 0.4s ease;
        color: #555;
        text-decoration: none;
    }

    .footer a:hover {
        color: #026544 !important;
    }

    .footer h4 {
        color: #222;
        font-weight: 600;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        font-size: 18px;
    }

    .footer h4:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: #026544;
        border-radius: 2px;
    }

    .contact-info i {
        width: 35px;
        height: 35px;
        background: rgba(2, 101, 68, 0.1);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #026544;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .contact-info p:hover i {
        background: #026544;
        color: white;
    }

    .social-links {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        color: #555;
    }

    .social-links a i {
        width: 32px;
        height: 32px;
        background: rgba(2, 101, 68, 0.1);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        transition: all 0.3s ease;
        color: #026544;
    }

    .social-links a:hover i {
        background: #026544;
        color: white;
    }

    .payment-section img {
        height: 30px;
        transition: all 0.3s ease;
        filter: grayscale(100%);
        opacity: 0.7;
    }

    .payment-section img:hover {
        filter: grayscale(0%);
        opacity: 1;
    }

    .copyright {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding-top: 25px;
    }

    .footer-menu {
        display: flex;
        justify-content: flex-end;
        gap: 20px;
    }

    .footer-menu a {
        color: #666;
        position: relative;
    }

    .footer-menu a:after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: #026544;
        transition: all 0.3s ease;
    }

    .footer-menu a:hover:after {
        width: 100%;
    }

    .quick-links {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .main-logo {
        max-width: 180px;
        height: auto;
        margin-bottom: 25px;
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 8px;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    /* Mobile Responsive - Line by line */
    @media (max-width: 992px) {
        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        
        .footer h4:after {
            left: 0;
        }
    }

    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: 1fr; /* Single column */
            gap: 2rem;
        }

        .footer-grid > div {
            text-align: left;
            width: 100%;
            border-bottom: 1px solid rgba(2, 101, 68, 0.1);
            padding-bottom: 20px;
        }

        .footer-grid > div:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .footer h4 {
            font-size: 16px;
            text-align: left;
            margin-bottom: 15px;
        }

        .footer h4:after {
            left: 0;
            width: 40px;
        }

        .main-logo {
            margin-left: 0;
            margin-right: 0;
        }

        .contact-info {
            align-items: flex-start !important;
        }

        .contact-info p {
            justify-content: flex-start;
        }

        .quick-links {
            align-items: flex-start;
        }

        .social-links {
            align-items: flex-start;
        }

        .social-links a {
            justify-content: flex-start;
        }

        .footer-menu {
            justify-content: center;
            margin-top: 20px;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }

        .payment-section {
            justify-content: flex-start !important;
            margin-top: 20px;
        }

        .copyright {
            margin-top: 0;
            padding: 15px 0;
            margin-bottom: 10px;
        }

        .copyright p {
            text-align: left;
        }

        .footer p {
            font-size: 13px !important;
        }
    }

    @media (max-width: 480px) {
        .footer-grid {
            gap: 1.5rem;
        }

        .footer h4 {
            font-size: 15px;
            margin-bottom: 12px;
        }

        .quick-links {
            gap: 8px;
        }

        .contact-info {
            gap: 10px;
        }

        .social-links {
            gap: 8px;
        }

        .footer p {
            font-size: 12px !important;
        }

        .main-logo {
            max-width: 150px;
        }
    }
</style>

<footer class="footer wow fadeIn mb-lg-0" data-wow-delay="0.1s">
    <div class="custom_container pt-5">
        <div class="footer-grid">
            <!-- Company Info -->
            <div>
                <a class="d-block" href="{{route('home')}}">
                    <img src="{{asset(get_setting('site_footer_logo')->value)}}" alt="logo" class="main-logo">
                </a>
                <p class="text-muted mb-4">{{get_setting('short_description')->value}}</p>
                <div class="contact-info d-flex flex-column gap-3">
                    <p class="mb-0 d-flex align-items-center">
                        <i class="fa fa-map-marker-alt"></i>
                        <span>{{get_setting('business_address')->value}}</span>
                    </p>
                    <p class="mb-0 d-flex align-items-center">
                        <i class="fa fa-phone-alt"></i>
                        <span>{{get_setting('phone')->value}}</span>
                    </p>
                    <p class="mb-0 d-flex align-items-center">
                        <i class="fa fa-envelope"></i>
                        <span>{{get_setting('email')->value}}</span>
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') দ্রুত লিঙ্ক @else Quick Links @endif</h4>
                <div class="quick-links">
                    <a href="@if(Auth::user() && Auth::user()->role == 3) {{route('dashboard')}} @else {{route('login')}} @endif">
                        @if(session()->get('language') == 'bangla')
                        @if(Auth::user() && Auth::user()->role == 3) ইওর একাউন্ট @else লগইন @endif
                        @else
                        @if(Auth::user() && Auth::user()->role == 3) Your Account @else Login @endif
                        @endif
                    </a>
                    <a href="{{route('page.about')}}">
                        @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে @else About Us @endif
                    </a>
                    <a href="{{route('page.contact')}}">
                        @if(session()->get('language') == 'bangla') যোগাযোগ @else Contact Us @endif
                    </a>
                </div>
            </div>

            <!-- Help & Support -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') সহায়তা @else Help & Support @endif</h4>
                <div class="quick-links">
                    <a href="{{route('page.faq')}}">
                        @if(session()->get('language') == 'bangla') সাধারণ জিজ্ঞাসা @else FAQs @endif
                    </a>
                    <a href="{{route('page.terms')}}">
                        @if(session()->get('language') == 'bangla') শর্তাবলী @else Terms & Conditions @endif
                    </a>
                    <a href="{{route('page.policy')}}">
                        @if(session()->get('language') == 'bangla') গোপনীয়তা নীতি @else Privacy Policy @endif
                    </a>
                    <a href="{{route('page.help')}}">
                        @if(session()->get('language') == 'bangla') সাহায্য @else Help Center @endif
                    </a>
                </div>
            </div>

            <!-- Connect -->
            <div>
                <h4>@if(session()->get('language') == 'bangla') যোগাযোগ @else Connect With Us @endif</h4>
                <div class="social-links">
                    <a href="{{get_setting('facebook_url')->value}}">
                        <i class="fab fa-facebook-f"></i>
                        <span>@if(session()->get('language') == 'bangla') ফেসবুক @else Facebook @endif</span>
                    </a>
                    <a href="{{get_setting('instagram_url')->value}}">
                        <i class="fab fa-instagram"></i>
                        <span>@if(session()->get('language') == 'bangla') ইনস্টাগ্রাম @else Instagram @endif</span>
                    </a>
                    <a href="{{get_setting('twitter_url')->value}}">
                        <i class="fab fa-twitter"></i>
                        <span>@if(session()->get('language') == 'bangla') টুইটার @else Twitter @endif</span>
                    </a>
                    <a href="{{get_setting('linkedin_url')->value}}">
                        <i class="fab fa-linkedin-in"></i>
                        <span>@if(session()->get('language') == 'bangla') লিঙ্কডইন @else LinkedIn @endif</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Section -->
</footer>