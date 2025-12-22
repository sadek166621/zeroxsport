@extends('FrontEnd.master')
@section('content')
<style>
    /* Modern, clean, and attractive styles */
    body {
        background: #f8fafc;
    }

    .affiliate-hero {
        color: #fff;
        padding: 80px 0 60px 0;
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, #ff914d 0%, #ffb86c 100%),
        url('{{ asset(' FrontEnd/assets/img/affiliate-banner.png') }}') center/cover no-repeat;
        
    }

    .affiliate-hero .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.35);
        z-index: 1;
    }

    .affiliate-hero-content {
        position: relative;
        z-index: 2;
    }

    .affiliate-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 18px;
        letter-spacing: -1px;
    }

    .affiliate-hero p {
        font-size: 1.2rem;
        margin-bottom: 32px;
        color: #fff;
    }

    .affiliate-cta-btn {
        background: #fff;
        color: #ff914d;
        border: none;
        font-weight: 600;
        font-size: 1.1rem;
        padding: 14px 36px;
        border-radius: 30px;
        box-shadow: 0 4px 24px rgba(255, 145, 77, 0.15);
        transition: background 0.2s, color 0.2s;
    }

    .affiliate-cta-btn:hover {
        background: #ff914d;
        color: #fff;
    }

    .play {
        
        margin-left: 10px;
    }

    .affiliate-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
        padding: 32px 24px;
        margin-bottom: 32px;
        transition: box-shadow 0.2s;
        min-height: 200px;
    }

    .affiliate-card:hover {
        box-shadow: 0 8px 32px rgba(255, 145, 77, 0.12);
    }

    .affiliate-card .icon {
        font-size: 2.5rem;
        color: #ff914d;
        margin-bottom: 18px;
    }

    .affiliate-section-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 18px;
        color: #222;
    }

    .affiliate-feature-list {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        justify-content: center;
    }

    .affiliate-feature {
        flex: 1 1 220px;
        min-width: 220px;
        background: linear-gradient(120deg, #fff2e7 0%, #ffe5d0 100%);
        border-radius: 14px;
        padding: 24px 18px;
        text-align: center;
        box-shadow: 0 2px 12px rgba(255, 145, 77, 0.08);
        margin-bottom: 0;
    }

    .affiliate-feature .icon {
        font-size: 2rem;
        color: #ff914d;
        margin-bottom: 10px;
    }

    .affiliate-skills {
        background: linear-gradient(120deg, #e7f6f8 0%, #f0ecf9 100%);
        border-radius: 18px;
        padding: 40px 24px;
        margin-top: 40px;
    }

    .affiliate-skill-card {
        background: #fff;
        border-radius: 12px;
        padding: 18px 14px;
        margin-bottom: 18px;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
        text-align: center;
    }

    .affiliate-skill-card .icon {
        font-size: 2rem;
        margin-bottom: 8px;
    }

    .affiliate-video-btn {
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid #fff;
        color: #fff;
        border-radius: 50px;
        width: 160px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        cursor: pointer;
        transition: background 0.2s;
    }

    .affiliate-video-btn:hover {
        background: #fff;
        color: #ff914d;
    }

    @media (max-width: 767px) {
        .affiliate-hero h1 {
            font-size: 2rem;
        }

        .affiliate-section-title {
            font-size: 1.3rem;
        }

        .affiliate-card {
            min-height: unset;
        }
    }

    /* FAQ */
    .affiliate-faq-section {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(255, 145, 77, 0.07);
        padding: 48px 32px;
    }
    .affiliate-faq-title {
        font-size: 2rem;
        font-weight: 700;
        /* color: #ff914d; */
        margin-bottom: 32px;
    }
    .affiliate-faq-accordion {
        /* max-width: 800px; */
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }
    .affiliate-faq-item {
        border: none;
        border-radius: 14px;
        margin-bottom: 18px;
        background: linear-gradient(120deg, #fff2e7 0%, #ffe5d0 100%);
        box-shadow: 0 2px 12px rgba(255, 145, 77, 0.08);
        overflow: hidden;
        transition: box-shadow 0.2s;
    }
    .affiliate-faq-item .accordion-button {
        background: none;
        border: none;
        font-size: 1.15rem;
        font-weight: 600;
        color: #ff914d;
        padding: 18px 24px;
        box-shadow: none;
        outline: none;
        transition: background 0.2s, color 0.2s;
    }
    .affiliate-faq-item .accordion-button:not(.collapsed) {
        background: #ff914d;
        color: #fff;
    }
    .affiliate-faq-item .accordion-button:after {
        font-family: "Font Awesome 5 Free";
        content: "\f078";
        font-weight: 900;
        float: right;
        margin-left: auto;
        transition: transform 0.2s;
    }
    .affiliate-faq-item .accordion-button:not(.collapsed):after {
        transform: rotate(-180deg);
    }
    .affiliate-faq-item .accordion-body {
        background: #fff;
        color: #444;
        padding: 18px 24px 24px 24px;
        border-top: 1px solid #ffe5d0;
        font-size: 1rem;
    }
    @media (max-width: 767px) {
        .affiliate-faq-section {
            padding: 24px 8px;
        }
        .affiliate-faq-title {
            font-size: 1.3rem;
        }
        .affiliate-faq-item .accordion-button,
        .affiliate-faq-item .accordion-body {
            padding: 12px 10px;
        }
    }
</style>

{{-- Hide the header --}}
<style>
    header,
    .site-header,
    .main-header {
        display: none !important;
    }
</style>

{{-- HEADER --}}
<style>
    .affiliate-header {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
        padding: 0.7rem 0;
        transition: background 0.2s;
    }

    .affiliate-header .logo {
        height: 50px;
        width: auto;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(255, 145, 77, 0.07);
        padding: 2px 8px;
    }

    .affiliate-header .nav-btn {
        border: 1.5px solid #ff914d;
        background: #fff;
        color: #ff914d;
        font-weight: 600;
        border-radius: 24px;
        padding: 8px 22px;
        font-size: 1rem;
        margin-left: 10px;
        transition: background 0.2s, color 0.2s;
        box-shadow: 0 2px 8px rgba(255, 145, 77, 0.07);
        text-decoration: none;
        display: inline-block;
    }

    .affiliate-header .nav-btn:hover,
    .affiliate-header .nav-btn.active {
        background: #ff914d;
        color: #fff;
    }

    @media (max-width: 767px) {
        .affiliate-header .nav-btn {
            padding: 7px 12px;
            font-size: 0.95rem;
            margin-left: 6px;
        }

        .affiliate-header .logo {
            height: 28px;
        }
    }
    
</style>
<section class="affiliate-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}">
                <img src="{{ asset(get_setting('site_logo')->value) }}" class="logo" alt="Logo" />
            </a>

            @auth('affiliate')
                <a href="{{ route('affiliate.dashboard') }}" class="nav-btn{{ request()->routeIs('affiliate.dashboard') ? ' active' : '' }}">
                    Dashboard
                </a>
            @endauth

            @guest('affiliate') 
            <div class="d-flex align-items-center">
                <a href="{{ route('login.affiliate') }}" class="nav-btn{{ request()->routeIs('login.affiliate') ? ' active' : '' }}">
                    Affiliate Login
                </a>
                <a href="{{ route('register.affiliate') }}" class="nav-btn{{ request()->routeIs('register.affiliate') ? ' active' : '' }}" style="margin-left:14px;">
                    Register
                </a>
            </div>
            @endguest

        </div>
    </div>
</section>

{{-- HERO SECTION --}}
<section class="affiliate-hero">
    <div class="overlay"></div>
    <div class="container affiliate-hero-content">
        <div class="row align-items-center">
            <div class="col-md-7 text-center text-md-left">

                <h1>আপনার ক্যারিয়ারকে উন্নত করুন এবং টাকা আর্ন করুন</h1>
                <p>আমাদের অ্যাফিলিয়েট প্রোগ্রামে যোগ দিন, পণ্য প্রমোট করুন এবং ঘরে বসেই কমিশন অর্জন করুন। শুরু করুন আজই!</p>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <a href="{{ route('register.affiliate') }}" class="affiliate-cta-btn me-2 mb-2">Get Started</a>

                    <button class="affiliate-video-btn ms-2 mb-2" onclick="showPopup()">
                        <i class="fas fa-play"><span class="play">PLAY</span></i>
                    </button>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-block text-center">
                <img src="https://www.searchenginejournal.com/wp-content/uploads/2021/10/a-guide-to-starting-with-amazons-affiliate-program-3-617254c961bce-sej.png" alt="Affiliate Banner" style="width: 100%;  border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.08);">
            </div>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="container py-5">
    <h2 class="affiliate-section-title text-center mb-4">কিভাবে কাজ করে?</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="affiliate-card text-center">
                <div class="icon"><i class="fas fa-user-plus"></i></div>
                <h4 class="fw-bold mb-2">১. রেজিস্ট্রেশন করুন</h4>
                <p>সহজেই কয়েকটি ধাপে রেজিস্ট্রেশন করে যুক্ত হয়ে যান অ্যাফিলিয়েশন প্রোগ্রামে।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="affiliate-card text-center">
                <div class="icon"><i class="fas fa-share-alt"></i></div>
                <h4 class="fw-bold mb-2">২. প্রোমোট করুন</h4>
                <p>আপনার অ্যাফিলিয়েট লিংক ও কন্টেন্ট শেয়ার করুন বিভিন্ন প্ল্যাটফর্মে।</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="affiliate-card text-center">
                <div class="icon"><i class="fas fa-coins"></i></div>
                <h4 class="fw-bold mb-2">৩. আয় করুন</h4>
                <p>প্রোডাক্ট বিক্রির মাধ্যমে পেয়ে যান মূল্যের ১৫% পর্যন্ত কমিশন!</p>
            </div>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="py-3" style="background: linear-gradient(120deg, #fff2e7 0%, #e7f6f8 100%);">
    <div class="container">
        <h2 class="affiliate-section-title text-center mb-5">কেন আমাদের অ্যাফিলিয়েট প্রোগ্রাম বেছে নিবেন?</h2>
        <div class="affiliate-feature-list">
            <div class="affiliate-feature">
                <div class="icon"><i class="fas fa-home"></i></div>
                <h5 class="fw-bold mb-2">ঘরে বসে আয়ের সুযোগ</h5>
                <p>বিক্রির মাধ্যমে ঘরে বসেই প্রতিমাসে ২৫-৫০ হাজার+ টাকা উপার্জনের সুযোগ।</p>
            </div>
            <div class="affiliate-feature">
                <div class="icon"><i class="fas fa-box-open"></i></div>
                <h5 class="fw-bold mb-2">চমৎকার প্রোডাক্টস ও কন্টেন্টস</h5>
                <p>১০০+ স্কিল ও একাডেমিক কোর্স থেকে নিজের প্ল্যাটফর্ম অনুসারে প্রোডাক্ট প্রোমোশনের সুযোগ।</p>
            </div>
            <div class="affiliate-feature">
                <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <h5 class="fw-bold mb-2">লার্নিং ও ট্রেনিং সেশন</h5>
                <p>ডিজিটাল মার্কেটিং ও সেলস টেকনিক শিখে দক্ষ অ্যাফিলিয়েট হওয়ার সুযোগ।</p>
            </div>
            <div class="affiliate-feature">
                <div class="icon"><i class="fas fa-gift"></i></div>
                <h5 class="fw-bold mb-2">লেভেল ওয়াইজ কমিশন</h5>
                <p>বিভিন্ন ক্যাম্পেইনে অংশগ্রহণ করে জিতে নিন আকর্ষণীয় গিফট ও পুরস্কার।</p>
            </div>
        </div>
    </div>
</section>

{{-- SKILLS SECTION --}}
<section class="container affiliate-skills mt-5">
    <h2 class="affiliate-section-title text-center mb-4">অ্যাফিলিয়েশনের জন্য প্রয়োজনীয় <span class="text-warning">স্কিলস্</span></h2>
    <div class="row justify-content-center">
        <div class="col-md-3 col-6">
            <div class="affiliate-skill-card">
                <div class="icon"><i class="fas fa-pencil-ruler" style="color:#ff914d;"></i></div>
                <h6 class="fw-bold mb-1">কন্টেন্ট ক্রিয়েটর</h6>
                <p style="font-size: 14px;">ব্লগ, ইউটিউব, পডকাস্ট ও সোশ্যাল মিডিয়াতে কন্টেন্ট তৈরির অভিজ্ঞতা।</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="affiliate-skill-card">
                <div class="icon"><i class="fas fa-graduation-cap" style="color:#17A2B8;"></i></div>
                <h6 class="fw-bold mb-1">এডুকেশন ও ট্রেইনিং</h6>
                <p style="font-size: 14px;">অনলাইন এডুকেশন সেক্টরে কাজ করার আগ্রহ।</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="affiliate-skill-card">
                <div class="icon"><i class="fas fa-bullhorn" style="color:#0CBC87;"></i></div>
                <h6 class="fw-bold mb-1">ডিজিটাল মার্কেটার</h6>
                <p style="font-size: 14px;">অনলাইন ট্র্যাফিক ও কাস্টমার কনভার্সন নিয়ে কাজের অভিজ্ঞতা।</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="affiliate-skill-card">
                <div class="icon"><i class="fas fa-ad" style="color:#6F42C1;"></i></div>
                <h6 class="fw-bold mb-1">পেইড মার্কেটিং স্পেশালিষ্ট</h6>
                <p style="font-size: 14px;">Google, Facebook, YouTube Ads-এ ক্যাম্পেইন পরিচালনার অভিজ্ঞতা।</p>
            </div>
        </div>
    </div>
</section>

{{-- VIDEO POPUP --}}
<section id="videoPopup" class="w-100 popup-youtube-video-section d-none"
    style="height: 100vh; position: fixed; background-color: #31313199; top: 0; left: 0; z-index: 999;">
    <div class="d-flex align-items-center justify-content-center w-100" style="height: 100%;">
        <div class="position-relative affiliate-video-popup" style="max-width: 700px; width: 90%;">
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/S284KSgOWRU?si=H8Zl7tJeR84QB8kl"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <button type="button" class="btn-close position-absolute start-0" aria-label="Close"
                onclick="closePopup()" style="top: -18px; left: -18px; background: #fff; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-times" style="font-size: 22px; color: #ff914d;"></i>
            </button>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="affiliate-faq-section">
    <div class="container px-2 px-md-5">
        <h2 class="affiliate-faq-title text-center mb-4">প্রশ্ন ও উত্তর</h2>
        <div class="affiliate-faq-accordion accordion" id="faqAccordion">
            <div class="accordion-item affiliate-faq-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        অ্যাফিলিয়েট প্রোগ্রাম কি?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        আমাদের অ্যাফিলিয়েট প্রোগ্রাম আপনাকে আমাদের পণ্য ও সার্ভিস প্রোমোট করে কমিশন
                        উপার্জনের সুযোগ দেয়。
                    </div>
                </div>
            </div>
            <div class="accordion-item affiliate-faq-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        কিভাবে রেজিস্টার করব?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        রেজিস্ট্রেশনের জন্য আমাদের ওয়েবসাইটে গিয়ে ফর্ম পূরণ করুন এবং সাবমিট করুন。
                    </div>
                </div>
            </div>
            <div class="accordion-item affiliate-faq-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        কমিশন কিভাবে পাব?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        বিক্রির পর আপনার অ্যাকাউন্টে কমিশন জমা হবে। আপনি মাস শেষে পেমেন্ট রিকোয়েস্ট করতে পারবেন。
                    </div>  
                </div>
            </div>
            <div class="accordion-item affiliate-faq-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        কি ধরনের প্রোডাক্ট প্রোমোট করতে পারব?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse"
                    aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        আপনি আমাদের বিভিন্ন স্কিল ও একাডেমিক কোর্স, ডিজিটাল প্রোডাক্টস ইত্যাদি প্রোমোট করতে পারবেন。
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showPopup() {
        document.getElementById('videoPopup').classList.remove('d-none');
    }

    function closePopup() {
        document.getElementById('videoPopup').classList.add('d-none');
    }
</script>
@endsection