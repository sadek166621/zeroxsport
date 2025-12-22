@extends('FrontEnd.master')

@section('title', 'Confirm Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Confirm Password') }}</h4>
                </div>
                <div class="card-body p-4">

                    <p class="text-muted mb-4">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </p>

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

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password"
                                   class="form-control" required autocomplete="current-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm') }}
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