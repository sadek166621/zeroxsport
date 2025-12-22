@extends('FrontEnd.master')

@section('title', 'Reset Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Reset Password') }}</h4>
                </div>
                <div class="card-body p-4">

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" name="email" class="form-control"
                                   value="{{ old('email', $request->email) }}" required autofocus>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('New Password') }}</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('login') }}">{{ __('Back to Login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection