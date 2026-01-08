@extends('customer.master')
@section('title')
Change Password | Dashboard
@endsection
@section('content')

<div class="content-header">
    <h2>Change Password</h2>
    <p>Update your account password</p>
</div>

<div class="password-form">
    <form action="{{ route('user-passwordupdate') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-12">
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="oldpassword" required>
                    @error('oldpassword')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword" required>
                    @error('newpassword')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                    @error('confirm_password')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-key me-2"></i>Update Password
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    :root {
        --primary: #026142;
        --primary-dark: #014d34;
        --border-color: #e5e7eb;
        --dark: #111827;
        --transition: all 0.3s ease;
    }

    .password-form {
        max-width: 500px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-control {
        border: 1.5px solid var(--border-color);
        border-radius: 0.875rem;
        padding: 0.95rem 1.25rem;
        font-size: 0.95rem;
        transition: var(--transition);
        background: white;
        width: 100%;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(2, 97, 66, 0.1);
        outline: none;
    }

    .btn {
        padding: 0.95rem 2rem;
        border-radius: 0.875rem;
        font-weight: 600;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        color: white;
    }

    .text-danger {
        color: #ef4444;
        display: block;
        margin-top: 0.5rem;
    }

    @media (max-width: 576px) {
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

@endsection
