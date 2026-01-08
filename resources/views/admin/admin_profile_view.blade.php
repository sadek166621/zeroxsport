@extends('admin.admin_master')
@section('admin')



<section class="content-main py-4">
    <div class="container">
        <div class="content-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="content-title mb-1">Profile Overview</h2>
                    <p class="text-muted small mb-0">Manage your personal and business information</p>
                </div>
            </div>
        </div>

        @include('admin.body.asidebar')

        <div class="row gx-4">
            <!-- Profile Card -->
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4 border-0">
                    <div class="position-relative">
                        <div class="bg-gradient" style="height:120px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                        <div class="text-center" style="margin-top:-60px;">
                            <div class="d-inline-block position-relative">
                                <img src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                    class="rounded-circle border border-4 border-white shadow"
                                    style="width:120px; height:120px; object-fit:cover;"
                                    alt="User Avatar">
                                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
                                    style="width:20px; height:20px;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center pt-3 pb-4">
                        <h5 class="mb-1">{{ $adminData->name ?? 'N/A' }}</h5>
                        <p class="text-muted small mb-3">
                            @if(Auth::guard('admin')->user()->role == 1)
                            <span class="badge bg-primary">Administrator</span>
                            @elseif(Auth::guard('admin')->user()->role == 2)
                            <span class="badge bg-info">Vendor</span>
                            @endif
                        </p>

                        <div class="d-grid gap-2 mb-3">
                            <div class="d-flex align-items-center justify-content-center gap-2 py-2 px-3 bg-light rounded">
                                <i class="icon material-icons md-email text-primary"></i>
                                <small class="text-truncate">{{ $adminData->email ?? 'N/A' }}</small>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-2 py-2 px-3 bg-light rounded">
                                <i class="icon material-icons md-phone text-success"></i>
                                <small>{{ $adminData->phone ?? 'N/A' }}</small>
                            </div>
                        </div>

                        @if(Auth::guard('admin')->user()->role == 2)
                        @php
                        $vendor = \App\Models\Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
                        @endphp
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">Current Balance</span>
                                <h6 class="mb-0 text-success">৳ {{ number_format($vendor->balance ?? 0, 2) }}</h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small">Shipping Zone</span>
                                <span class="badge bg-info">{{ $vendor->shipping_zone == 1 ? 'Dhaka' : 'Outside Dhaka' }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="col-lg-8">
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
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Pickup Address</label>
                                    <p class="mb-0 fw-medium">{{ $adminData->pickup_address ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Warehouse Address</label>
                                    <p class="mb-0 fw-medium">{{ $adminData->warehouse_address ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Office Address</label>
                                    <p class="mb-0 fw-medium">{{ $adminData->office_address ?? 'Not provided' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <div class="info-item p-3 bg-light rounded">
                                    <label class="small text-muted mb-1 d-block">Division</label>
                                    <span class="fw-medium">{{ $adminData->division ? \App\Models\Division::find($adminData->division)->division_name_en : 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-item p-3 bg-light rounded">
                                    <label class="small text-muted mb-1 d-block">District</label>
                                    <span class="fw-medium">{{ $adminData->district ? \App\Models\District::find($adminData->district)->district_name_en : 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-item p-3 bg-light rounded">
                                    <label class="small text-muted mb-1 d-block">Upazilla</label>
                                    <span class="fw-medium">{{ $adminData->upazilla ? \App\Models\Upazilla::find($adminData->upazilla)->name_en : 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        @if ($adminData->map_location)
                        <div class="mt-3">
                            <a href="{{ $adminData->map_location }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="icon material-icons md-map"></i> View on Google Maps
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Bank Information (Vendor Only) -->
                @if (Auth::guard('admin')->user()->role == 2)
                @php
                $vendor = \App\Models\Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
                @endphp

                <div class="card shadow-sm mb-4 border-0">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 text-primary">
                            <i class="icon material-icons md-account_balance"></i> Banking & Payment Details
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Account Holder Name</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->holder_name ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Bank Name</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->bank_name ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Branch Name</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->branch_name ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Routing Number</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->routing_number ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Bank Account Number</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->bank_account ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Alternative Payment</label>
                                    <p class="mb-0 fw-medium">{{ $vendor->alternative_payment ?? 'Not provided' }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-item">
                                    <label class="small text-muted mb-1">Bank Document</label>
                                    <div class="mt-1">
                                        @if (!empty($vendor->bank_document))
                                        <a href="{{ url('upload/bank_documents/' . $vendor->bank_document) }}"
                                            target="_blank"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="icon material-icons md-description"></i> View Document
                                        </a>
                                        @else
                                        <span class="text-danger small">No document uploaded</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Map Location -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom py-3">
                        <h6 class="mb-0 text-primary">
                            <i class="icon material-icons md-map"></i> Location Map
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        @if ($adminData->map_location && filter_var($adminData->map_location, FILTER_VALIDATE_URL))
                        <iframe src="{{ $adminData->map_location }}"
                            width="100%"
                            height="350"
                            style="border:0; border-radius: 0 0 8px 8px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        @else
                        <div class="text-center py-5">
                            <i class="icon material-icons md-location_off text-muted" style="font-size: 48px;"></i>
                            <p class="text-muted mt-2">Map location not available</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .info-item label {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 11px;
    }

    .card {
        border-radius: 10px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }

    .bg-gradient {
        border-radius: 10px 10px 0 0;
    }

    .icon.material-icons {
        font-size: 18px;
        vertical-align: middle;
    }

    .btn {
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .badge {
        padding: 6px 12px;
        font-weight: 500;
    }
</style>

@endsection