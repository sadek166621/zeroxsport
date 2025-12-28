@extends('admin.admin_master')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<section class="content-main py-4">
    <div class="container">
        <div class="content-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="content-title mb-1">Edit Profile</h2>
                    <p class="text-muted small mb-0">Update your personal and business information</p>
                </div>
            </div>
        </div>

        @include('admin.body.asidebar')

        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="row gx-4">
                <!-- Main Form Section -->
                <div class="col-lg-8">
                    <!-- Basic Information -->
                    <div class="card shadow-sm mb-4 border-0">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 text-primary">
                                <i class="icon material-icons md-person"></i> Basic Information
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Full Name</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ $editData->name }}" required>
                                    <div class="invalid-feedback">Please enter your name</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Email Address</label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ $editData->email }}" required>
                                    <div class="invalid-feedback">Please enter a valid email</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Phone Number</label>
                                    <input class="form-control" type="tel" name="phone"
                                        value="{{ $editData->phone }}" required>
                                    <div class="invalid-feedback">Please enter your phone number</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="card shadow-sm mb-4 border-0">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 text-primary">
                                <i class="icon material-icons md-location_on"></i> Address Information
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Pickup Address</label>
                                    <input type="text" name="pickup_address"
                                        value="{{ $editData->pickup_address ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter pickup address">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Warehouse Address</label>
                                    <input type="text" name="warehouse_address"
                                        value="{{ $editData->warehouse_address ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter warehouse address">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Office Address <span class="text-muted small">(Optional)</span></label>
                                    <input type="text" name="office_address"
                                        value="{{ $editData->office_address ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter office address">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Division</label>
                                    <select name="division" id="division" class="form-control select2">
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ ($editData->division ?? '') == $division->id ? 'selected' : '' }}>
                                            {{ $division->division_name_en }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">District</label>
                                    <select name="district" id="district" class="form-control select2">
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ ($editData->district ?? '') == $district->id ? 'selected' : '' }}>
                                            {{ $district->district_name_en }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Upazilla</label>
                                    <select name="upazilla" id="upazilla" class="form-control select2">
                                        <option value="">Select Upazilla</option>
                                        @foreach ($upazillas as $upazilla)
                                        <option value="{{ $upazilla->id }}"
                                            {{ ($editData->upazilla ?? '') == $upazilla->id ? 'selected' : '' }}>
                                            {{ $upazilla->name_en }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Google Map Location <span class="text-muted small">(Optional)</span></label>
                                    <input type="url" name="map_location"
                                        value="{{ $editData->map_location ?? '' }}"
                                        class="form-control"
                                        placeholder="https://maps.google.com/...">
                                    <small class="text-muted">Paste the Google Maps embed or share link</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Zone (Vendor Only) -->
                    @if(Auth::guard('admin')->user()->role == 2)
                    <div class="card shadow-sm mb-4 border-0">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 text-primary">
                                <i class="icon material-icons md-local_shipping"></i> Shipping Information
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <label class="form-label">Shipping Zone</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_zone"
                                        id="zoneDhaka" value="1"
                                        {{ $vendor->shipping_zone == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="zoneDhaka">
                                        <i class="icon material-icons md-location_city text-primary"></i> Dhaka
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_zone"
                                        id="zoneOutsideDhaka" value="2"
                                        {{ $vendor->shipping_zone == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="zoneOutsideDhaka">
                                        <i class="icon material-icons md-public text-info"></i> Outside Dhaka
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bank / Payment Information -->
                    <div class="card shadow-sm mb-4 border-0">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 text-primary">
                                <i class="icon material-icons md-account_balance"></i> Banking & Payment Details
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" name="holder_name"
                                        value="{{ $vendor->holder_name ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter account holder name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name"
                                        value="{{ $vendor->bank_name ?? '' }}"
                                        class="form-control"
                                        placeholder="e.g., DBBL, City Bank">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Branch Name</label>
                                    <input type="text" name="branch_name"
                                        value="{{ $vendor->branch_name ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter branch name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Routing Number</label>
                                    <input type="text" name="routing_number"
                                        value="{{ $vendor->routing_number ?? '' }}"
                                        class="form-control"
                                        placeholder="9-digit routing number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Bank Account Number</label>
                                    <input type="text" name="bank_account"
                                        value="{{ $vendor->bank_account ?? '' }}"
                                        class="form-control"
                                        placeholder="Enter account number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alternative Payment <span class="text-muted small">(bKash/Nagad)</span></label>
                                    <input type="text" name="alternative_payment"
                                        value="{{ $vendor->alternative_payment ?? '' }}"
                                        class="form-control"
                                        placeholder="01XXXXXXXXX">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Bank Document (Cheque/Statement)</label>
                                    <input type="file" name="bank_document" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                    @if (!empty($vendor->bank_document))
                                    <div class="mt-2">
                                        <a href="{{ url('upload/bank_documents/' . $vendor->bank_document) }}"
                                            target="_blank"
                                            class="btn btn-sm btn-outline-info">
                                            <i class="icon material-icons md-visibility"></i> View Current Document
                                        </a>
                                    </div>
                                    @endif
                                    <small class="text-muted">Supported formats: PDF, JPG, PNG (Max 2MB)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 mb-4">
                        <button class="btn btn-primary px-4" type="submit">
                            <i class="icon material-icons md-save"></i> Save Changes
                        </button>
                        <a href="{{ route('admin.profile') }}" class="btn btn-light px-4">
                            <i class="icon material-icons md-close"></i> Cancel
                        </a>
                    </div>
                </div>

                <!-- Sidebar - Profile Image -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 sticky-top">
                        <div class="card-header bg-white border-bottom py-3">
                            <h6 class="mb-0 text-primary">
                                <i class="icon material-icons md-photo_camera"></i> Profile Photo
                            </h6>
                        </div>
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <img id="showImage"
                                    class="rounded-circle border border-3 shadow-sm"
                                    style="width: 180px; height: 180px; object-fit: cover;"
                                    src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                    alt="Profile Photo">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="btn btn-outline-primary w-100">
                                    <i class="icon material-icons md-cloud_upload"></i> Choose New Photo
                                </label>
                                <input type="file" id="image" name="profile_image" class="d-none" accept="image/*">
                            </div>
                            <small class="text-muted">Recommended: Square image, at least 400x400px</small>
                        </div>
                    </div>

                    <!-- Quick Tips -->
                    <div class="card shadow-sm border-0 mt-4">
                        <div class="card-body p-4">
                            <h6 class="text-primary mb-3">
                                <i class="icon material-icons md-info"></i> Quick Tips
                            </h6>
                            <ul class="small text-muted mb-0" style="padding-left: 20px;">
                                <li class="mb-2">Keep your contact information up to date</li>
                                <li class="mb-2">Upload a professional profile photo</li>
                                <li class="mb-2">Verify your bank details for payments</li>
                                <li class="mb-2">Add your Google Maps location for easier navigation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            placeholder: "Select an option",
            allowClear: true,
            width: '100%',
            theme: 'default'
        });

        // Image preview
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        // Form validation
        (function() {
            'use strict';
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    });
</script>

<style>
    .form-label {
        font-weight: 600;
        color: #344054;
        margin-bottom: 0.5rem;
        font-size: 14px;
    }

    .form-label.required::after {
        content: " *";
        color: #dc3545;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #d0d5dd;
        padding: 0.625rem 0.875rem;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .card {
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.625rem 1.25rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn .icon.material-icons {
        font-size: 18px;
    }

    .icon.material-icons {
        font-size: 18px;
        vertical-align: middle;
    }

    .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
    }

    .form-check-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #d0d5dd;
        border-radius: 8px;
        height: 42px;
        padding: 0.375rem 0.875rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 42px;
        padding-left: 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
    }

    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #667eea;
    }

    .sticky-top {
        position: sticky;
        top: 85px;
        z-index: 99;
    }

    @media (max-width: 991px) {
        .sticky-top {
            position: relative !important;
            top: 0 !important;
        }
    }
</style>

@endsection