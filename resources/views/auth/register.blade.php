@extends('FrontEnd.master')
@section('title')
    Register
@endsection
@section('content')

    <style>
        .register-container {
            background: linear-gradient(135deg, #f0faf8 0%, #ffffff 60%) !important;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .register-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            max-width: 1100px;
            margin: 0 auto;
            background-color: white !important;
            box-shadow: 0 12px 40px rgba(2, 97, 66, 0.08);
            border-radius: 20px;
            overflow: hidden;
        }

        .register-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, rgba(2, 97, 66, 0.08), rgba(1, 69, 42, 0.05)) !important;
            padding: 40px 30px;
            position: relative;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background: rgba(2, 97, 66, 0.05);
            border-radius: 50%;
        }

        .register-logo {
            width: 160px;
            max-width: 60%;
            margin-bottom: 18px;
            display: block;
            background-color: #01452a;
            padding: 10px;
            border-radius: 12px;
        }

        .register-title {
            margin-bottom: 8px;
            font-weight: 700;
            color: #026142;
            font-size: 26px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .register-text {
            font-size: 15px;
            margin-bottom: 16px;
            color: #555;
            max-width: 320px;
            line-height: 1.6;
        }

        .signin-btn {
            background: #026142;
            color: white;
            padding: 10px 26px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
            box-shadow: 0 8px 22px rgba(2, 97, 66, 0.12);
            transition: all 0.25s ease;
        }

        .signin-btn:hover {
            transform: translateY(-3px);
            background: #01452a;
            box-shadow: 0 12px 28px rgba(2, 97, 66, 0.16);
            color: white;
        }

        .register-right {
            padding: 36px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .register-right h2 {
            margin-bottom: 14px;
            font-size: 24px;
            font-weight: 700;
            color: #026142;
        }

        .form-grid {
            width: 100%;
            max-width: 520px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-grid .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-grid .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
            border: 2px solid #e6e9ee;
            background: #fbfdff;
            transition: all 0.25s ease;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #026142;
            box-shadow: 0 6px 18px rgba(2, 97, 66, 0.08);
            outline: none;
        }

        .password-hint {
            font-size: 13px;
            color: #6b7280;
        }

        .submit-btn {
            background: linear-gradient(90deg, #026142 0%, #01452a 100%) !important;
            color: #fff;
            padding: 12px 26px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            grid-column: 1 / -1;
            justify-self: center;
            margin-top: 6px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 22px rgba(2, 97, 66, 0.16);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(2, 97, 66, 0.18);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .text-danger {
            color: #dc3545;
            font-size: 13px;
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
            .form-grid {
                grid-template-columns: 1fr;
            }

            .register-right {
                padding: 24px;
            }

            .register-left {
                padding: 28px 20px;
            }

            .register-left::before {
                width: 200px;
                height: 200px;
                top: -30px;
                right: -30px;
            }
        }
    </style>

    <div class="register-container">
        <div class="register-grid">
            <div class="register-left">
                <img src="{{ asset(get_setting('site_logo')->value) }}" alt="Logo" class="register-logo">
                <h2 class="register-title">Welcome!</h2>
                <p class="register-text">To stay connected and get best offers, create your account with a few details.
                </p>
                <span style="color: #374151;">Already have an account?</span>
                <a href="{{ route('login') }}" class="signin-btn">Sign In</a>
            </div>

            <div class="register-right">
                <h2>Create Account</h2>
                <form method="POST" action="{{ route('register') }}" class="form-grid" novalidate>
                    @csrf

                    <div class="form-group full">
                        <label class="mb-1">Full Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="Enter your full name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Username <span class="text-danger">*</span></label>
                        <input class="form-control" name="username" placeholder="Choose username"
                            value="{{ old('username') }}">
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="your@email.com"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Phone <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone" placeholder="Phone number"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" placeholder="Create password"
                            autocomplete="new-password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label class="mb-1">Confirm Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirmation"
                            placeholder="Confirm password">
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