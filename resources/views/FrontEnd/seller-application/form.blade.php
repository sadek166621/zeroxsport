@extends('FrontEnd.master')
@section('title')
    Become A Seller
@endsection
@section('content')
    <style>
        :root {
            --primary: #026142;
            --primary-light: #0a8a5f;
            --primary-dark: #014d32;
            --primary-50: #f0faf8;
            --accent: #00d084;
            --accent-light: #1ae896;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --danger: #ef4444;
            --success: #10b981;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--gray-700);
        }

        .seller-application-section {
            background: linear-gradient(135deg, var(--primary-50) 0%, #ffffff 100%);
            padding: 60px 0;
            min-height: 100vh;
        }

        .custom_container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .seller-app-wrapper {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
            align-items: start;
        }

        /* ===== LEFT SIDEBAR ===== */
        .seller-app-sidebar {
            position: sticky;
            top: 20px;
        }

        .seller-info-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            padding: 32px;
            box-shadow: 0 10px 30px rgba(2, 97, 66, 0.08);
            border: 1px solid rgba(2, 97, 66, 0.05);
            transition: all 0.3s ease;
        }

        .seller-info-card:hover {
            box-shadow: 0 15px 40px rgba(2, 97, 66, 0.12);
            transform: translateY(-2px);
        }

        .seller-app-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--gray-200);
        }

        .seller-app-logo i {
            font-size: 32px;
            color: var(--primary);
            background: var(--primary-50);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-md);
        }

        .seller-app-logo span {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
        }

        .seller-app-illustration {
            margin-bottom: 24px;
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .seller-app-illustration img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .seller-app-illustration:hover img {
            transform: scale(1.05);
        }

        .seller-benefits {
            margin-bottom: 24px;
        }

        .seller-benefits h4 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .seller-benefits h4::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 2px;
        }

        .seller-benefits ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .seller-benefits li {
            padding: 10px 0;
            color: var(--gray-600);
            font-size: 0.95rem;
            line-height: 1.6;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .seller-benefits li:before {
            content: '✓';
            color: var(--success);
            font-weight: bold;
            font-size: 1.1rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .seller-benefits li:last-child {
            border-bottom: none;
        }

        .seller-benefits strong {
            color: var(--primary);
            font-weight: 600;
        }

        .seller-app-sidebar-footer {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 2px solid var(--gray-200);
            text-align: center;
        }

        .seller-app-sidebar-footer p {
            color: var(--gray-600);
            font-size: 0.95rem;
            margin-bottom: 12px;
        }

        .btn-signin {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 10px 24px;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-signin:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(2, 97, 66, 0.25);
            color: white;
        }

        /* ===== MAIN FORM ===== */
        .seller-app-main {
            display: flex;
        }

        .seller-app-card {
            background: #ffffff;
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: 0 10px 30px rgba(2, 97, 66, 0.08);
            border: 1px solid rgba(2, 97, 66, 0.05);
            width: 100%;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .seller-app-header {
            margin-bottom: 36px;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--gray-200);
        }

        .seller-app-header h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .seller-app-header .muted {
            color: var(--gray-500);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* ===== ALERTS ===== */
        .alert {
            border: none;
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
            font-size: 0.95rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #047857;
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #991b1b;
            border-left: 4px solid var(--danger);
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* ===== SECTION HEADERS ===== */
        h5 {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--primary-50);
        }

        h5::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--accent) 100%);
            border-radius: 2px;
        }

        /* ===== SELLER TYPE CARDS ===== */
        .seller-type-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .seller-type-card {
            background: #ffffff;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .seller-type-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .seller-type-card:hover {
            border-color: var(--primary);
            background: var(--primary-50);
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(2, 97, 66, 0.12);
        }

        .seller-type-card:hover::before {
            transform: scaleX(1);
        }

        .seller-type-card.border-primary {
            border-color: var(--primary);
            background: linear-gradient(135deg, var(--primary-50) 0%, #ffffff 100%);
            box-shadow: 0 8px 24px rgba(2, 97, 66, 0.16);
        }

        .seller-type-card.border-primary::before {
            transform: scaleX(1);
        }

        .seller-type-card input[type="radio"] {
            display: none;
        }

        .seller-type-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 12px;
            transition: transform 0.3s ease;
        }

        .seller-type-card:hover i {
            transform: scale(1.1);
        }

        .seller-type-card h6 {
            color: var(--gray-900);
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0;
        }

        /* ===== FORM ELEMENTS ===== */
        label {
            color: var(--gray-700);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 10px;
            display: block;
        }

        label .text-danger {
            color: var(--danger);
            margin-left: 4px;
        }

        .form-control,
        .form-select {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            background: var(--gray-50);
            padding: 12px 16px;
            font-size: 0.95rem;
            color: var(--gray-900);
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(2, 97, 66, 0.1), 0 4px 12px rgba(2, 97, 66, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--gray-400);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--danger);
            background: rgba(239, 68, 68, 0.02);
        }

        .form-control.is-invalid:focus,
        .form-select.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1), 0 4px 12px rgba(239, 68, 68, 0.08);
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 6px;
            display: block;
            font-weight: 500;
        }

        /* ===== FILE UPLOAD ===== */
        .upload-preview {
            margin-bottom: 12px;
        }

        .upload-preview img {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            object-fit: cover;
            max-width: 100%;
            transition: all 0.3s ease;
        }

        .upload-preview img:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(2, 97, 66, 0.15);
        }

        .input-group {
            display: flex;
            border-radius: var(--radius-md);
            overflow: hidden;
        }

        .input-group .form-control {
            border-radius: 0;
        }

        .input-group .btn-outline-secondary {
            border: 2px solid var(--gray-200);
            border-left: none;
            background: var(--gray-50);
            color: var(--gray-500);
            padding: 10px 16px;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .input-group .btn-outline-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-50);
        }

        .input-group .btn-outline-secondary:active {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* ===== FORM CHECKS ===== */
        .form-check {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: var(--gray-50);
            border-radius: var(--radius-md);
            border: 2px solid var(--gray-200);
            transition: all 0.3s ease;
            margin-bottom: 24px;
        }

        .form-check:hover {
            background: var(--primary-50);
            border-color: var(--primary);
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 3px;
            border: 2px solid var(--gray-300);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
        }

        .form-check-label {
            color: var(--gray-700);
            font-size: 0.95rem;
            cursor: pointer;
            margin: 0;
            font-weight: 500;
        }

        .form-check-label a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .form-check-label a:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        /* ===== SUBMIT BUTTON ===== */
        .seller-app-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: #ffffff;
            padding: 16px 32px;
            border-radius: var(--radius-md);
            border: none;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 8px 24px rgba(2, 97, 66, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            margin-top: 32px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }

        .seller-app-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .seller-app-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(2, 97, 66, 0.3);
        }

        .seller-app-btn:hover::before {
            left: 100%;
        }

        .seller-app-btn:active {
            transform: translateY(-1px);
        }

        .seller-app-btn i {
            margin-right: 8px;
        }

        /* ===== HIDDEN SECTIONS ===== */
        #individual_fields,
        #business_fields {
            animation: fadeInUp 0.4s ease;
        }

        /* ===== FORM SECTIONS ===== */
        .form-section {
            margin-bottom: 36px;
            padding-bottom: 28px;
            border-bottom: 2px solid var(--gray-100);
        }

        .form-section:last-of-type {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        /* ===== MODAL ===== */
        .modal-content {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
            padding: 24px;
            border: none;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.25rem;
        }

        .btn-close-white {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            background: var(--gray-50);
            padding: 28px;
        }

        .modal-body h6 {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 18px;
        }

        .list-group-item {
            background: #ffffff;
            border-color: var(--gray-200);
            color: var(--gray-700);
            padding: 14px 16px;
            font-size: 0.95rem;
            line-height: 1.6;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background: var(--primary-50);
            border-color: var(--primary);
            transform: translateX(4px);
        }

        .list-group-item i {
            color: var(--success);
            margin-right: 10px;
            min-width: 20px;
        }

        .modal-footer {
            background: var(--gray-50);
            border-top: 2px solid var(--gray-200);
            padding: 20px;
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .btn-light {
            background: #ffffff;
            border: 2px solid var(--gray-300);
            color: var(--gray-700);
            font-weight: 600;
            border-radius: var(--radius-md);
            padding: 10px 24px;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background: var(--gray-100);
            border-color: var(--gray-400);
            color: var(--gray-900);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .seller-app-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .seller-app-sidebar {
                position: relative;
                top: auto;
            }

            .seller-app-card {
                padding: 32px;
            }

            .seller-app-header h1 {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 768px) {
            .seller-application-section {
                padding: 40px 0;
            }

            .seller-app-card {
                padding: 24px;
            }

            .seller-app-header h1 {
                font-size: 1.5rem;
            }

            .seller-type-cards {
                grid-template-columns: 1fr;
            }

            .seller-info-card {
                padding: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            label {
                font-size: 0.9rem;
            }

            .seller-app-btn {
                padding: 14px 24px;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .custom_container {
                padding: 0 16px;
            }

            .seller-application-section {
                padding: 30px 0;
            }

            .seller-app-card {
                padding: 18px;
                border-radius: var(--radius-md);
            }

            .seller-info-card {
                padding: 18px;
                border-radius: var(--radius-md);
            }

            .seller-app-header h1 {
                font-size: 1.3rem;
            }

            h5 {
                font-size: 1rem;
            }

            .seller-benefits li {
                font-size: 0.9rem;
            }

            .form-check {
                padding: 12px;
                flex-direction: column;
            }

            .form-check-input {
                margin-top: 0;
            }
        }
    </style>

    <section class="seller-application-section">
        <div class="custom_container">
            <div class="seller-app-wrapper">
                <!-- Left: Info / Illustration -->
                <aside class="seller-app-sidebar">
                    <div class="seller-info-card">
                        <div class="seller-app-logo">
                            <i class="fas fa-store"></i>
                            <span>Online Hut BD</span>
                        </div>

                        <div class="seller-app-illustration">
                            <img src="https://img.freepik.com/free-vector/online-shop-application-smartphone-concept_23-2148505081.jpg?w=740"
                                alt="Seller Illustration">
                        </div>

                        <div class="seller-benefits">
                            <h4>Why sell with us?</h4>
                            <ul>
                                <li><strong>Low commission</strong> and transparent policies</li>
                                <li><strong>Fast onboarding</strong> and seller support</li>
                                <li><strong>Secure payments</strong> and easy returns</li>
                                <li><strong>24/7 assistance</strong> for your business</li>
                            </ul>
                        </div>

                        <div class="seller-app-sidebar-footer">
                            <p>Already a seller?</p>
                            <a href="{{ route('admin.login') }}" class="btn-signin">Sign In</a>
                        </div>
                    </div>
                </aside>

                <!-- Right: Form -->
                <main class="seller-app-main">
                    <div class="seller-app-card">
                        <div class="seller-app-header">
                            <h1>Become a Seller</h1>
                            <p class="muted">Join our thriving marketplace and grow your business. Complete the form below to start your seller journey.</p>
                        </div>

                        {{-- Show success message --}}
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Show validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('become.a.seller') }}" enctype="multipart/form-data"
                            id="sellerForm">
                            @csrf

                            <!-- Seller Type Selection -->
                            <div class="form-section">
                                <h5>Select Your Account Type</h5>
                                <div class="seller-type-cards">
                                    <div class="seller-type-card {{ old('seller_type', 1) == 1 ? 'border-primary' : '' }}"
                                        onclick="selectSellerType('individual')">
                                        <input type="radio" name="seller_type" id="type_individual" value="1"
                                            {{ old('seller_type', 1) == 1 ? 'checked' : '' }}>
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Individual Seller</h6>
                                        <small style="color: var(--gray-500);">For self-employed individuals</small>
                                    </div>
                                    <div class="seller-type-card {{ old('seller_type') == 2 ? 'border-primary' : '' }}"
                                        onclick="selectSellerType('business')">
                                        <input type="radio" name="seller_type" id="type_business" value="2"
                                            {{ old('seller_type') == 2 ? 'checked' : '' }}>
                                        <i class="fas fa-building"></i>
                                        <h6>Business / Company</h6>
                                        <small style="color: var(--gray-500);">For registered businesses</small>
                                    </div>
                                </div>
                                @error('seller_type')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-times-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Individual Fields -->
                            <div id="individual_fields" style="display: {{ old('seller_type', 1) == 1 ? 'block' : 'none' }};">
                                <div class="form-section">
                                    <h5>Personal Information</h5>
                                    <div class="form-row">
                                        <div>
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="full_name"
                                                class="form-control @error('full_name') is-invalid @enderror"
                                                value="{{ old('full_name') }}" placeholder="e.g., John Doe" required>
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror"
                                                value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" required>
                                            @error('dob')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-select @error('gender') is-invalid @enderror"
                                                required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h5>Identification & Contact</h5>
                                    <div class="form-row">
                                        <div>
                                            <label>NID Number <span class="text-danger">*</span></label>
                                            <input type="text" name="nid_number"
                                                class="form-control @error('nid_number') is-invalid @enderror"
                                                value="{{ old('nid_number') }}" placeholder="e.g., 1234567890" required>
                                            @error('nid_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Mobile Number <span class="text-danger">*</span></label>
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}" placeholder="01712345678" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="your@email.com" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h5>Document Upload</h5>
                                    <div class="form-row full">
                                        <div>
                                            <label>Profile Photo <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="profile_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="profile_photo" accept="image/*"
                                                class="form-control @error('profile_photo') is-invalid @enderror"
                                                onchange="previewImage(this,'profile_preview')" required>
                                            <small class="text-muted">JPG, PNG or GIF (Max 2MB)</small>
                                            @error('profile_photo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div>
                                            <label>NID Front <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="nid_front_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="nid_front" accept="image/*"
                                                class="form-control @error('nid_front') is-invalid @enderror"
                                                onchange="previewImage(this,'nid_front_preview')" required>
                                            @error('nid_front')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>NID Back <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="nid_back_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="nid_back" accept="image/*"
                                                class="form-control @error('nid_back') is-invalid @enderror"
                                                onchange="previewImage(this,'nid_back_preview')" required>
                                            @error('nid_back')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Business Fields -->
                            <div id="business_fields" style="display: {{ old('seller_type') == 2 ? 'block' : 'none' }};">
                                <div class="form-section">
                                    <h5>Business Information</h5>
                                    <div class="form-row">
                                        <div>
                                            <label>Business / Shop Name <span class="text-danger">*</span></label>
                                            <input type="text" name="shop_name"
                                                class="form-control @error('shop_name') is-invalid @enderror"
                                                value="{{ old('shop_name') }}" placeholder="e.g., Tech Store BD">
                                            @error('shop_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Business Type <span class="text-danger">*</span></label>
                                            <select name="business_type"
                                                class="form-select @error('business_type') is-invalid @enderror">
                                                <option value="">Select Business Type</option>
                                                <option value="1" {{ old('business_type') == 1 ? 'selected' : '' }}>Sole
                                                    Proprietorship</option>
                                                <option value="2" {{ old('business_type') == 2 ? 'selected' : '' }}>
                                                    Partnership</option>
                                                <option value="3" {{ old('business_type') == 3 ? 'selected' : '' }}>Limited
                                                    Company</option>
                                            </select>
                                            @error('business_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div>
                                            <label>Trade License Number <span class="text-danger">*</span></label>
                                            <input type="text" name="trade_license_no"
                                                class="form-control @error('trade_license_no') is-invalid @enderror"
                                                value="{{ old('trade_license_no') }}" placeholder="e.g., TL123456">
                                            @error('trade_license_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>BIN / TIN (Optional)</label>
                                            <input type="text" name="bin_tin" class="form-control"
                                                value="{{ old('bin_tin') }}" placeholder="e.g., 006789123">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h5>Owner Information</h5>
                                    <div class="form-row">
                                        <div>
                                            <label>Owner Name <span class="text-danger">*</span></label>
                                            <input type="text" name="owner_name"
                                                class="form-control @error('owner_name') is-invalid @enderror"
                                                value="{{ old('owner_name') }}" placeholder="e.g., John Doe">
                                            @error('owner_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Owner NID Number <span class="text-danger">*</span></label>
                                            <input type="text" name="owner_nid"
                                                class="form-control @error('owner_nid') is-invalid @enderror"
                                                value="{{ old('owner_nid') }}" placeholder="e.g., 1234567890">
                                            @error('owner_nid')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h5>Contact Information</h5>
                                    <div class="form-row">
                                        <div>
                                            <label>Business Email <span class="text-danger">*</span></label>
                                            <input type="email" name="business_email"
                                                class="form-control @error('business_email') is-invalid @enderror"
                                                value="{{ old('business_email') }}" placeholder="business@email.com">
                                            @error('business_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Hotline Number <span class="text-danger">*</span></label>
                                            <input type="text" name="hotline"
                                                class="form-control @error('hotline') is-invalid @enderror"
                                                value="{{ old('hotline') }}" placeholder="016xxxxxxxx">
                                            @error('hotline')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section">
                                    <h5>Business Documents</h5>
                                    <div class="form-row full">
                                        <div>
                                            <label>Company Logo <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="logo_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="company_logo" accept="image/*"
                                                class="form-control @error('company_logo') is-invalid @enderror"
                                                onchange="previewImage(this,'logo_preview')">
                                            <small class="text-muted">JPG, PNG or GIF (Max 2MB)</small>
                                            @error('company_logo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div>
                                            <label>Trade License Document <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="trade_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="trade_license_doc" accept="image/*"
                                                class="form-control @error('trade_license_doc') is-invalid @enderror"
                                                onchange="previewImage(this,'trade_preview')">
                                            @error('trade_license_doc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label>Owner NID Front <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="owner_nid_f_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="owner_nid_front" accept="image/*"
                                                class="form-control @error('owner_nid_front') is-invalid @enderror"
                                                onchange="previewImage(this,'owner_nid_f_preview')">
                                            @error('owner_nid_front')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div>
                                            <label>Owner NID Back <span class="text-danger">*</span></label>
                                            <div class="upload-preview mb-2"><img id="owner_nid_b_preview" src="#"
                                                    style="max-height:150px;display:none;" class="img-thumbnail"></div>
                                            <input type="file" name="owner_nid_back" accept="image/*"
                                                class="form-control @error('owner_nid_back') is-invalid @enderror"
                                                onchange="previewImage(this,'owner_nid_b_preview')">
                                            @error('owner_nid_back')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Section -->
                            <div class="form-section">
                                <h5>Create Your Password</h5>
                                <div class="form-row">
                                    <div>
                                        <label>Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror" placeholder="Minimum 8 characters" required>
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="togglePassword('password')">
                                                <i class="fas fa-eye" id="password_icon"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" placeholder="Re-enter your password" required>
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="togglePassword('password_confirmation')">
                                                <i class="fas fa-eye" id="password_confirmation_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="form-section">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I have read and agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
                                    </label>
                                    <div class="invalid-feedback">You must agree to the terms before submitting.</div>
                                </div>
                            </div>

                            <button type="submit" class="seller-app-btn">
                                <i class="fas fa-rocket"></i> Start Your Seller Journey
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <!-- Terms Modal -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="termsModalLabel">
                            <i class="fas fa-file-contract me-2"></i> Vendor Terms & Conditions
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6><i class="fas fa-scroll me-2"></i>ই-কমার্স ভেন্ডর শর্তাবলী</h6>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> ভেন্ডরকে অবশ্যই সঠিক ও সত্য তথ্য প্রদান করতে হবে।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> প্রতিটি পণ্যের বিবরণ, মূল্য এবং স্টক সঠিকভাবে আপডেট করতে হবে।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> গ্রাহকের অর্ডার নির্ধারিত সময়ে ডেলিভারি করতে হবে।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> ভেন্ডর কোনো ভুয়া বা নকল পণ্য বিক্রি করতে পারবেন না।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> গ্রাহকের ব্যক্তিগত তথ্য গোপন রাখতে হবে এবং তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> রিটার্ন ও রিফান্ড নীতিমালা মেনে চলতে হবে।</li>
                          <li class="list-group-item"><i class="fas fa-check-circle"></i> প্ল্যাটফর্মের নিয়ম ভঙ্গ করলে ভেন্ডর অ্যাকাউন্ট স্থগিত করা হতে পারে।</li>
                        </ul>
                        <div class="alert alert-warning mt-4 mb-0" style="border: none; background: rgba(239, 68, 68, 0.08); color: #991b1b;">
                            <i class="fas fa-exclamation-triangle me-2"></i> <strong>নোট:</strong> প্ল্যাটফর্ম কর্তৃপক্ষ প্রয়োজনে শর্তাবলী পরিবর্তন করতে পারে。
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-check me-2"></i> I Understand
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function selectSellerType(type) {
            const isIndividual = type === 'individual';

            document.getElementById('type_individual').checked = isIndividual;
            document.getElementById('type_business').checked = !isIndividual;

            document.querySelectorAll('.seller-type-card').forEach(card => {
                card.classList.remove('border-primary');
            });
            event.currentTarget.classList.add('border-primary');

            document.getElementById('individual_fields').style.display = isIndividual ? 'block' : 'none';
            document.getElementById('business_fields').style.display = isIndividual ? 'none' : 'block';

            document.querySelectorAll('#individual_fields [required], #business_fields [required]').forEach(el => {
                el.removeAttribute('required');
                el.classList.remove('is-invalid');
            });

            const visibleSection = isIndividual ? '#individual_fields' : '#business_fields';
            document.querySelectorAll(visibleSection + ' input, ' + visibleSection + ' select').forEach(el => {
                const name = el.getAttribute('name');
                // Optional ফিল্ড বাদ দিয়ে বাকিগুলোতে required দাও
                if (name && !['bin_tin'].includes(name)) {
                    el.setAttribute('required', 'required');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checked = document.querySelector('input[name="seller_type"]:checked');
            const type = checked && checked.value == 2 ? 'business' : 'individual';
            selectSellerType(type);
        });

        function previewImage(input, imgId) {
            const img = document.getElementById(imgId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                img.style.display = 'none';
            }
        }

        function togglePassword(id) {
            const field = document.getElementById(id);
            const icon = document.getElementById(id + '_icon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
@endsection
