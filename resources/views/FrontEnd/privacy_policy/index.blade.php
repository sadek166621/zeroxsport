@extends('FrontEnd.master')
@section('title')
    Privacy Policy
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Privacy Policy</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Privacy Content -->
    <div class="privacy-section">
        <div class="container">
            <div class="privacy-container">
                <div class="privacy-header">
                    <h2>Your Privacy Matters</h2>
                    <p>Last updated: {{date('F d, Y')}}</p>
                </div>

                <div class="privacy-content">
                    @if(session()->get('language') == 'bangla')
                        {!! nl2br($page->privacy_bn) !!}
                    @else
                        {!! nl2br($page->privacy) !!}
                    @endif
                </div>
            </div>

            <!-- Info Boxes -->
            <div class="info-boxes">
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Secure & Protected</h3>
                    <p>Your data is encrypted and protected with industry-standard security.</p>
                </div>
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <h3>Privacy First</h3>
                    <p>We respect your privacy and never share your information without consent.</p>
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

        /* Privacy Section */
        .privacy-section {
            padding: 0 15px 60px;
        }

        .privacy-container {
            max-width: 900px;
            margin: 0 auto 50px;
            background: white;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .privacy-header {
            background-color: #006A4E;
            padding: 30px;
            border-bottom: 3px solid #005a41;
        }

        .privacy-header h2 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .privacy-header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 0.9rem;
        }

        .privacy-content {
            padding: 40px;
            color: #333;
            font-size: 1rem;
            line-height: 1.7;
        }

        .privacy-content h1,
        .privacy-content h2,
        .privacy-content h3,
        .privacy-content h4,
        .privacy-content h5,
        .privacy-content h6 {
            color: #006A4E;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .privacy-content h1 { font-size: 1.6rem; }
        .privacy-content h2 { font-size: 1.4rem; }
        .privacy-content h3 { font-size: 1.2rem; }
        .privacy-content h4 { font-size: 1.1rem; }

        .privacy-content p {
            margin-bottom: 1rem;
            color: #555;
        }

        .privacy-content ul,
        .privacy-content ol {
            margin-bottom: 1.5rem;
            padding-left: 30px;
        }

        .privacy-content li {
            margin-bottom: 0.5rem;
            color: #555;
        }

        .privacy-content a {
            color: #006A4E;
            text-decoration: underline;
        }

        .privacy-content a:hover {
            color: #005a41;
        }

        .privacy-content strong {
            color: #333;
        }

        /* Info Boxes */
        .info-boxes {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-box {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 30px 20px;
            text-align: center;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background-color: #006A4E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .info-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .info-box h3 {
            color: #006A4E;
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .info-box p {
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

            .privacy-header {
                padding: 20px;
            }

            .privacy-header h2 {
                font-size: 1.3rem;
            }

            .privacy-content {
                padding: 25px 20px;
                font-size: 0.95rem;
            }

            .privacy-content h2 {
                font-size: 1.2rem;
            }

            .info-boxes {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .info-box {
                padding: 25px 15px;
            }
        }
    </style>
@endsection