@extends('FrontEnd.master')
@section('title')
    Get Help
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Get Help</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Get Help</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Help Content -->
    <div class="help-section">
        <div class="container">
            <div class="help-container">
                <div class="help-header">
                    <h2>We're Here to Help</h2>
                    <p>Find answers to your questions and get support</p>
                </div>

                <div class="help-content">
                    @if(session()->get('language') == 'bangla')
                        {!! nl2br($page->help_bn) !!}
                    @else
                        {!! nl2br($page->help) !!}
                    @endif
                </div>
            </div>

            <!-- Support Boxes -->
            <div class="support-boxes">
                <div class="support-box">
                    <div class="support-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Customer Support</h3>
                    <p>Reach out to our friendly support team for immediate assistance.</p>
                </div>
                <div class="support-box">
                    <div class="support-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>Documentation</h3>
                    <p>Browse our comprehensive guides and tutorials for detailed information.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Page Header */
        .page-header {
            background-color: #006A4E;
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

        /* Help Section */
        .help-section {
            padding: 0 15px 60px;
        }

        .help-container {
            max-width: 900px;
            margin: 0 auto 50px;
            background: white;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .help-header {
            background-color: #006A4E;
            padding: 30px;
            border-bottom: 3px solid #005a41;
        }

        .help-header h2 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .help-header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 0.95rem;
        }

        .help-content {
            padding: 40px;
            color: #333;
            font-size: 1rem;
            line-height: 1.7;
        }

        .help-content h1,
        .help-content h2,
        .help-content h3,
        .help-content h4,
        .help-content h5,
        .help-content h6 {
            color: #006A4E;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .help-content h1 { font-size: 1.6rem; }
        .help-content h2 { font-size: 1.4rem; }
        .help-content h3 { font-size: 1.2rem; }
        .help-content h4 { font-size: 1.1rem; }

        .help-content p {
            margin-bottom: 1rem;
            color: #555;
        }

        .help-content ul,
        .help-content ol {
            margin-bottom: 1.5rem;
            padding-left: 30px;
        }

        .help-content li {
            margin-bottom: 0.5rem;
            color: #555;
        }

        .help-content a {
            color: #006A4E;
            text-decoration: underline;
        }

        .help-content a:hover {
            color: #005a41;
        }

        .help-content strong {
            color: #333;
        }

        /* Support Boxes */
        .support-boxes {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .support-box {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 30px 20px;
            text-align: center;
        }

        .support-icon {
            width: 60px;
            height: 60px;
            background-color: #006A4E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .support-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .support-box h3 {
            color: #006A4E;
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .support-box p {
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

            .help-header {
                padding: 20px;
            }

            .help-header h2 {
                font-size: 1.3rem;
            }

            .help-content {
                padding: 25px 20px;
                font-size: 0.95rem;
            }

            .help-content h2 {
                font-size: 1.2rem;
            }

            .support-boxes {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .support-box {
                padding: 25px 15px;
            }
        }
    </style>
@endsection