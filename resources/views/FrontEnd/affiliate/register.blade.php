@extends('FrontEnd.master')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #f3e9f7 100%);
        min-height: 100vh;
    }

    .navbar {
        display: none !important;
    }

    .affiliate-header {
        background: #fff;
        border-radius: 1.25rem;
        box-shadow: 0 4px 24px rgba(57, 63, 129, 0.08);
        padding: 1.5rem 2rem;
    }

    .affiliate-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 8px 32px rgba(57, 63, 129, 0.10);
        background: #fff;
        overflow: hidden;
        transition: box-shadow 0.2s;
    }

    .affiliate-card:hover {
        box-shadow: 0 12px 40px rgba(57, 63, 129, 0.14);
    }

    .affiliate-img {
        object-fit: cover;
        height: 100%;
        min-height: 370px;
        border-radius: 1.5rem 0 0 1.5rem;
        filter: brightness(0.97);
        transition: filter 0.2s;
    }

    .affiliate-img:hover {
        filter: brightness(1);
    }

    .form-label {
        color: #22223b;
        font-weight: 600;
        margin-bottom: 0.25rem;
        letter-spacing: 0.02em;
    }

    .form-control {
        background: #f7f7fa;
        border: 1.5px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 1.05rem;
        padding: 0.85rem 1.1rem;
        transition: border-color 0.2s, background 0.2s;
        box-shadow: 0 1px 2px rgba(57, 63, 129, 0.03);
    }

    .form-control:focus {
        border-color: #ef8848;
        background: #fff;
        box-shadow: 0 2px 8px rgba(239, 136, 72, 0.08);
    }

    .btn-warning {
        background: linear-gradient(90deg, #ef8848 0%, #ffb86c 100%);
        border: none;
        color: #fff;
        font-weight: 700;
        border-radius: 0.75rem;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(239, 136, 72, 0.10);
        letter-spacing: 0.03em;
    }

    .btn-warning:hover,
    .btn-warning:focus {
        background: linear-gradient(90deg, #ffb86c 0%, #ef8848 100%);
        color: #fff;
        box-shadow: 0 4px 16px rgba(239, 136, 72, 0.13);
    }

    .btn-outline-warning {
        border: 1.5px solid #ef8848;
        color: #ef8848;
        background: #fff;
        font-weight: 600;
        border-radius: 0.75rem;
        transition: background 0.2s, color 0.2s, border-color 0.2s;
    }

    .btn-outline-warning:hover,
    .btn-outline-warning:focus {
        background: #ef8848;
        color: #fff;
        border-color: #ef8848;
    }

    .affiliate-title {
        color: #22223b;
        font-weight: 800;
        margin-bottom: 1.5rem;
        font-size: 2rem;
        letter-spacing: 0.5px;
    }

    .affiliate-link {
        color: #ef8848 !important;
        font-weight: 600;
        text-decoration: underline;
        transition: color 0.2s;
    }

    .affiliate-link:hover {
        color: #393f81 !important;
    }

    .alert-success {
        border-radius: 0.75rem;
        font-size: 1.05rem;
        margin-bottom: 1.5rem;
        background: #f0fdf4;
        color: #166534;
        border: 1.5px solid #bbf7d0;
        font-weight: 600;
    }

    .card-body {
        padding: 2.5rem 2.5rem 2rem 2.5rem;
    }

    .position-relative {
        /* Ensure relative context for absolute positioning */
        position: relative;
    }

    .position-relative .btn-link {
        color: #ef8848;
        font-size: 1.1rem;
        padding: 0;
        background: none;
        border: none;
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        height: 2.2rem;
        width: 2.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }

    .position-relative .btn-link i {
        pointer-events: none;
        font-size: 1.2rem;
    }

    /* Responsive Styles */
    @media (max-width: 991.98px) {
        .affiliate-img {
            min-height: 180px;
        }

        .card-body {
            padding: 1.5rem 1rem 1rem 1rem;
        }

        .affiliate-header {
            padding: 1.2rem 1rem;
        }
    }

    @media (max-width: 767.98px) {
        .affiliate-card {
            border-radius: 1rem;
        }

        .affiliate-img {
            border-radius: 1rem 1rem 0 0;
            height: 120px;
            min-height: unset;
        }

        .card-body {
            padding: 1rem 0.5rem 0.5rem 0.5rem;
        }

        .affiliate-title {
            font-size: 1.3rem;
        }
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

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="card affiliate-card">
                    <div class="row g-0">
                        <div class="col-md-5 d-none d-md-block">
                            <img src="{{ asset('FrontEnd/assect/img/affiliate.png') }}" alt="Affiliate"
                                class="img-fluid affiliate-img">
                        </div>
                        <div class="col-md-7 d-flex align-items-center">
                            <div class="card-body">
                               @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                
                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <h3 class="affiliate-title text-center text-md-start">
                                    Create your affiliate account
                                </h3>

                                <form method="POST" action="{{ route('register.affiliate.store') }}" enctype="multipart/form-data"
                                    novalidate>
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Your full name" />
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="e.g. 017XXXXXXXX" />
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="you@email.com" />
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="affiliate_code" class="form-label">Affiliate Code</label>
                                            <input type="text" id="affiliate_code" name="affiliate_code" value="{{ old('affiliate_code') }}"
                                                class="form-control @error('affiliate_code') is-invalid @enderror"
                                                placeholder="Choose a code" />
                                            @error('affiliate_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 position-relative">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Create a password" />
                                            <button type="button" id="toggle-password"
                                                class="btn btn-sm btn-link position-absolute"
                                                style="z-index:10; right:0.75rem; top:60px; transform:translateY(-50%);" tabindex="0" aria-label="Show/Hide password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-6 position-relative">
                                            <label for="password_confirmation" class="form-label">ReType Password</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control" placeholder="Repeat password" />
                                            <button type="button" id="toggle-password-confirm"
                                                class="btn btn-sm btn-link position-absolute"
                                                style="z-index:10; right:0.75rem; top:60px; transform:translateY(-50%);" tabindex="0" aria-label="Show/Hide confirm password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <label for="profile_image" class="form-label">Profile Image</label>
                                            <input type="file" id="profile_image" name="profile_image"
                                                class="form-control @error('profile_image') is-invalid @enderror" />
                                            @error('profile_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning w-100 py-2"
                                                style="font-size: 1.08rem;">
                                                <i class="fas fa-user-plus me-2"></i> Signup
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center text-md-start">
                                        <p class="mb-0" style="color: #22223b;">
                                            Already have an account?
                                            <a href="{{ route('login.affiliate') }}" class="affiliate-link">
                                                Log in
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    function setupPasswordToggle(inputId, btnId) {
        const btn = document.getElementById(btnId);
        const input = document.getElementById(inputId);
        btn.addEventListener('click', () => {
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    }
    setupPasswordToggle('password', 'toggle-password');
    setupPasswordToggle('password_confirmation', 'toggle-password-confirm');
</script>
@endpush