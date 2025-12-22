@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Edit Profile</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row gx-5">
                    @include('admin.body.asidebar')
                    <div class="col-lg-9">
                        <section class="content-body p-xl-4">
                            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data"
                                class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row gx-3">
                                            <!-- Name -->
                                            <div class="col-6 mb-3">
                                                <label class="form-label">First name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $editData->name }}">
                                            </div>
                                            <!-- Email -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $editData->email }}">
                                            </div>
                                            <!-- Phone -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control" type="number" name="phone"
                                                    value="{{ $editData->phone }}">
                                            </div>

                                            <!-- Address Information -->
                                            <h5>Address Information</h5>
                                            <div class="col-lg-6 mb-3">
                                                <label>Pickup Address</label>
                                                <input type="text" name="pickup_address"
                                                    value="{{ $editData->pickup_address ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Warehouse Address</label>
                                                <input type="text" name="warehouse_address"
                                                    value="{{ $editData->warehouse_address ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Office Address (optional)</label>
                                                <input type="text" name="office_address"
                                                    value="{{ $editData->office_address ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Division</label>
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
                                            <div class="col-lg-6 mb-3">
                                                <label>District</label>
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
                                            <div class="col-lg-6 mb-3">
                                                <label>Upazilla</label>
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

                                        <div class="col-lg-6 mb-3">
                                                <label>Shipping Zone</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping_zone" id="zoneDhaka" value="1"
                                                        {{ $vendor->shipping_zone == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="zoneDhaka">
                                                        Dhaka
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping_zone" id="zoneOutsideDhaka" value="2"
                                                        {{ $vendor->shipping_zone == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="zoneOutsideDhaka">
                                                        Outside Dhaka
                                                    </label>
                                                </div>
                                            </div>
                                         </div>

                                            <div class="col-lg-6 mb-3">
                                                <label>Google Map Location (optional)</label>
                                                <input type="text" name="map_location"
                                                    value="{{ $editData->map_location ?? '' }}" class="form-control">
                                            </div>

                                            <!-- Bank / Payment Information -->
                                            <h5>Bank / Payment Information</h5>
                                            <div class="col-lg-6 mb-3">
                                                <label>Account Holder Name</label>
                                                <input type="text" name="holder_name"
                                                    value="{{ $vendor->holder_name ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Bank Name</label>
                                                <input type="text" name="bank_name"
                                                    value="{{ $vendor->bank_name ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Branch</label>
                                                <input type="text" name="branch_name"
                                                    value="{{ $vendor->branch_name ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Routing Number</label>
                                                <input type="text" name="routing_number"
                                                    value="{{ $vendor->routing_number ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Bank Account Number</label>
                                                <input type="text" name="bank_account"
                                                    value="{{ $vendor->bank_account ?? '' }}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Upload Bank Cheque / Statement</label>
                                                <input type="file" name="bank_document" class="form-control">
                                                @if (!empty($vendor->bank_document))
                                                    <a href="{{ url('upload/bank_documents/' . $vendor->bank_document) }}"
                                                        target="_blank">View Existing</a>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label>Alternative Payment (bKash/Nagad)</label>
                                                <input type="text" name="alternative_payment"
                                                    value="{{ $vendor->alternative_payment ?? '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Profile Image -->
                                    <aside class="col-lg-4">
                                        <figure class="text-lg-center">
                                            <img id="showImage" class="img-lg mb-3 img-avatar"
                                                src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                                alt="User Photo">
                                            <input type="file" id="image" name="profile_image">
                                        </figure>
                                    </aside>
                                </div>
                                <button class="btn btn-primary mt-3" type="submit">Save changes</button>
                            </form>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Enable Select2 on all dropdowns
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
