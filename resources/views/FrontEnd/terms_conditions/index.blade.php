@extends('FrontEnd.master')
@section('title')
    Terms & Conditions
@endsection

@section('content')
    <!-- Hero Section Start -->
    <div class="bg-primary bg-gradient py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 text-white fw-bold mb-3">{{get_setting('site_name')->value ?? ''}}</h1>
                    <h4 class="text-white-50 mb-4">Terms & Conditions</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Terms & Conditions</li>
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
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-4 p-lg-5">
                        <div class="terms-content">
                            <div class="mb-4 pb-2 border-bottom">
                                <h2 class="h4 fw-bold mb-0 terms-heading">Our Terms & Conditions</h2>
                                <p class="text-muted small">Last updated: {{date('F d, Y')}}</p>
                            </div>
                            <div class="terms-text lh-lg">
                                @if(session()->get('language') == 'bangla')
                                    {!! nl2br($page->terms_bn) !!}
                                @else
                                    {!! nl2br($page->terms) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section End -->

    <style>
        .terms-text {
            color: #4a5568;
            font-size: 1.1rem;
        }
        .terms-heading {
            color: #026544;
        }
        .terms-text h1, .terms-text h2, .terms-text h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        .bg-gradient {
            background: linear-gradient(135deg, var(--bs-primary) 0%, #2c5282 100%);
        }
    </style>
@endsection

