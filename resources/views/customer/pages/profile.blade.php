@extends('customer.master')
@section('title')
Profile Details | Dashboard
@endsection
@section('content')

<div class="content-header">
    <h2>Profile Details</h2>
    <p>Manage your account information</p>
</div>

<div class="profile-form">
    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="profile-image-section mb-5">
            <div class="profile-image-container">
                <div class="profile-image-preview">
                    @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))
                    <img id="imagePreview" src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Preview">
                    @else
                    <div id="imagePreview" class="default-image-preview">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    @endif
                </div>
                <div class="profile-image-overlay">
                    <label for="profile_image_input" class="upload-label">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="profile_image_input" name="profile_image" accept="image/*" style="display: none;">
                </div>
            </div>
            <div class="image-info">
                <p class="image-hint">Recommended: 500x500px, max 2MB</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --primary-dark: #014d34;
        --border-color: #e5e7eb;
        --dark: #111827;
        --text-muted: #6b7280;
        --transition: all 0.3s ease;
    }

    .profile-form {
        max-width: 800px;
        background: #ffffff;
        padding: 2rem;
        border-radius: 1.25rem;
    }

    .profile-image-section {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.05) 100%);
        border-radius: 1.5rem;
        padding: 3rem 1rem 2rem;
        border: 2px solid rgba(2, 97, 66, 0.1);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-image-container {
        position: relative;
        width: 180px;
        height: 180px;
        margin: 0 auto 2rem;
        display: inline-block;
    }

    .profile-image-preview {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
        background: white;
        border: 5px solid white;
        box-shadow: 0 12px 40px rgba(2, 97, 66, 0.25), inset 0 0 0 2px var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .profile-image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .default-image-preview {
        font-size: 5rem;
        color: var(--primary);
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-image-container:hover .profile-image-preview {
        transform: scale(1.08);
    }

    .profile-image-overlay {
        position: absolute;
        bottom: -8px;
        right: -8px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(2, 97, 66, 0.35);
        transition: var(--transition);
        border: 4px solid white;
    }

    .profile-image-overlay:hover {
        transform: scale(1.15);
    }

    .upload-label {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
    }

    .upload-label i {
        font-size: 1.4rem;
    }

    .image-info {
        margin-top: 1rem;
        text-align: center;
    }

    .image-hint {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin: 0;
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
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(2, 97, 66, 0.1);
        outline: none;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
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

    .btn-secondary {
        background: var(--border-color);
        color: var(--dark);
    }

    .btn-secondary:hover {
        background: #ccc;
        color: var(--dark);
    }

    @media (max-width: 768px) {
        .profile-image-section {
            padding: 2rem 1rem;
        }

        .profile-image-container {
            width: 160px;
            height: 160px;
        }

        .default-image-preview {
            font-size: 4rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    document.getElementById('profile_image_input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = '<img src="' + event.target.result + '" alt="Preview">';
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
