@extends('admin.admin_master')
@section('admin')

<section class="content-main py-4">
    <div class="container">
        <div class="content-header mb-4">
            <h2 class="content-title">Profile & Bank Information</h2>
        </div>

        <div class="row gx-5">
            @include('admin.body.asidebar')

            <div class="col-lg-9">

                <!-- User Card -->
                <div class="card shadow-sm mb-4">
                    <div class="position-relative">
                        <div class="bg-image" style="height:150px; background-image: url({{ asset('backend/images/2.jpg') }}); background-size: cover; background-position: center;"></div>
                        <div class="position-absolute top-100 start-50 translate-middle" style="margin-top:-50px;">
                            <img src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                class="rounded-circle border border-3" style="width:100px; height:100px;" alt="User Avatar">
                        </div>
                    </div>

                    <div class="card-body mt-4">
                        <h5 class="text-primary mb-3">Personal & Address Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Name</span>
                                <p>{{ $adminData->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Email</span>
                                <p>{{ $adminData->email ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Phone</span>
                                <p>{{ $adminData->phone ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Pickup Address</span>
                                <p>{{ $adminData->pickup_address ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Warehouse Address</span>
                                <p>{{ $adminData->warehouse_address ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-info text-dark">Office Address</span>
                                <p>{{ $adminData->office_address ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="badge bg-info text-dark">Division</span>
                                <p>{{ $adminData->division ? \App\Models\Division::find($adminData->division)->division_name_en : 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="badge bg-info text-dark">District</span>
                                <p>{{ $adminData->district ? \App\Models\District::find($adminData->district)->district_name_en : 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-2">
                                <span class="badge bg-info text-dark">Upazilla</span>
                                <p>{{ $adminData->upazilla ? \App\Models\Upazilla::find($adminData->upazilla)->name_en : 'N/A' }}</p>
                            </div>
                          
                            <div class="col-12 mb-2">
                                <span class="badge bg-info text-dark">Map Location</span>
                                <p>
                                    @if ($adminData->map_location)
                                        <a href="{{ $adminData->map_location }}" target="_blank">View on Map</a>
                                    @else
                                        <span class="text-danger">Not Available</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bank / Vendor Info -->
                @if (Auth::guard('admin')->user()->role == 2)
                    @php
                        $vendor = \App\Models\Vendor::where('user_id', Auth::guard('admin')->user()->id)->first();
                    @endphp

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="text-primary mb-3">Bank / Payment Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Account Holder Name</span>
                                    <p>{{ $vendor->holder_name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Bank Name</span>
                                    <p>{{ $vendor->bank_name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Branch</span>
                                    <p>{{ $vendor->branch_name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Routing Number</span>
                                    <p>{{ $vendor->routing_number ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Bank Account Number</span>
                                    <p>{{ $vendor->bank_account ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Bank Document</span>
                                    <p>
                                        @if (!empty($vendor->bank_document))
                                            <a href="{{ url('upload/bank_documents/' . $vendor->bank_document) }}" target="_blank">View Document</a>
                                        @else
                                            <span class="text-danger">Not uploaded</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Alternative Payment</span>
                                    <p>{{ $vendor->alternative_payment ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <span class="badge bg-warning text-dark">Balance</span>
                                    <p>৳ {{ $vendor->balance ?? 0 }}</p>
                                </div>
                                  <div class="col-md-4 mb-2">
                                <span class="badge bg-info text-dark">Shipping Zone</span>
                                <p>{{ $vendor->shipping_zone ==1? 'Dhaka' : 'Outside Dhaka' ?? ' ' }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Map Section -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="text-primary mb-3">Location Map</h5>
                        @if ($adminData->map_location && filter_var($adminData->map_location, FILTER_VALIDATE_URL))
                            <iframe src="{{ $adminData->map_location }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <p class="text-muted text-center">Map not available or invalid URL</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
