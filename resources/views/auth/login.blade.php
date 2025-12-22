
@extends('FrontEnd.master')
@section('content')
    @section('title')
        Login
    @endsection

    <style>
        .login-container {
            background: linear-gradient(180deg, #f3f7fb 0%, #ffffff 60%);
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
            box-shadow: 0 12px 30px rgba(13, 38, 59, 0.08);
            border-radius: 18px;
            overflow: hidden;
        }

        .login-left {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, rgba(216,63,38,0.06), rgba(74,144,226,0.04));
            padding: 40px 20px;
            position: relative;
        }

        .login-left .hero {
            width: 100%;
            max-width: 520px;
            height: 320px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-bottom: 22px;
        }

        .login-left .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }

        .login-left .hero img:hover {
            transform: scale(1.03);
        }

        .login-title {
            margin-bottom: 18px;
            font-weight: 600;
            color: #D83F26;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .login-text {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
            max-width: 360px;
            color: #555;
            line-height: 1.6;
        }

        .signup-btn {
            background: #D83F26;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 18px;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            box-shadow: 0 6px 18px rgba(216, 63, 38, 0.18);
        }

        .signup-btn:hover {
            background: #c43520;
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(216, 63, 38, 0.22);
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
        }

        .form-input {
            width: 100%;
            height: 54px;
            border-radius: 12px;
            padding: 0 20px;
            margin-bottom: 18px;
            border: 1px solid #e6e9ee;
            transition: all 0.25s ease;
            font-size: 15px;
            background: #fbfdff;
        }

        .form-input:focus {
            border-color: #D83F26;
            box-shadow: 0 6px 18px rgba(216, 63, 38, 0.06);
            outline: none;
        }

        .login-btn {
            background: linear-gradient(90deg, #D83F26 0%, #D95B3F 100%);
            border: none;
            color: white;
            border-radius: 12px;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.25s ease;
            width: 100%;
            max-width: 220px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 22px rgba(216, 63, 38, 0.16);
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(216, 63, 38, 0.18);
        }

        .form-check-input:checked {
            background-color: #D83F26;
            border-color: #D83F26;
        }

        .form-label {
            color: #333;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .btn-primary {
            background: #4a90e2;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px rgba(74, 144, 226, 0.12);
            color: #fff;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: #357abd;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(74, 144, 226, 0.16);
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
                padding: 0 20px;
            }
        }

        @media (max-width: 767px) {
            .login-left .hero {
                max-width: 80%;
                height: 220px;
            }

            .login-right {
                padding: 30px 20px;
            }

            .login-title {
                font-size: 24px;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-grid">
            <div class="login-left">
                <div class="hero" aria-hidden="true">
                    <img
                        src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1350&q=80"
                        alt="Stylish workspace and user onboarding illustration">
                </div>
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-text">Sign in to access your account and explore our services. Secure, fast and designed
                    for productivity.</p>
              
            </div>

            <div class="login-right">
                <h2 class="login-title">Login</h2>
                {{-- <a href="{{ route('wholeseller.login') }}" class="btn btn-primary">
                    <i class="fas fa-store me-2"></i>Go to Wholeseller Login
                </a> --}}
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-input" name="email" placeholder="Enter your email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger mt-2" style="font-size: 14px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-input" name="password" placeholder="Enter your password"
                            required>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #D83F26;">Forgot password?</a>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center gap-3">
                        <button type="submit" class="login-btn">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                        <div class="text-center mt-3">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="{{ route('register') }}" class=" ms-2">Create Account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection