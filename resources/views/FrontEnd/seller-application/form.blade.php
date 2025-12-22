@extends('FrontEnd.master')
@section('title')
    Become A Seller
@endsection
@section('content')
    <style>
        :root {
            --primary: #FF6200;
            --accent: #0b8f46;
            --muted: #6b7280;
            --card-bg: #ffffff;
            --page-bg: #f7faf8;
            --danger: #ff5252;
            --radius: 12px;
        }

        .seller-application-section {
            background: var(--page-bg);
            padding: 40px 0;
        }

        .seller-app-wrapper.card-like {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 28px;
            max-width: 1180px;
            margin: 0 auto;
            align-items: start;
        }

        /* Left panel */
        .flat-left {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 22px;
            box-shadow: 0 12px 30px rgba(13, 38, 59, 0.06);
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-height: 520px;
        }

        .seller-app-logo {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .seller-app-logo i {
            font-size: 26px;
            color: var(--primary);
        }

        .seller-app-illustration img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
        }

        .seller-benefits h4 {
            margin: 0 0 8px 0;
            color: #111827;
            font-size: 1.05rem;
        }

        .seller-benefits ul {
            padding-left: 18px;
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }

        .seller-benefits li {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .seller-app-sidebar-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .seller-app-sidebar-footer .btn-link {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .seller-app-sidebar-footer .btn-link:hover {
            text-decoration: underline;
        }

        /* Right panel / form */
        .flat-right {
            display: flex;
        }

        .seller-app-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 26px;
            box-shadow: 0 12px 30px rgba(13, 38, 59, 0.06);
            width: 100%;
        }

        .seller-app-header h1 {
            margin: 0 0 6px 0;
            color: #0f172a;
            font-size: 1.6rem;
        }

        .seller-app-header .muted {
            color: var(--muted);
            margin-bottom: 14px;
        }

        .seller-app-step {
            margin-bottom: 6px;
        }

        .seller-app-step-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 12px;
        }

        .step-circle {
            background: #f3f7f4;
            color: #0f172a;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .modern-file-upload.upload-container {
            border: 1px dashed #e6eef0;
            padding: 12px;
            border-radius: 10px;
            background: #fcfefc;
        }

        .seller-app-upload-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            background: #fff;
            margin-bottom: 8px;
        }

        .form-floating .form-control {
            border-radius: 8px;
            background: #fbfdff;
            border: 1px solid #e6eef0;
            padding: 12px;
        }

        .form-floating label {
            color: #374151;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
        }

        .seller-app-btn {
            background: var(--primary);
            color: #fff;
            padding: 12px 18px;
            border-radius: 10px;
            border: none;
            font-weight: 700;
            box-shadow: 0 8px 22px rgba(1, 180, 94, 0.12);
        }

        .seller-app-btn:hover {
            background: var(--accent);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .seller-app-wrapper.card-like {
                grid-template-columns: 1fr;
                gap: 18px;
                padding: 0 14px;
            }

            .flat-left {
                min-height: auto;
                order: 2;
            }

            .flat-right {
                order: 1;
            }

            .seller-app-illustration img {
                height: 200px;
                object-fit: cover;
            }
        }

        @media (max-width: 576px) {
            .seller-app-card {
                padding: 18px;
            }

            .seller-benefits h4 {
                font-size: 1rem;
            }

            .seller-app-header h1 {
                font-size: 1.25rem;
            }
        }
    </style>
    <style>
        .seller-type-card {
            transition: all 0.3s ease;
        }

        .seller-type-card:hover {
            background: #f8f9fa;
            transform: translateY(-4px);
        }

        .upload-preview img {
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>

    <!-- CHANGED: New flat, register-like layout and styles (no gradients) -->
    <section class="seller-application-section">
        <div class="custom_container">
            <div class="seller-app-wrapper card-like">
                <!-- Left: Info / Illustration -->
                <aside class="seller-app-sidebar flat-left">
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
                        </ul>
                    </div>

                    <div class="seller-app-sidebar-footer">
                        <span>Already a seller?</span>
                        <a href="{{ route('admin.login') }}" class="btn-link">Sign In</a>
                    </div>
                </aside>

                <!-- Right: Form -->
                <main class="seller-app-main flat-right">
                    <div class="seller-app-card">
                        <div class="seller-app-header">
                            <h1>Become a Seller</h1>
                            <p class="muted">Grow your business with us. Fill out the form to join our seller community.
                            </p>
                        </div>


                        {{-- Show success message --}}
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- You can also show validation errors if needed --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('become.a.seller') }}" enctype="multipart/form-data"
                            id="sellerForm">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                            <div class="mb-4">
                                <h5 class="text-primary mb-4">Select Seller Type <span class="text-danger">*</span></h5>
                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <div class="border rounded-4 p-4 text-center seller-type-card
                                        {{ old('seller_type', 1) == 1 ? 'border-primary shadow-lg' : 'border-light' }}"
                                            onclick="selectSellerType('individual')">
                                            <input type="radio" name="seller_type" id="type_individual" value="1"
                                                class="d-none" {{ old('seller_type', 1) == 1 ? 'checked' : '' }}>
                                            <i class="fas fa-user fa-3x mb-3 text-primary"></i>
                                            <h5 class="mb-0">Individual Seller</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="border rounded-4 p-4 text-center seller-type-card
                                        {{ old('seller_type') == 2 ? 'border-primary shadow-lg' : 'border-light' }}"
                                            onclick="selectSellerType('business')">
                                            <input type="radio" name="seller_type" id="type_business" value="2"
                                                class="d-none" {{ old('seller_type') == 2 ? 'checked' : '' }}>
                                            <i class="fas fa-building fa-3x mb-3 text-primary"></i>
                                            <h5 class="mb-0">Business / Company</h5>
                                        </div>
                                    </div>
                                </div>
                                @error('seller_type')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- INDIVIDUAL FIELDS -->
                            <div id="individual_fields" style="display: {{ old('seller_type', 1) == 1 ? 'block' : 'none' }};">
                                <h5 class="text-primary mb-4">Individual Seller Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="full_name"
                                            class="form-control @error('full_name') is-invalid @enderror"
                                            value="{{ old('full_name') }}" required>
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="dob"
                                            class="form-control @error('dob') is-invalid @enderror"
                                            value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" required>
                                        @error('dob')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select @error('gender') is-invalid @enderror"
                                            required>
                                            <option value="">Choose</option>
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
                                    <div class="col-md-6">
                                        <label>NID Number <span class="text-danger">*</span></label>
                                        <input type="text" name="nid_number"
                                            class="form-control @error('nid_number') is-invalid @enderror"
                                            value="{{ old('nid_number') }}" required>
                                        @error('nid_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="01xxxxxxxxx" required>
                                        <!--<small class="text-muted">OTP will be sent here</small>-->
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email Address <span class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Individual Images -->
                                    <div class="col-md-6">
                                        <label>Profile Photo <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="profile_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="profile_photo" accept="image/*"
                                            class="form-control @error('profile_photo') is-invalid @enderror"
                                            onchange="previewImage(this,'profile_preview')" required>
                                        @error('profile_photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>NID Front <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="nid_front_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="nid_front" accept="image/*"
                                            class="form-control @error('nid_front') is-invalid @enderror"
                                            onchange="previewImage(this,'nid_front_preview')" required>
                                        @error('nid_front')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>NID Back <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="nid_back_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="nid_back" accept="image/*"
                                            class="form-control @error('nid_back') is-invalid @enderror"
                                            onchange="previewImage(this,'nid_back_preview')" required>
                                        @error('nid_back')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- BUSINESS FIELDS -->
                            <div id="business_fields" style="display: {{ old('seller_type') == 2 ? 'block' : 'none' }};">
                                <h5 class="text-primary mb-4">Business / Company Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label>Business / Shop Name <span class="text-danger">*</span></label>
                                        <input type="text" name="shop_name"
                                            class="form-control @error('shop_name') is-invalid @enderror"
                                            value="{{ old('shop_name') }}">
                                        @error('shop_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Business Type <span class="text-danger">*</span></label>
                                        <select name="business_type"
                                            class="form-select @error('business_type') is-invalid @enderror">
                                            <option value="">Select</option>
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
                                    <div class="col-md-6">
                                        <label>Trade License Number <span class="text-danger">*</span></label>
                                        <input type="text" name="trade_license_no"
                                            class="form-control @error('trade_license_no') is-invalid @enderror"
                                            value="{{ old('trade_license_no') }}">
                                        @error('trade_license_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>BIN / TIN (Optional)</label>
                                        <input type="text" name="bin_tin" class="form-control"
                                            value="{{ old('bin_tin') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Owner Name <span class="text-danger">*</span></label>
                                        <input type="text" name="owner_name"
                                            class="form-control @error('owner_name') is-invalid @enderror"
                                            value="{{ old('owner_name') }}">
                                        @error('owner_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Owner NID Number <span class="text-danger">*</span></label>
                                        <input type="text" name="owner_nid"
                                            class="form-control @error('owner_nid') is-invalid @enderror"
                                            value="{{ old('owner_nid') }}">
                                        @error('owner_nid')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Business Email <span class="text-danger">*</span></label>
                                        <input type="email" name="business_email"
                                            class="form-control @error('business_email') is-invalid @enderror"
                                            value="{{ old('business_email') }}">
                                        @error('business_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Hotline Number <span class="text-danger">*</span></label>
                                        <input type="text" name="hotline"
                                            class="form-control @error('hotline') is-invalid @enderror"
                                            value="{{ old('hotline') }}">
                                        @error('hotline')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Business Images -->
                                    <div class="col-md-6">
                                        <label>Company Logo <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="logo_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="company_logo" accept="image/*"
                                            class="form-control @error('company_logo') is-invalid @enderror"
                                            onchange="previewImage(this,'logo_preview')">
                                        @error('company_logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Trade License Document <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="trade_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="trade_license_doc" accept="image/*"
                                            class="form-control @error('trade_license_doc') is-invalid @enderror"
                                            onchange="previewImage(this,'trade_preview')">
                                        @error('trade_license_doc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Owner NID Front <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="owner_nid_f_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="owner_nid_front" accept="image/*"
                                            class="form-control @error('owner_nid_front') is-invalid @enderror"
                                            onchange="previewImage(this,'owner_nid_f_preview')">
                                        @error('owner_nid_front')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Owner NID Back <span class="text-danger">*</span></label>
                                        <div class="upload-preview mb-2"><img id="owner_nid_b_preview" src="#"
                                                style="max-height:180px;display:none;" class="img-thumbnail"></div>
                                        <input type="file" name="owner_nid_back" accept="image/*"
                                            class="form-control @error('owner_nid_back') is-invalid @enderror"
                                            onchange="previewImage(this,'owner_nid_b_preview')">
                                        @error('owner_nid_back')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row g-3 mt-4">
                                <div class="col-md-6">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password')">
                                            <i class="fas fa-eye" id="password_icon"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="togglePassword('password_confirmation')">
                                            <i class="fas fa-eye" id="password_confirmation_icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                       <!-- Terms & Conditions Checkbox -->
                        <div class="col-md-12 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
                                </label>
                                <div class="invalid-feedback">
                                   You must agree before submitting.

                                </div>
                            </div>
                        </div>




                            <button type="submit" class="btn seller-app-btn mt-5 w-100">
                                <i class="fas fa-paper-plane me-2"></i> Submit Application
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>

<!-- Terms & Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg">

      <!-- Header -->
      <div class="modal-header bg-gradient bg-primary text-white">
        <h5 class="modal-title fw-bold" id="termsModalLabel">
          <i class="fas fa-file-contract me-2"></i> Vendor Terms & Conditions
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="বন্ধ করুন"></button>
      </div>

      <!-- Body -->
      <div class="modal-body bg-light">
        <h6 class="text-primary fw-bold mb-3">ই-কমার্স ভেন্ডর শর্তাবলী</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> ভেন্ডরকে অবশ্যই সঠিক ও সত্য তথ্য প্রদান করতে হবে।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> প্রতিটি পণ্যের বিবরণ, মূল্য এবং স্টক সঠিকভাবে আপডেট করতে হবে।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> গ্রাহকের অর্ডার নির্ধারিত সময়ে ডেলিভারি করতে হবে।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> ভেন্ডর কোনো ভুয়া বা নকল পণ্য বিক্রি করতে পারবেন না।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> গ্রাহকের ব্যক্তিগত তথ্য গোপন রাখতে হবে এবং তৃতীয় পক্ষের সাথে শেয়ার করা যাবে না।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> রিটার্ন ও রিফান্ড নীতিমালা মেনে চলতে হবে।</li>
          <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> প্ল্যাটফর্মের নিয়ম ভঙ্গ করলে ভেন্ডর অ্যাকাউন্ট স্থগিত করা হতে পারে।</li>
        </ul>
        <p class="mt-3 text-danger fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> নোট: প্ল্যাটফর্ম কর্তৃপক্ষ প্রয়োজনে শর্তাবলী পরিবর্তন করতে পারে।</p>
      </div>

      <!-- Footer -->
      <div class="modal-footer bg-gradient bg-secondary">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i> বন্ধ করুন
        </button>
      </div>

    </div>
  </div>
</div>

    </section>

    <!-- New flat styles inspired by register page (no gradients) -->


    <script>
        function selectSellerType(type) {
            const isIndividual = type === 'individual';

            // Radio button check করা
            document.getElementById('type_individual').checked = isIndividual;
            document.getElementById('type_business').checked = !isIndividual;

            // Visual border
            document.querySelectorAll('.seller-type-card').forEach(card => {
                card.classList.remove('border-primary', 'shadow-lg');
                card.classList.add('border-light');
            });
            event.currentTarget.classList.add('border-primary', 'shadow-lg');
            event.currentTarget.classList.remove('border-light');

            // Show/Hide fields
            document.getElementById('individual_fields').style.display = isIndividual ? 'block' : 'none';
            document.getElementById('business_fields').style.display = isIndividual ? 'none' : 'block';

            // এটাই মূল জাদু – hidden ফিল্ড থেকে required সরানো
            document.querySelectorAll('#individual_fields [required], #business_fields [required]').forEach(el => {
                el.removeAttribute('required');
                el.classList.remove('is-invalid');
            });

            // যেগুলো দেখাচ্ছে শুধু সেগুলোতে required দাও
            const visibleSection = isIndividual ? '#individual_fields' : '#business_fields';
            document.querySelectorAll(visibleSection + ' input, ' + visibleSection + ' select').forEach(el => {
                const name = el.getAttribute('name');
                // Optional ফিল্ড বাদ দিয়ে বাকিগুলোতে required দাও
                if (name && !['bin_tin'].includes(name)) {
                    el.setAttribute('required', 'required');
                }
            });
        }

        // Page load হলে প্রথমবার চালানো
        document.addEventListener('DOMContentLoaded', function() {
            const checked = document.querySelector('input[name="seller_type"]:checked');
            const type = checked && checked.value == 2 ? 'business' : 'individual';
            selectSellerType(type); // এটা দিয়ে required ঠিক হয়ে যাবে
        });

        // বাকি ফাংশন অপরিবর্তিত
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
