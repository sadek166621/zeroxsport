@extends('wholeseller.wholeseller-master')
@section('wholeseller_body')
    <style>
        .profile-main-card {
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
        }

        .profile-header {
            background: linear-gradient(135deg, #13B262 0%, #3b82f6 100%);
            padding: 40px 0 80px 0;
            position: relative;
            border-bottom: 4px solid #e5e7eb;
        }

        .profile-avatar {
            position: absolute;
            left: 24px;
            bottom: -60px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid #ffffff;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            background: #ffffff;
            transition: transform 0.3s ease;
        }

        .profile-avatar:hover {
            transform: scale(1.05);
        }

        .profile-header-content {
            margin-left: 160px;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .profile-header-name {
            color: #ffffff;
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .profile-header-menu {
            color: #ffffff;
            font-size: 1.8rem;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .profile-header-menu:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(90deg);
        }

        .profile-info-list {
            margin: 80px 0 0 0;
            padding: 0 0 32px 0;
        }

        .profile-info-row {
            display: flex;
            align-items: center;
            background: #f9fafb;
            border-radius: 10px;
            padding: 18px 20px;
            margin: 0 16px 16px 16px;
            gap: 20px;
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .profile-info-row:hover {
            background: #f1f5f9;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-info-icon {
            font-size: 1.5rem;
            color: #1e3a8a;
            min-width: 32px;
            text-align: center;
            transition: color 0.3s ease;
        }

        .profile-info-row:hover .profile-info-icon {
            color: #3b82f6;
        }

        .profile-info-label {
            font-weight: 600;
            color: #1f2937;
            min-width: 130px;
            font-size: 1.05rem;
        }

        .profile-info-value {
            color: #4b5563;
            font-size: 1.1rem;
            font-weight: 500;
            flex-grow: 1;
        }

        @media (max-width: 600px) {
            .profile-header-content {
                margin-left: 0;
                flex-direction: column;
                align-items: flex-start;
                padding: 0 16px;
            }

            .profile-avatar {
                left: 50%;
                transform: translateX(-50%);
            }

            .profile-header-name {
                font-size: 1.8rem;
                margin-top: 16px;
            }

            .profile-info-row {
                flex-direction: column;
                align-items: flex-start;
                margin: 0 12px 12px 12px;
                padding: 16px;
            }

            .profile-info-label {
                min-width: 0;
                margin-bottom: 8px;
            }
        }
    </style>

    @php
        $user = Auth::user();
        $profileImage = $user && $user->profile_image ? $user->profile_image : null;
    @endphp

    <div class="profile-main-card">
        <div class="profile-header">
            {{-- <img src="https://i.ibb.co/0Jmshvb/shop-demo.jpg" alt="Avatar" class="profile-avatar"> --}}
            @if ($profileImage && file_exists(public_path($profileImage)))
                <img src="{{ asset($profileImage) }}" alt="Profile"
                    class="profile-avatar rounded-circle border border-3 shadow-sm"
                    style="width: 100px; height: 100px; object-fit: cover; background: #fff;">
            @else
                <div class="profile-avatar d-flex align-items-center justify-content-center rounded-circle border border-3 shadow-sm mx-auto"
                    style="width: 100px; height: 100px; background: #fff; font-size: 42px; color: #13B262;">
                    <i class="fas fa-user"></i>
                </div>
            @endif
            <div class="profile-header-content">
                <div class="profile-header-name">
                    <h1 class="">
                        {{ Str::ucfirst($user->name) }}
                    </h1>
                    <button class=""
                        style="background-color:#fff; color: #000; padding:3px 15px; border-radius:18px; font-size:18px; border:none;">
                        Wholesaler
                    </button>
                </div>

                <div class="profile-header-menu" title="More">
                    <span>&#8942;</span>
                </div>
            </div>
        </div>

        <div class="profile-info-list">
            <div class="profile-info-row">
                <span class="profile-info-icon">
                    <i class="fa fa-phone"></i>
                </span>
                <span class="profile-info-label">মোবাইল নাম্বার</span>
                <span class="profile-info-value">{{ $user->phone }}</span>
            </div>
            <div class="profile-info-row">
                <span class="profile-info-icon">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="profile-info-label">ইমেইল</span>
                <span class="profile-info-value">{{ $user->email }}</span>
            </div>
            <div class="profile-info-row">
                <span class="profile-info-icon">
                    <i class="fa fa-calendar"></i>
                </span>
                <span class="profile-info-label">একাউন্ট তৈরির তারিখ</span>
                <span class="profile-info-value">{{ \Carbon\Carbon::parse($user->created_at)->format('d F Y') }}</span>
            </div>
        </div>
    </div>

    <!-- FontAwesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    @include('wholeseller.cart-container')
@endsection
