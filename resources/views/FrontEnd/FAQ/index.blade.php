@extends('FrontEnd.master')
@section('title')
    FAQ
@endsection
@section('content')
    <!-- Hero Section Start -->
    <div class="faq-hero py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 text-white fw-bold mb-3">{{get_setting('site_name')->value ?? ''}}</h1>
                    <h4 class="text-white-50 mb-4">Frequently Asked Questions</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Content Section Start -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <!-- Card Header -->
                    <div class="faq-card-header p-4 p-lg-5">
                        <div class="d-flex align-items-center gap-3">
                            <div class="faq-icon-box">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-2 text-white">Frequently Asked Questions</h2>
                                <p class="mb-0 text-white-50 small">Find quick answers to common questions</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 p-lg-5">
                        <div class="faq-content">
                            @if(session()->get('language') == 'bangla')
                                {!! nl2br($page->faq_bn) !!}
                            @else
                                {!! nl2br($page->faq) !!}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Help Boxes -->
                <div class="row mt-5 g-3">
                    <div class="col-md-4">
                        <div class="quick-help-box rounded-3 p-4 text-center h-100">
                            <i class="fas fa-shipping-fast mb-3"></i>
                            <h5 class="fw-bold mb-2">Shipping & Delivery</h5>
                            <p class="small text-muted mb-0">Learn about our shipping options and delivery times.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="quick-help-box rounded-3 p-4 text-center h-100">
                            <i class="fas fa-undo mb-3"></i>
                            <h5 class="fw-bold mb-2">Returns & Refunds</h5>
                            <p class="small text-muted mb-0">Understand our return policy and refund process.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="quick-help-box rounded-3 p-4 text-center h-100">
                            <i class="fas fa-lock mb-3"></i>
                            <h5 class="fw-bold mb-2">Payment Security</h5>
                            <p class="small text-muted mb-0">Your payment information is safe and secure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section End -->

    <style>
        .faq-hero {
            background: linear-gradient(135deg, #026142 0%, #01452a 100%);
            position: relative;
            overflow: hidden;
        }

        .faq-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            transform: translate(100px, -100px);
        }

        .faq-card-header {
            background: linear-gradient(135deg, #026142 0%, #01452a 100%);
            position: relative;
        }

        .faq-icon-box {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .faq-content {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.8;
            letter-spacing: 0.3px;
        }

        .faq-content h1,
        .faq-content h2,
        .faq-content h3,
        .faq-content h4,
        .faq-content h5,
        .faq-content h6 {
            color: #026142;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .faq-content h1 { font-size: 1.8rem; }
        .faq-content h2 { font-size: 1.5rem; }
        .faq-content h3 { font-size: 1.3rem; }

        .faq-content p {
            margin-bottom: 1rem;
        }

        .faq-content ul,
        .faq-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .faq-content li {
            margin-bottom: 0.5rem;
        }

        .quick-help-box {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .quick-help-box:hover {
            border-color: #026142;
            background: #f0faf8;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(2, 97, 66, 0.1);
        }

        .quick-help-box i {
            font-size: 2.5rem;
            color: #026142;
        }

        .breadcrumb {
            background: transparent;
        }

        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.9);
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .faq-content {
                font-size: 0.95rem;
            }

            .faq-content h2 {
                font-size: 1.3rem;
            }

            .faq-icon-box {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
@endsection

