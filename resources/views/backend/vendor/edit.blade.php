@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content-main">

    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="content-header">
                <h2 class="content-title">Edit Vendor</h2>
                <a href="{{ route('vendor.index') }}" class="btn btn-primary p-3" title="Vendor List">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('vendor.update',$vendor->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Personal Info Section -->
                        <h5 class="mb-3">Personal Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Shop Owner Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="shop_owner_name" value="{{$vendor->full_name}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Shop Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="shop_name" value="{{$vendor->shop_name}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" value="{{$vendor->phone ?? $vendor->user->phone ?? ''}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{$vendor->email ?? $vendor->user->email ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{$vendor->address}}">
                            </div>
                        </div>

                        <!-- Commission Section -->
                        <h5 class="mb-3 mt-4">Commission</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Commission Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="comission_type">
                                    <option value="1" {{ $vendor->comission_type == '1' ? 'selected' : '' }}>Flat</option>
                                    <option value="2" {{ $vendor->comission_type == '2' ? 'selected' : '' }}>Percent %</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Commission <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="commission" value="{{$vendor->commission}}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{$vendor->description}}</textarea>
                            </div>
                        </div>

                        <!-- Social & Online Section -->
                        <h5 class="mb-3 mt-4">Social & Online</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Facebook URL</label>
                                <input class="form-control" type="text" name="fb_url" value="{{$vendor->fb_url}}">
                            </div>
                        </div>

                        <!-- Bank Details Section -->
                        <h5 class="mb-3 mt-4">Bank Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Bank Name</label>
                                <input class="form-control" type="text" name="bank_name" value="{{$vendor->bank_name}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Bank Account</label>
                                <input class="form-control" type="text" name="bank_account" value="{{$vendor->bank_account}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Bank Document</label>
                                <input class="form-control" type="file" name="bank_document">
                                @if($vendor->bank_document)
                                <img src="{{asset($vendor->bank_document)}}" alt="Bank Document" width="100" height="80">
                                @endif
                            </div>
                        </div>

                        <!-- Alternative Payment Section -->
                        <h5 class="mb-3 mt-4">Alternative Payment</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Account Number</label>
                                <input class="form-control" type="text" name="account_number" value="{{$vendor->account_number}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Holder Name</label>
                                <input class="form-control" type="text" name="holder_name" value="{{$vendor->holder_name}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Branch Name</label>
                                <input class="form-control" type="text" name="branch_name" value="{{$vendor->branch_name}}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Routing Number</label>
                                <input class="form-control" type="text" name="routing_number" value="{{$vendor->routing_number}}">
                            </div>
                        </div>

                        <!-- Documents Section -->
                        <h5 class="mb-3 mt-4">Documents</h5>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Profile Photo</label>
                                <input type="file" class="form-control" name="profile_photo" id="image">
                                <img id="showImage" src="{{asset($vendor->profile_photo)}}" width="100" height="80">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Shop Profile</label>
                                <input type="file" class="form-control" name="shop_profile" id="image5">
                                <img id="showImage5" src="{{asset($vendor->shop_profile)}}" width="100" height="80">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Shop Cover Photo</label>
                                <input type="file" class="form-control" name="shop_cover" id="image2">
                                <img id="showImage2" src="{{asset($vendor->shop_cover)}}" width="100" height="80">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">NID Front</label>
                                <input type="file" class="form-control" name="nid" id="image3">
                                <img id="showImage3" src="{{asset($vendor->nid_front)}}" width="100" height="80">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">NID Back</label>
                                <input type="file" class="form-control" name="nid_back" id="image4">
                                <img id="showImage4" src="{{asset($vendor->nid_back)}}" width="100" height="80">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Trade License</label>
                                <input type="file" class="form-control" name="trade_license" id="image6">
                                <img id="showImage6" src="{{asset($vendor->trade_license_doc)}}" width="100" height="80">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Trade License No</label>
                            <input type="text" class="form-control" name="trade_license_no" value="{{$vendor->trade_license_no}}">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $vendor->status == 1 ? 'checked': '' }}>
                                <label class="form-check-label" for="status">Status</label>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('footer-script')
<script>
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() { readURL(this, '#showImage'); });
    $("#image2").change(function() { readURL(this, '#showImage2'); });
    $("#image3").change(function() { readURL(this, '#showImage3'); });
    $("#image4").change(function() { readURL(this, '#showImage4'); });
    $("#image5").change(function() { readURL(this, '#showImage5'); });
    $("#image6").change(function() { readURL(this, '#showImage6'); });
</script>
@endpush

@endsection
