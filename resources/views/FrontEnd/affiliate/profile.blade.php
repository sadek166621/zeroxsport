@extends('FrontEnd.affiliate.master')

@section('title', 'Profile')

@section('content')

<style>
    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .profile-header {
        background: linear-gradient(135deg, #F1592A 0%, #d84620 100%);
        border-radius: 16px;
        padding: 40px 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .header-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .avatar-wrapper {
        display: inline-block;
        position: relative;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        object-fit: cover;
    }

    .profile-info {
        flex: 1;
    }

    .profile-name {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .affiliate-label {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 15px;
    }

    .edit-btn {
        background: white;
        color: #F1592A;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .edit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        color: #F1592A;
    }

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border-top: 4px solid #F1592A;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(241, 89, 42, 0.15);
    }

    .stat-label {
        font-size: 12px;
        text-transform: uppercase;
        color: #999;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #F1592A;
    }

    .info-section {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .info-section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-section-title i {
        color: #F1592A;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .info-item-card {
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #F1592A;
        transition: all 0.3s ease;
    }

    .info-item-card:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateX(5px);
    }

    .info-label {
        font-size: 12px;
        text-transform: uppercase;
        color: #999;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-label i {
        color: #F1592A;
    }

    .info-value {
        font-weight: 600;
        color: #333;
        font-size: 15px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-header {
            padding: 25px 20px;
        }

        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
        }

        .profile-name {
            font-size: 1.5rem;
        }

        .stats-section {
            grid-template-columns: repeat(2, 1fr);
        }

        .info-section {
            padding: 20px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .profile-container {
            padding: 10px;
        }

        .profile-header {
            padding: 20px 15px;
            margin-bottom: 20px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
        }

        .profile-name {
            font-size: 1.3rem;
        }

        .profile-info {
            width: 100%;
        }

        .stat-card {
            padding: 15px;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .stat-label {
            font-size: 11px;
        }

        .info-section {
            padding: 15px;
        }

        .info-item-card {
            padding: 15px;
        }

        .edit-btn {
            padding: 8px 16px;
            font-size: 12px;
        }

        .info-label {
            font-size: 11px;
        }

        .info-value {
            font-size: 14px;
        }
    }
</style>

<!-- Main Content -->
<div class="profile-container">

    {{-- Profile Header --}}
    <div class="profile-header">
        <div class="header-content">
            <div class="avatar-wrapper">
                @php
                $affiliate = auth('affiliate')->user();
                $image = $affiliate->profile_image
                ? asset($affiliate->profile_image)
                : asset('images/default-avatar.png');
                @endphp
                <img src="{{ $image }}" alt="Profile Avatar" class="profile-avatar">
            </div>
            <div class="profile-info">
                <h2 class="profile-name">{{ $affiliate->name }}</h2>
                <p class="affiliate-label">Affiliate Member Since {{ $affiliate->created_at->format('M Y') }}</p>
                <a href="{{ route('affiliate.profile.edit') }}" class="edit-btn">
                    <i class="bi bi-pencil-fill"></i>Edit Profile
                </a>
            </div>
        </div>
    </div>

    {{-- Stats Section --}}
    <div class="stats-section">
        <div class="stat-card">
            <div class="stat-label"><i class="bi bi-wallet2"></i> Total Earnings</div>
            <div class="stat-value">৳{{ number_format($affiliate->total_earning, 2) }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><i class="bi bi-calendar-event"></i> Member Since</div>
            <div class="stat-value">{{ $affiliate->created_at->format('M Y') }}</div>
        </div>
    </div>

    {{-- Info Section --}}
    <div class="info-section">
        <div class="info-section-title">
            <i class="bi bi-info-circle"></i> Profile Information
        </div>
        <div class="info-grid">
            <div class="info-item-card">
                <div class="info-label">
                    <i class="bi bi-envelope"></i> Email Address
                </div>
                <div class="info-value">{{ $affiliate->email }}</div>
            </div>
            <div class="info-item-card">
                <div class="info-label">
                    <i class="bi bi-telephone"></i> Phone Number
                </div>
                <div class="info-value">{{ $affiliate->phone }}</div>
            </div>
            <div class="info-item-card">
                <div class="info-label">
                    <i class="bi bi-geo-alt"></i> Address
                </div>
                <div class="info-value">{{ $affiliate->address ?? 'Not provided' }}</div>
            </div>
            <div class="info-item-card">
                <div class="info-label">
                    <i class="bi bi-calendar-check"></i> Joined Date
                </div>
                <div class="info-value">{{ $affiliate->created_at->format('d M Y') }}</div>
            </div>
        </div>
    </div>
</div>

@endsection