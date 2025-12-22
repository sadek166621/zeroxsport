@extends('admin.admin_master')
@section('title', 'Add Affiliate')

@section('admin')
<section class="content-main">
    <div class="content-header d-flex justify-content-between align-items-center mb-4">
        <h2 class="">Add New Affiliate</h2>
        <a href="{{ route('affiliates.index') }}" class="btn btn-secondary">
            <i class="material-icons md-arrow_back"></i> Back to List
        </a>
    </div>

    <div class="card p-4">
        <form action="{{ route('affiliates.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="fw-bold">Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Affiliate Name">
            </div>

            <div class="mb-3">
                <label class="fw-bold">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Email Address">
            </div>

            <div class="mb-3">
                <label class="fw-bold">Phone</label>
                <input type="text" name="phone" class="form-control" required placeholder="Phone Number">
            </div>

            <div class="mb-3">
                <label class="fw-bold">Ghorkonnaya/Uparjok Affiliate ID</label>
                <input type="text" name="affiliate_id" class="form-control" placeholder="Affiliate ID">
            </div>

            <div class="mb-3">
                <label class="fw-bold">Password</label>
                <div class="input-group">
                    <input id="password" type="password" name="password" class="form-control" required placeholder="Password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                        <i id="password-icon" class="material-icons md-lock_open"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('affiliates.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</section>

<script>
    function togglePassword() {
        const pwdInput = document.getElementById('password');
        const pwdIcon = document.getElementById('password-icon');
        if (pwdInput.type === "password") {
            pwdInput.type = "text";
            pwdIcon.textContent = 'md-lock';
        } else {
            pwdInput.type = "password";
            pwdIcon.textContent = 'md-lock_open';
        }
    }
</script>
@endsection
