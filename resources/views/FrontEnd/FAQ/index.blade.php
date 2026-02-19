@extends('FrontEnd.master')
@section('title')
    FAQ
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Frequently Asked Questions</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- FAQ Content -->
    <div class="faq-section">
        <div class="container">
            <div class="faq-container">
                <div class="faq-header">
                    <h2>Frequently Asked Questions</h2>
                    <p>Find answers to common questions about our products and services</p>
                </div>

                <div class="faq-content">
                    @if(session()->get('language') == 'bangla')
                        {!! nl2br($page->faq_bn) !!}
                    @else
                        {!! nl2br($page->faq) !!}
                    @endif
                </div>
            </div>

            <!-- Help Boxes -->
            <div class="help-boxes">
                <div class="help-box">
                    <div class="help-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Shipping & Delivery</h3>
                    <p>Learn about our shipping options and delivery times.</p>
                </div>
                <div class="help-box">
                    <div class="help-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h3>Returns & Refunds</h3>
                    <p>Understand our return policy and refund process.</p>
                </div>
                <div class="help-box">
                    <div class="help-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Payment Security</h3>
                    <p>Your payment information is safe and secure.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Page Header */
        .page-header {
            background-color: #006A4E !important;
            padding: 40px 0;
            margin-bottom: 50px;
        }

        .page-header h1 {
            color: white;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        /* FAQ Section */
        .faq-section {
            padding: 0 15px 60px;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto 50px;
            background: white;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .faq-header {
            background-color: #006A4E;
            padding: 30px;
            border-bottom: 3px solid #005a41;
        }

        .faq-header h2 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .faq-header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 0.95rem;
        }

        .faq-content {
            padding: 40px;
            color: #333;
            font-size: 1rem;
            line-height: 1.7;
        }

        .faq-content h1,
        .faq-content h2,
        .faq-content h3,
        .faq-content h4,
        .faq-content h5,
        .faq-content h6 {
            color: #006A4E;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .faq-content h1 { font-size: 1.6rem; }
        .faq-content h2 { font-size: 1.4rem; }
        .faq-content h3 { font-size: 1.2rem; }
        .faq-content h4 { font-size: 1.1rem; }

        .faq-content p {
            margin-bottom: 1rem;
            color: #555;
        }

        .faq-content ul,
        .faq-content ol {
            margin-bottom: 1.5rem;
            padding-left: 30px;
        }

        .faq-content li {
            margin-bottom: 0.5rem;
            color: #555;
        }

        .faq-content a {
            color: #006A4E;
            text-decoration: underline;
        }

        .faq-content a:hover {
            color: #005a41;
        }

        /* Help Boxes */
        .help-boxes {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .help-box {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 30px 20px;
            text-align: center;
        }

        .help-icon {
            width: 60px;
            height: 60px;
            background-color: #006A4E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .help-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .help-box h3 {
            color: #006A4E;
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .help-box p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.5;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 30px 0;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .faq-header {
                padding: 20px;
            }

            .faq-header h2 {
                font-size: 1.3rem;
            }

            .faq-content {
                padding: 25px 20px;
                font-size: 0.95rem;
            }

            .faq-content h2 {
                font-size: 1.2rem;
            }

            .help-boxes {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .help-box {
                padding: 25px 15px;
            }
        }
    </style>
@endsection