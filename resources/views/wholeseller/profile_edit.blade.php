@extends('wholeseller.wholeseller-master')

@section('wholeseller_body')
    <style>
        /* Full-width layout and green theme for wholeseller profile edit */
        .profile-container {
            background-color: #f8f9fa;
            width: 100%;
            margin-top: -4%;
        }

        .profile-card {
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 16px;
        }

        .header-green {
            background: linear-gradient(135deg, #13B262 0%, #0e8f51 100%);
            padding: 18px 20px;
            border: none;
             text-transform: uppercase;
        }

        .btn-green {
            background: #13B262;
            border-color: #13B262;
            color: #ffffff;
        }

        .btn-green:hover, .btn-green:focus {
            background: #0e8f51;
            border-color: #0e8f51;
            color: #ffffff;
        }

        a.text-primary-green {
            color: #13B262;
            font-weight: 600;
        }

        a.text-primary-green:hover {
            color: #0e8f51;
            text-decoration: none;
        }

        /* keep preview icon color consistent */
        #previewPlaceholder { color: #13B262; }

        @media (max-width: 768px) {
            .profile-card { margin: 0 10px; }
            .card-body { padding: 20px; }
        }
    </style>

    <div class="container-fluid profile-container py-md-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4 profile-card">
                    <div class="card-header header-green rounded-top-4">
                        <h4 class="mb-0 text-white"><i class="bi bi-person-circle me-2"></i>Update Your Profile</h4>
                    </div>

                    <div class="card-body p-4 bg-light">
                        <!-- Form -->
                        <form method="POST" action="{{ route('wholeseller.update.profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4 align-items-start">
                                <!-- Profile Image Column -->
                                <div class="col-12 col-md-3 text-center">
                                    @php
                                        $profileImage = $user->profile_image ? $user->profile_image : null;
                                    @endphp

                                    <div id="profileAvatarContainer" class="d-flex justify-content-center mb-3">
                                        @if ($profileImage && file_exists(public_path($profileImage)))
                                            <img id="previewImg" src="{{ asset($profileImage) }}" alt="Profile"
                                                class="rounded-circle border border-3 shadow-sm"
                                                style="width: 160px; height: 160px; object-fit: cover; background: #fff;">
                                        @else
                                            <div id="previewPlaceholder"
                                                class="d-flex align-items-center justify-content-center rounded-circle border border-3 shadow-sm"
                                                style="width: 160px; height: 160px; background: #fff; font-size: 56px; color: #13B262;">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Profile Image Upload --}}
                                    <div class="mb-3">
                                        <label class="form-label"><i class="bi bi-image-fill me-2"></i>Profile Image</label>
                                        <input type="file" name="profile_image" class="form-control rounded-3" accept="image/*"
                                            onchange="previewFile(event)">
                                        @error('profile_image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Fields Column -->
                                <div class="col-12 col-md-9">
                                    <div class="row g-3">
                                        {{-- Name --}}
                                        <div class="col-12">
                                            <label class="form-label"><i class="bi bi-person-fill me-2"></i>Name</label>
                                            <input type="text" name="name" class="form-control rounded-3"
                                                value="{{ old('name', $user->name) }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="col-12">
                                            <label class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                                            <input type="email" name="email" class="form-control rounded-3"
                                                value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- Phone --}}
                                        <div class="col-12">
                                            <label class="form-label"><i class="bi bi-telephone-fill me-2"></i>Phone</label>
                                            <input type="text" name="phone" class="form-control rounded-3"
                                                value="{{ old('phone', $user->phone) }}" required>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- Placeholder for future fields (company, address, etc.) --}}
                                        <div class="col-12">
                                            <label class="form-label"><i class="bi bi-briefcase-fill me-2"></i>Company (optional)</label>
                                            <input type="text" name="company" class="form-control rounded-3"
                                                value="{{ old('company', $user->company ?? '') }}">
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="d-flex justify-content-start mt-4">
                                        <button type="submit" class="btn btn-green rounded-3 shadow-sm px-4 py-2">
                                            <i class="bi bi-check-circle me-2"></i>Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Back to Dashboard --}}
                <div class="text-center mt-4">
                    <a href="{{ route('wholeseller.dashboard') }}" class="text-decoration-none text-primary-green fw-semibold">
                        <i class="bi bi-arrow-left-circle me-1"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
     @include('wholeseller.cart-container')

    <!-- Image Preview Script -->
    <script>
        function previewFile(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const previewImg = document.getElementById('previewImg');
                const placeholder = document.getElementById('previewPlaceholder');

                if (placeholder) placeholder.style.display = 'none';

                if (previewImg) {
                    previewImg.src = reader.result;
                } else {
                    const img = document.createElement('img');
                    img.id = 'previewImg';
                    img.src = reader.result;
                    img.className = 'rounded-circle border border-2 shadow-sm mb-3';
                    img.style = 'width:160px;height:160px;object-fit:cover;background:#fff;';
                    const container = document.getElementById('profileAvatarContainer');
                    if (container) container.prepend(img);
                }
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection