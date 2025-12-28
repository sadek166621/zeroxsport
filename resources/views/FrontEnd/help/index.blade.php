@extends('FrontEnd.master')
@section('title')
    Get Help
@endsection
@section('content')
    <!-- Hero Section Start -->
    <div class="help-hero py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 text-white fw-bold mb-3">{{get_setting('site_name')->value ?? ''}}</h1>
                    <h4 class="text-white-50 mb-4">Get Help</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Get Help</li>
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
                    <div class="help-card-header p-4 p-lg-5">
                        <div class="d-flex align-items-center gap-3">
                            <div class="help-icon-box">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-2 text-white">We're Here to Help</h2>
                                <p class="mb-0 text-white-50 small">Find answers to your questions and get support
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 p-lg-5">
                        <div class="help-content">
                            @if(session()->get('language') == 'bangla')
                                {!! nl2br($page->help_bn) !!}
                            @else
                                {!! nl2br($page->help) !!}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Support Boxes -->
                <div class="row mt-5 g-3">
                    <div class="col-md-6">
                        <div class="support-box rounded-3 p-4 text-center h-100">
                            <i class="fas fa-headset mb-3"></i>
                            <h5 class="fw-bold mb-2">Customer Support</h5>
                            <p class="small text-muted mb-0">Reach out to our friendly support team for immediate
                                assistance.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="support-box rounded-3 p-4 text-center h-100">
                            <i class="fas fa-book mb-3"></i>
                            <h5 class="fw-bold mb-2">Documentation</h5>
                            <p class="small text-muted mb-0">Browse our comprehensive guides and tutorials for detailed
                                information.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section End -->

    <style>
        .help-hero {
            background: linear-gradient(135deg, #026142 0%, #01452a 100%);
            position: relative;
            overflow: hidden;
        }

        .help-hero::before {
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

        .help-card-header {
            background: linear-gradient(135deg, #026142 0%, #01452a 100%);
            position: relative;
        }

        .help-icon-box {
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

        .help-content {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.8;
            letter-spacing: 0.3px;
        }

        .help-content h1,
        .help-content h2,
        .help-content h3,
        .help-content h4,
        .help-content h5,
        .help-content h6 {
            color: #026142;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .help-content h1 {
            font-size: 1.8rem;
        }

        .help-content h2 {
            font-size: 1.5rem;
        }

        .help-content h3 {
            font-size: 1.3rem;
        }

        .help-content p {
            margin-bottom: 1rem;
        }

        .help-content ul,
        .help-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .help-content li {
            margin-bottom: 0.5rem;
        }

        .support-box {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .support-box:hover {
            border-color: #026142;
            background: #f0faf8;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(2, 97, 66, 0.1);
        }

        .support-box i {
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
            .help-content {
                font-size: 0.95rem;
            }

            .help-content h2 {
                font-size: 1.3rem;
            }

            .help-icon-box {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
@endsection

