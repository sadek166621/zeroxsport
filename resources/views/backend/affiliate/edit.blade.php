@extends('admin.admin_master')
@section('admin')

<section class="content-main">
    <div class="content-header d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Affiliate</h2>
        <a href="{{ route('affiliates.index') }}" class="btn btn-secondary">
            <i class="material-icons md-arrow_back"></i> Back to List
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('affiliates.update', $affiliate->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="col-form-label fw-bold">Name:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $affiliate->name) }}"
                            required placeholder="Affiliate Name">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="col-form-label fw-bold">Phone:</label>
                        <input class="form-control" type="text" name="phone"
                            value="{{ old('phone', $affiliate->phone) }}" required placeholder="Phone Number">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="col-form-label fw-bold">Email:</label>
                        <input class="form-control" type="email" name="email"
                            value="{{ old('email', $affiliate->email) }}" required placeholder="Email Address">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="col-form-label fw-bold">Ghorkonnaya/Uparjok Affiliate ID:</label>
                        <input class="form-control" type="text" name="affiliate_id"
                            value="{{ old('affiliate_id', $affiliate->affiliate_member_id ?? '') }}" placeholder="Affiliate ID">
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="col-form-label fw-bold">Password: <small class="text-muted">(Leave blank to keep
                                current password)</small></label>
                        <div class="input-group">
                            <input id="password" class="form-control" type="password" name="password"
                                placeholder="New Password">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                <i id="password-icon" class="material-icons md-lock_open"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this affiliate?')">Update Affiliate</button>
                    <a href="{{ route('affiliates.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function togglePassword() {
        const pwdInput = document.getElementById('password');
        const pwdIcon = document.getElementById('password-icon');
        if (pwdInput.type === "password") {
            pwdInput.type = "text";
            pwdIcon.textContent = 'md-lock'; // icon for "locked"
        } else {
            pwdInput.type = "password";
            pwdIcon.textContent = 'md-lock_open'; // icon for "unlocked"
        }
    }
</script>

@endsection
