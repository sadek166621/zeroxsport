@extends('FrontEnd.master')
@section('title')
    Terms & Conditions
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Terms & Conditions</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Terms Content -->
    <div class="terms-section">
        <div class="container">
            <div class="terms-container">
                <div class="terms-header">
                    <h2>Our Terms & Conditions</h2>
                    <p>Last updated: {{date('F d, Y')}}</p>
                </div>

                <div class="terms-content">
                    @if(session()->get('language') == 'bangla')
                        {!! nl2br($page->terms_bn) !!}
                    @else
                        {!! nl2br($page->terms) !!}
                    @endif
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

        /* Terms Section */
        .terms-section {
            padding: 0 15px 60px;
        }

        .terms-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .terms-header {
            background-color: #006A4E;
            padding: 30px;
            border-bottom: 3px solid #005a41;
        }

        .terms-header h2 {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .terms-header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 0.9rem;
        }

        .terms-content {
            padding: 40px;
            color: #333;
            font-size: 1rem;
            line-height: 1.7;
        }

        .terms-content h1,
        .terms-content h2,
        .terms-content h3,
        .terms-content h4,
        .terms-content h5,
        .terms-content h6 {
            color: #006A4E;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .terms-content h1 { font-size: 1.6rem; }
        .terms-content h2 { font-size: 1.4rem; }
        .terms-content h3 { font-size: 1.2rem; }
        .terms-content h4 { font-size: 1.1rem; }

        .terms-content p {
            margin-bottom: 1rem;
            color: #555;
        }

        .terms-content ul,
        .terms-content ol {
            margin-bottom: 1.5rem;
            padding-left: 30px;
        }

        .terms-content li {
            margin-bottom: 0.5rem;
            color: #555;
        }

        .terms-content a {
            color: #006A4E;
            text-decoration: underline;
        }

        .terms-content a:hover {
            color: #005a41;
        }

        .terms-content strong {
            color: #333;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 30px 0;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .terms-header {
                padding: 20px;
            }

            .terms-header h2 {
                font-size: 1.3rem;
            }

            .terms-content {
                padding: 25px 20px;
                font-size: 0.95rem;
            }

            .terms-content h2 {
                font-size: 1.2rem;
            }
        }
    </style>
@endsection