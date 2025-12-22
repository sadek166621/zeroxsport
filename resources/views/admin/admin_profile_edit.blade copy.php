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
                                                <input class="form-control" type="text" placeholder="Type here"
                                                    value="{{ $editData->name }}" name="name" />
                                            </div>
                                            <!-- Email -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" placeholder="example@mail.com"
                                                    value="{{ $editData->email }}" name="email" />
                                            </div>
                                            <!-- Phone -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control" type="number" placeholder="+1234567890"
                                                    name="phone" required value="{{ $editData->phone }}">
                                                <div class="invalid-feedback">Please Enter Your Number.</div>
                                            </div>
                                            <!-- Pickup Address -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Pickup Address</label>
                                                <input class="form-control" type="text" placeholder="Type here"
                                                    name="pickup_address" value="{{ $editData->pickup_address }}" required>
                                                <div class="invalid-feedback">Please Enter Your Address.</div>
                                            </div>
                                            <!-- Warehouse Address -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Warehouse Address</label>
                                                <input class="form-control" type="text" placeholder="Type here"
                                                    name="warehouse_address" value="{{ $editData->warehouse_address }}"
                                                    required>
                                                <div class="invalid-feedback">Please Enter Your Address.</div>
                                            </div>
                                            <!-- Office Address -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Office Address (optional)</label>
                                                <input class="form-control" type="text" placeholder="Type here"
                                                    name="office_address" value="{{ $editData->office_address }}">
                                            </div>

                                            <!-- Division -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Division</label>
                                                <select class="form-control select2" name="division" id="division"
                                                    required>
                                                    <option value="">Select Division</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}"
                                                            {{ $editData->division == $division->id ? 'selected' : '' }}>
                                                            {{ $division->division_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- District -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">District</label>
                                                <select class="form-control select2" name="district" id="district"
                                                    required>
                                                    <option value="">Select District</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ $editData->district == $district->id ? 'selected' : '' }}>
                                                            {{ $district->district_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Upazilla -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Upazilla</label>
                                                <select class="form-control select2" name="upazilla" id="upazilla"
                                                    required>
                                                    <option value="">Select Upazilla</option>
                                                    @foreach ($upazillas as $upazilla)
                                                        <option value="{{ $upazilla->id }}"
                                                            {{ $editData->upazilla == $upazilla->id ? 'selected' : '' }}>
                                                            {{ $upazilla->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Google Map Location -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Google Map Location (optional)</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Paste Google Map Link" name="map_location"
                                                    value="{{ $editData->map_location }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Profile Image -->
                                    <aside class="col-lg-4">
                                        <figure class="text-lg-center">
                                            <img id="showImage" class="img-lg mb-3 img-avatar"
                                                src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                                                alt="User Photo" />
                                            <input type="file" id="image" name="profile_image" required>
                                            <div class="invalid-feedback">Please Enter Your Image.</div>
                                        </figure>
                                    </aside>
                                </div>
                                <button class="btn btn-primary" type="submit">Save changes</button>
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

        $('#division, #district, #upazilla').select2();

        // Division -> District
        $('#division').on('change', function() {
            let division_id = $(this).val();

            $('#district').html('<option value="">Loading...</option>');
            $('#upazilla').html('<option value="">Select Upazilla</option>');

            if (division_id) {
                $.ajax({
                    url: "/admin/get-district/" + division_id,  // <-- FIXED
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#district').empty().append('<option value="">Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="' + value.id + '">' + value.district_name_en + '</option>');
                        });
                        $('#district').trigger('change');
                    }
                });
            }
        });

        // District -> Upazilla
        $('#district').on('change', function() {
            let district_id = $(this).val();

            $('#upazilla').html('<option value="">Loading...</option>');

            if (district_id) {
                $.ajax({
                    url: "/admin/get-upazilla/" + district_id,  // <-- FIXED
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#upazilla').empty().append('<option value="">Select Upazilla</option>');
                        $.each(data, function(key, value) {
                            $('#upazilla').append('<option value="' + value.id + '">' + value.name_en + '</option>');
                        });
                        $('#upazilla').trigger('change');
                    }
                });
            }
        });

    });
</script>

@endsection
