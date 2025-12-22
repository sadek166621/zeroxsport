@extends('FrontEnd.master')

@section('title', 'Verify Email')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Verify Your Email Address') }}</h4>
                </div>

                <div class="card-body p-4">
                    <p class="text-muted mb-4">
                        {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you. If you didn’t receive the email, we can send you another.') }}
                    </p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success mb-4">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <!-- Resend Verification Email -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger text-decoration-none">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection