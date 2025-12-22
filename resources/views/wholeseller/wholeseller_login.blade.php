@extends('FrontEnd.master')
@section('content')
    @section('title')
        Login
    @endsection

    <style>
        .login-container {
            background-color: #f8f9fa;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            border-radius: 20px;
            overflow: hidden;
        }

        .login-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 40px 20px;
            position: relative;
        }

        .login-left img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .login-left::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, #dee2e6, transparent);
        }

        .login-title {
            margin-bottom: 25px;
            font-weight: 700;
            color: #D83F26;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
        }

        .login-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60%;
            height: 3px;
            background: #D83F26;
            border-radius: 2px;
        }

        .login-text {
            font-size: 16px;
            margin-bottom: 25px;
            text-align: center;
            max-width: 320px;
            color: #495057;
            line-height: 1.6;
        }

        .signup-btn {
            background: #D83F26;
            color: white;
            padding: 14px 35px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 12px rgba(216, 63, 38, 0.2);
        }

        .signup-btn:hover {
            background: #c43520;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(216, 63, 38, 0.3);
            color: white;
        }

        .login-right {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .form-input {
            width: 100%;
            height: 54px;
            border-radius: 12px;
            padding: 0 20px;
            margin-bottom: 20px;
            border: 2px solid #e1e1e1;
            transition: all 0.3s ease;
            font-size: 15px;
            background-color: #f8f9fa;
        }

        .form-input:focus {
            border-color: #D83F26;
            box-shadow: 0 0 0 3px rgba(216, 63, 38, 0.1);
            outline: none;
            background-color: white;
        }

        .form-label {
            color: #495057;
            font-size: 15px;
            margin-bottom: 8px;
            display: block;
        }

        .form-label span {
            color: #D83F26;
        }

        .login-btn {
            background: #D83F26;
            border: none;
            color: white;
            border-radius: 12px;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 200px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(216, 63, 38, 0.2);
            margin: 20px 0;
        }

        .login-btn:hover {
            background: #c43520;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(216, 63, 38, 0.3);
        }

        .form-check-input:checked {
            background-color: #D83F26;
            border-color: #D83F26;
        }

        .form-check-label {
            color: #495057;
            cursor: pointer;
        }

        .forgot-password {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 14px;
        }

        .forgot-password:hover {
            color: #D83F26;
            text-decoration: underline;
        }

        @media (min-width: 768px) {
            .login-container {
                padding: 60px;
            }

            .login-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .login-title {
                font-size: 32px;
            }

            .login-form {
                padding: 40px;
            }
        }

        @media (max-width: 767px) {
            .login-left {
                padding: 30px 20px;
            }

            .login-left img {
                max-width: 80%;
            }

            .login-right {
                padding: 30px 20px;
            }

            .login-title {
                font-size: 24px;
            }

            .login-form {
                padding: 20px;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-grid">
            <div class="login-left">
                <img src="{{ asset('FrontEnd/img/login-image.png') }}" alt="Wholeseller illustration">
                <h2 class="login-title">Welcome Wholesellers!</h2>
                <p class="login-text">Access your wholesale account to manage your business, track orders, and grow your partnership with us.</p>
            </div>

            <div class="login-right">
                <h2 class="login-title">Wholeseller Portal</h2>
                <form class="login-form" method="POST" action="{{ route('wholeseller.login.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Business Email <span>*</span></label>
                        <input type="email" class="form-input" name="email" 
                               placeholder="your.business@company.com"
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password <span>*</span></label>
                        <input type="password" class="form-input" name="password" 
                               placeholder="Enter your password" required>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                            </div>
                            <a href="#" class="forgot-password">Forgot password?</a>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center gap-3">
                        <button type="submit" class="login-btn">
                            Sign In
                        </button>
                        <div class="text-center">
                            <span class="text-muted">New to our wholesale program?</span>
                            <a href="{{ route('wholeseller.register') }}" class="signup-btn ms-2">Register Now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection