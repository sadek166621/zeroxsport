@extends('FrontEnd.affiliate.master')
@section('title', 'Update Profile')

@section('content')
    <div class="col-lg-9">
        <div class="form-card">

            <form method="POST" action="{{ route('affiliate.profile.update', $affiliate->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="profile-card">
                    <div class="avatar-container">
                        @php
                            $affiliate = auth('affiliate')->user();
                            $avatarPath = $affiliate->profile_image
                                ? asset($affiliate->profile_image)
                                : asset('images/default-avatar.png'); // fallback if no image in DB
                        @endphp

                        <img src="{{ $avatarPath }}" alt="Profile Avatar" class="profile-avatar" id="avatarPreview">
                    </div>
                    <div class="profile-name">{{ $affiliate->name }}</div>
                    <label class="btn-upload">
                        <i class="bi bi-camera"></i> Change Photo
                        <input type="file" accept="image/*" class="d-none" id="avatarInput" name="avatar">

                    </label>
                    @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control modern-input" name="name"
                                value="{{ old('name', $affiliate->name) }}">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control modern-input" name="email"
                                value="{{ $affiliate->email }}" disabled>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control modern-input" name="phone"
                                value="{{ old('phone', $affiliate->phone) }}">

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control modern-input" name="address"
                                value="{{ old('address', $affiliate->address) }}">

                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                </div>

                <!-- Password Section -->
                <div class="password-section mt-4">
                    <div class="password-title">
                        <i class="bi bi-shield-lock me-2"></i>Security Settings
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control modern-input" name="current_password"
                                    placeholder="Enter current password">

                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control modern-input" name="new_password"
                                    placeholder="Enter new password">

                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control modern-input" name="confirm_password"
                                    placeholder="Confirm new password">

                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn-primary-modern">
                        <i class="bi bi-check-circle me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Profile Image Preview Script -->
    <script>
        document.getElementById('avatarInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection