@extends('wholeseller.wholeseller-master')

@section('wholeseller_body')
    <style>
        .password-container {
            background-color: #f8f9fa;
            width: 100%;
        }

        .password-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
            margin: 0 auto;
        }


        .card-header {
            background: #13B262;
            padding: 25px;
            border: none;
        }

        .card-header h5 {
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin: 0;
            text-transform: uppercase;
        }



        .form-label {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-control {
            height: 54px;
            border-radius: 12px;
            border: 2px solid #e1e1e1;
            padding: 0 20px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: #13B262;
            box-shadow: 0 0 0 3px rgba(216, 63, 38, 0.1);
            background-color: white;
        }

        .password-requirements {
            font-size: 13px;
            color: #6c757d;
            margin-top: 5px;
        }

        .update-btn {
            background: #13B262;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .update-btn:hover {
            background: #13B262;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(216, 63, 38, 0.2);
        }

        .back-link {
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link:hover {
            color: #13B262;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .text-danger {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .card-body {
            padding: 20px;
        }
    </style>

    <div class="password-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="password-card">
                    <div class="card-header text-white text-left">
                        <h5 class="mb-0 text-white">Change Password</h5>
                    </div>
                    <div class="card-body">
                        {{-- Flash Message --}}
                        @if (session('message'))
                            <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show"
                                role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('wholeseller.update.password') }}">
                            @csrf

                            {{-- Old Password --}}
                            <div class="mb-4">
                                <label for="oldpassword" class="form-label">
                                    <i class="bi bi-lock-fill me-2"></i>Current Password
                                </label>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control"
                                    placeholder="Enter your current password" required>
                                @error('oldpassword')
                                    <small class="text-danger">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{-- New Password --}}
                            <div class="mb-4">
                                <label for="newpassword" class="form-label">
                                    <i class="bi bi-shield-lock-fill me-2"></i>New Password
                                </label>
                                <input type="password" name="newpassword" id="newpassword" class="form-control"
                                    placeholder="Enter a new password" required minlength="6">
                                <div class="password-requirements">
                                    <i class="bi bi-info-circle me-1"></i>Password must be at least 6 characters long
                                </div>
                                @error('newpassword')
                                    <small class="text-danger">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">
                                    <i class="bi bi-check-circle-fill me-2"></i>Confirm Password
                                </label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                    placeholder="Re-enter new password" required>
                                @error('confirm_password')
                                    <small class="text-danger">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid mt-5">
                                <button type="submit" class="update-btn">
                                    <i class="bi bi-shield-check me-2"></i>Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @include('wholeseller.cart-container')
@endsection