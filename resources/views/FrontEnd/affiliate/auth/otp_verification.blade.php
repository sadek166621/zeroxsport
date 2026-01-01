@extends('FrontEnd.master')

@section('title', 'Affiliate Verify OTP')

@section('content')
<main class="main pages">
    <section class="otp-section" style="padding:100px 0; background:#f9fafb; min-height:90vh; display:flex; align-items:center;">
        <div class="container">
            <div class="otp-card" style="max-width:420px; margin:0 auto; background:#fff; border-radius:16px; box-shadow:0 8px 32px rgba(31,38,135,0.15);">
                <div class="card-body text-center" style="padding:40px 36px;">
                    <h2 class="otp-title" style="font-size:24px; font-weight:700; color:#222; margin-bottom:20px;">
                        Affiliate Verify OTP
                    </h2>
                    <p class="otp-desc" style="color:#6b7280; margin-bottom:25px;">
                        Enter the OTP sent to your affiliate registered mobile number.
                    </p>

                    @if (session('error'))
                            <div class="text-danger fw-bold">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="text-success fw-bold">
                                {{ session('success') }}
                            </div>
                        @endif

                    <form method="POST" action="{{ route('affiliate.otp.verify.reset.password') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="otp" placeholder="Enter OTP *" value="{{ old('otp') }}" required autofocus
                                class="form-control full"
                                style="width:100%; height:50px; border-radius:10px; padding:12px 14px; border:1px solid #dce1eb; font-size:15px;">
                            @error('otp')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" placeholder="New Password *" required class="form-control full">
                            @error('password')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password *" required class="form-control full">
                            @error('password_confirmation')
                                <div class="text-danger fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-2">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection