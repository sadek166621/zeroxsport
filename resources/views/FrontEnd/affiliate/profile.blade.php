@extends('FrontEnd.affiliate.master')

@section('title', 'Profile')

@section('content')
    <!-- Main Content -->

        <div class="profile-card p-0" style="overflow:hidden;">
            <div class="row g-0 align-items-center">
                <div class="col-md-4 text-center py-4" style="background:#f8f9fa;">
                    <div class="avatar-container mb-2">
                        @php
                            $affiliate = auth('affiliate')->user();
                            $image = $affiliate->profile_image
                                ? asset($affiliate->profile_image)
                                : asset('images/default-avatar.png'); // fallback image
                        @endphp

                        <img src="{{ $image }}" alt="Profile Avatar" class="profile-avatar"
                            style="box-shadow:none;border:4px solid #fff;">
                    </div>
                    <div class="profile-name mb-1">{{ $affiliate->name }}</div>
                    <a href="{{ route('affiliate.profile.edit') }}" class="edit-profile-link mt-3 w-75">
                        <i class="bi bi-pencil-fill me-2"></i>Edit Profile
                    </a>
                </div>

                <div class="col-md-8 py-4 px-4">
                    {{-- Total Earnings Section --}}
                    <div class="mb-4 p-3 bg-light border rounded text-center">
                        <h5 class="text-success mb-2">Total Earnings</h5>
                        <div class="fs-3 fw-bold">৳{{ number_format($affiliate->total_earning, 2) }}</div>
                    </div>

                    <div class="row profile-info-list" style="max-width:none;margin:0;">
                        <div class="col-sm-6 mb-4">
                            <div class="profile-info-item">
                                <i class="bi bi-envelope text-success"></i>
                                <div>
                                    <div class="fw-bold small text-muted">Email</div>
                                    <div>{{ $affiliate->email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="profile-info-item">
                                <i class="bi bi-telephone text-success"></i>
                                <div>
                                    <div class="fw-bold small text-muted">Phone</div>
                                    <div>{{ $affiliate->phone }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="profile-info-item">
                                <i class="bi bi-geo-alt text-success"></i>
                                <div>
                                    <div class="fw-bold small text-muted">Address</div>
                                    <div>{{ $affiliate->address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="profile-info-item">
                                <i class="bi bi-calendar-event text-success"></i>
                                <div>
                                    <div class="fw-bold small text-muted">Joined</div>
                                    <div>{{ $affiliate->created_at->format('F Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- end col-md-8 --}}
            </div> {{-- end row --}}
        </div> {{-- end profile-card --}}

@endsection
