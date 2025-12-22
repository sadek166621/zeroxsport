@extends('FrontEnd.master')

@section('title', 'Forgot Password')

@section('content')
<main class="main pages">
    <style>
        /* Forgot Password - Modern Design */
        .forgot-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f6f9ff, #ffffff);
            min-height: 90vh;
            display: flex;
            align-items: center;
        }

        .forgot-card {
            max-width: 520px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .forgot-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 36px rgba(31, 38, 135, 0.2);
        }

        .forgot-card .card-body {
            padding: 40px 36px;
        }

        .forgot-illustration {
            display: block;
            max-width: 140px;
            margin: 0 auto 24px;

        }

        .forgot-title {
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            color: #222;
            margin-bottom: 10px;
        }

        .forgot-desc {
            text-align: center;
            color: #6b7280;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .form-control.full {
            width: 100%;
            height: 50px;
            border-radius: 10px;
            padding: 12px 14px;
            border: 1px solid #dce1eb;
            font-size: 15px;
            transition: all 0.2s ease-in-out;
        }

        .form-control.full:focus {
            border-color: #13B262;
            box-shadow: 0 0 0 3px rgba(19, 178, 98, 0.15);
        }

        .btn-green-wide {
            background: #13B262;
            border-color: #13B262;
            color: #fff;
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-green-wide:hover {
            background: #0e8f51;
            border-color: #0e8f51;
            color: #fff;
            transform: translateY(-2px);
        }

        .helper-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .helper-links a {
            color: #13B262;
            font-weight: 500;
        }

        .helper-links a:hover {
            text-decoration: underline;
        }

        .alert-custom {
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 16px;
            font-size: 15px;
        }

        @media (max-width: 576px) {
            .forgot-section {
                padding: 60px 0;
            }
            .forgot-card .card-body {
                padding: 26px 22px;
            }
        }
    </style>

    <section class="forgot-section">
        <div class="container">
            <div class="forgot-card">
                <div class="card-body text-center">
                    <img class="forgot-illustration" src="{{ asset('FrontEnd/img/forgot_password.svg') }}" alt="Forgot password">

                    <h2 class="forgot-title">Forgot your password?</h2>
                    <p class="forgot-desc">Enter the email address associated with your account and we'll send you a link to reset your password.</p>

                    @if (session('status'))
                        <div class="alert alert-success alert-custom">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-custom">
                            <ul class="mb-0 text-start">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="text-start">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email" class="form-control full" />
                        </div>

                        <button type="submit" class="btn btn-green-wide mt-2">Send reset link</button>
                    </form>

                    <div class="helper-links mt-4">
                        <a href="{{ route('login') }}">← Back to login</a>
                        <a href="{{ url('/') }}">Return to home →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection