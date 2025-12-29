@extends('FrontEnd.master')

@section('content')
<style>
    .navbar {
        display: none !important;
    }

    .affiliate-header {
        background: white;
        border-radius: 1.25rem;
        box-shadow: 0 10px 24px rgba(57, 63, 129, 0.08);
        padding: 1.5rem 2rem;
    }
</style>
<section class="affiliate-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <a href="{{ route('affiliate') }}">
                <img src="{{ asset(get_setting('site_logo')->value) }}" class="logo header-logo" alt="Logo"
                    style="width: 110px; height: auto;" />
            </a>
            <!-- <div class="d-flex align-items-center gap-2">
                <a href="{{ route('affiliate') }}"
                    class="btn btn-outline-warning d-sm-none d-inline-block px-3 py-1"
                    style="font-size: 16px;">Affiliate Account</a>
                <a href="{{ route('login.affiliate') }}"
                    class="btn btn-outline-warning d-none d-sm-inline-block px-4 py-2"
                    style="font-size: 18px;">Affiliate Login</a>
                <a href="#"
                    class="btn btn-warning d-none d-sm-inline-block px-4 py-2"
                    style="font-size: 18px;">Register</a>
            </div> -->
        </div>
    </div>
</section>
<section class="py-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-lg-10">
                <div class="row g-0 shadow-lg rounded-4 overflow-hidden">
                    <!-- Image Side -->
                    <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center" style="background: #393f81;">
                        <img src="{{ asset('FrontEnd/assect/img/affiliate.png') }}" alt="Affiliate" class="img-fluid" style="max-height: 400px;">
                    </div>
                    <!-- Form Side -->
                    <div class="col-md-6 bg-white p-4">
                        <div class="card border-0 bg-transparent p-0">
                            <div class="text-center mb-4">
                                <a href="/">
                                    <img src="{{ asset(get_setting('site_logo')->value) }}" class="mb-3" style="max-width: 120px;" alt="Logo" />
                                </a>
                                <h2 class="fw-bold mb-2" style="letter-spacing: 1px; color: #393f81;">Affiliate Login</h2>
                                <p class="text-muted mb-0">Sign in to your affiliate account</p>
                            </div>
                            {{-- Display general success or error messages --}}
                            @if (session('status'))
                            <div class="alert alert-success fw-bold" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger fw-bold" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('login.affiliate.submit') }}" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                        class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror" placeholder="Enter your email" />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" id="password" name="password" required autocomplete="current-password"
                                        class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror" placeholder="Enter your password" />
                                    <button type="button" id="toggle-password" class="btn btn-sm btn-link position-absolute  translate-middle-y pe-2" style="top:65px; right:0; z-index:10;">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('affiliate.password.request'))
                                    <a class="fw-bold" style="color: #EF8848 !important;" href="{{ route('affiliate.password.request') }}">
                                        Forgot Password?
                                    </a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-warning w-100 fw-semibold py-2" style="font-size: 18px;">
                                    Login
                                </button>
                            </form>
                            <div class="mt-4 text-center">
                                <p class="mb-0" style="color: #393f81;">
                                    Don't have an affiliate account?
                                    <a href="{{ route('register.affiliate') }}" class="fw-bold" style="color: #EF8848 !important;">
                                        Register now
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Side -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordBtn = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        if (togglePasswordBtn && passwordInput) {
            togglePasswordBtn.addEventListener('click', () => {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    togglePasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        }
    });
</script>
@endpush