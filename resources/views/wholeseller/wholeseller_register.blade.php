@extends('FrontEnd.master')
@section('title')
    Register
@endsection
@section('content')

    <style>
        * {
            box-sizing: border-box;
        }

        .register-container {
            padding: 60px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white !important;
            box-shadow: 0 25px 70px rgba(2, 97, 66, 0.12);
            border-radius: 20px;
            overflow: hidden;
        }

        .register-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, #026142 0%, #034d38 100%) !important;
            padding: 60px 40px;
            color: white;
        }

        .register-logo {
            width: 160px;
            max-width: 100%;
            margin-bottom: 30px;
            display: block;
        }

        .register-title {
            margin-bottom: 16px;
            font-weight: 700;
            color: white;
            font-size: 32px;
            letter-spacing: -0.5px;
            text-transform: none;
        }

        .register-text {
            font-size: 16px;
            margin-bottom: 24px;
            color: rgba(255, 255, 255, 0.85);
            max-width: 340px;
            line-height: 1.8;
        }

        .signin-btn {
            background: white;
            color: #026142;
            padding: 12px 32px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-top: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .signin-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            color: #026142;
        }

        .register-right {
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .register-right h2 {
            margin-bottom: 8px;
            font-size: 28px;
            font-weight: 700;
            color: #026142;
        }

        .form-grid {
            width: 100%;
            max-width: 520px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 32px;
        }

        .form-grid .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-grid .form-group.full {
            grid-column: 1 / -1;
        }

        .form-grid .form-group label {
            font-weight: 600;
            color: #1f2937;
            font-size: 14px;
        }

        .form-control {
            padding: 13px 15px;
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            background: #f9fafb;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus {
            border-color: #026142;
            background: white;
            box-shadow: 0 0 0 4px rgba(2, 97, 66, 0.1);
            outline: none;
        }

        .form-control:hover {
            border-color: #d1d5db;
        }

        .text-danger {
            color: #dc2626;
            font-size: 13px;
            margin-top: 4px;
        }

        .password-hint {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #026142 0%, #034d38 100%) !important;
            color: #fff;
            padding: 14px 40px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 700;
            grid-column: 1 / -1;
            justify-self: center;
            margin-top: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(2, 97, 66, 0.2);
            font-size: 16px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(2, 97, 66, 0.3);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        @media (min-width: 768px) {
            
            .register-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .register-left .register-logo {
                max-width: 220px;
            }
        }

        @media (max-width: 767px) {
            .register-container {
                padding: 20px 10px;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }

            .register-right {
                padding: 32px 24px;
            }

            .register-left {
                padding: 40px 24px;
            }

            .register-title {
                font-size: 24px;
            }

            .register-right h2 {
                font-size: 24px;
            }
        }
    </style>

    <div class="register-container">
        <div class="register-grid">
            <div class="register-left">
                <img src="{{ asset(get_setting('site_logo')->value) }}" alt="Logo" class="register-logo">
                <h2 class="register-title">Welcome to Our Wholesale Community</h2>
                <p class="register-text">Join trusted retailers and wholesalers. Create your account to access exclusive wholesale benefits and offers.</p>
                <span style="color: rgba(255, 255, 255, 0.8); font-size: 15px;">Already have an account?</span>
                <a href="{{ route('login') }}" class="signin-btn">Sign In</a>
            </div>

            <div class="register-right">
                <h2>Create Your Account</h2>
                <form method="POST" action="{{ route('wholeseller.register.store') }}" class="form-grid" novalidate>
                    @csrf

                    <div class="form-group full">
                        <label class="mb-1">Full Name *</label>
                        <input class="form-control" type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Email *</label>
                        <input class="form-control" type="email" name="email" placeholder="your@email.com"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Phone *</label>
                        <input class="form-control" type="text" name="phone" placeholder="Phone number"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label class="mb-1">Address *</label>
                        <input class="form-control" type="text" name="address" placeholder="Business address"
                            value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Password *</label>
                        <input class="form-control" type="password" name="password" placeholder="Create password"
                            autocomplete="new-password">                       
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <p class="password-hint">Minimum 8 characters recommended</p>
                    </div>

                    <div class="form-group full">
                        <label class="mb-1">Confirm Password *</label>
                        <input class="form-control" type="password" name="password_confirmation"
                            placeholder="Confirm your password">
                    </div>

                    <button type="submit" class="submit-btn">Create Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.form-grid')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        // simple HTML5 validation fallback
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush