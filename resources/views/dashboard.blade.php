@extends('FrontEnd.master')
@section('title')
Dashboard | Modern Dashboard
@endsection
@section('content')

<div class="dashboard-container">
    <div class="custom_container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3 ">
                <div class="dashboard-sidebar">
                    <div
                        class="user-profile modern-user-profile p-2 shadow-sm rounded-3 position-relative text-center d-flex align-items-center gap-4">
                        <div class="profile-bg rounded-3 position-absolute top-0 start-0 w-100 h-100"
                            style="background: linear-gradient(135deg, #01B45E 0%, #efc1ba 100%); opacity: 0.08; z-index: 0;">
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="profile-image position-relative" style="z-index:1;">
                                    @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))
                                    <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile"
                                        class="rounded-circle border border-3 border-white shadow"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    @else
                                    <div class="default-avatar rounded-circle border border-3 border-white shadow d-flex align-items-center justify-content-center"
                                        style="width: 100px; height: 100px; background: #f8f9fa;">
                                        <i class="fas fa-user-circle" style="font-size: 60px; color: #01B45E;"></i>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="profile-info position-relative text-start" style="z-index:1;">
                                    <div class="d-flex flex-column text-start">
                                        <h4 class="fw-semibold mb-1">{{ Auth::user()->name ?? 'User' }}</h4>
                                        <p class="text-muted mb-2 small">
                                            <i class="fas fa-envelope me-1"></i> {{ Auth::user()->email }}
                                        </p>
                                        @if(Auth::user()->phone)
                                        <p class="text-muted mb-2 small">
                                            <i class="fas fa-phone me-1"></i> {{ Auth::user()->phone }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-auto mt-3">
                                <a href="javascript:void(0)" onclick="openProfileTab()"
                                    class="btn btn-sm "
                                    style="border-radius: 20px; border: 1px solid #01B45E; color: #01B45E;">
                                    <i class="fas fa-user-edit me-1"></i> Edit Profile
                                </a>
                            </div> -->
                        </div>
                    </div>

                    <nav class="dashboard-nav mt-3">
                        <div class="nav-group">
                            <p class="nav-label">MAIN MENU</p>
                            <ul>
                                <li onclick="scrollToTop()">
                                    <a href="javascript:void(0)" class="nav-link" onclick="openDashboardTab()">
                                        <i class="fas fa-home"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li onclick="scrollToTop()">
                                    <a href="javascript:void(0)" class="nav-link" onclick="openOrdersTab()">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span>My Orders</span>
                                    </a>
                                </li>
                                <!-- <li onclick="scrollToTop()">
                                        <a href="javascript:void(0)" class="nav-link" onclick="openReturnRequestsTab()">
                                            <i class="fas fa-undo"></i>
                                            <span>Return Requests</span>
                                        </a>
                                    </li> -->
                            </ul>
                        </div>

                        <div class="nav-group">
                            <p class="nav-label">ACCOUNT SETTINGS</p>
                            <ul>
                                <li onclick="scrollToTop()">
                                    <a href="javascript:void(0)" class="nav-link" onclick="openProfileTab()">
                                        <i class="fas fa-user"></i>
                                        <span>Profile Details</span>
                                    </a>
                                </li>
                                <li onclick="scrollToTop()">
                                    <a href="javascript:void(0)" class="nav-link" onclick="openPasswordTab()">
                                        <i class="fas fa-lock"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>

                                <li onclick="scrollToTop()">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="dashboard-content">
                    <div class="tab-content">
                        <!-- Dashboard Overview -->
                        <div class="tab-pane fade show active" id="dashboard">
                            <div class="content-header d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h2 class="fw-semibold mb-1" style="font-size:2rem;">Welcome,
                                        {{ Auth::user()->name ?? 'User' }}!
                                    </h2>
                                    <p class="text-muted mb-0">Here’s a quick summary of your account activity.</p>
                                </div>
                                <div>

                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3 col-6">
                                    <div class="card shadow-sm border-0 stat-modern-card h-100">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="stat-modern-icon bg-primary bg-opacity-10 text-white me-3">
                                                <i style="font-size: large;" class="fas fa-shopping-cart"></i>
                                            </div>
                                            <div>
                                                <div class="fs-4 fw-bold">{{ count($all) }}</div>
                                                <div class="text-muted small">Total Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card shadow-sm border-0 stat-modern-card h-100">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="stat-modern-icon bg-warning bg-opacity-10 text-warning me-3">
                                                <i style="font-size: large;" class="fas fa-clock"></i>
                                            </div>
                                            <div>
                                                <div class="fs-4 fw-bold">{{ count($pending) }}</div>
                                                <div class="text-muted small">Pending Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card shadow-sm border-0 stat-modern-card h-100">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="stat-modern-icon bg-success bg-opacity-10 text-success me-3">
                                                <i style="font-size: large;" class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <div class="fs-4 fw-bold">{{ count($completed) }}</div>
                                                <div class="text-muted small">Completed Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card shadow-sm border-0 stat-modern-card h-100">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="stat-modern-icon bg-info bg-opacity-10 text-info me-3">
                                                <i style="font-size: large;" class="fas fa-coins"></i>
                                            </div>
                                            <div>
                                                <div class="fs-4 fw-bold">{{ Auth::user()->points ?? '0' }}</div>
                                                <div class="text-muted small">Reward Points</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="recent-orders">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h3 class="fw-semibold mb-0">Recent Orders</h3>
                                    <a href="#orders" class="btn btn-sm btn-outline-primary">View All</a>
                                </div>
                                <div class="row g-3">
                                    @foreach($orders->take(5) as $order)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-0 shadow-sm order-card h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span
                                                        class="badge rounded-pill status-badge {{ strtolower($order->delivery_status) }} me-2">
                                                        {{ $order->delivery_status }}
                                                    </span>
                                                    <span
                                                        class="ms-auto text-muted small">{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <span class="fw-bold">Order #{{ $order->invoice_no }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <span class="text-muted">Total:</span>
                                                    <span
                                                        class="fw-semibold">৳{{ number_format($order->grand_total, 2) }}</span>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('order.view', $order->invoice_no) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        Invoice
                                                    </a>
                                                    <a href="{{ route('order.details', $order->invoice_no) }}"
                                                        class="btn btn-sm btn-outline-secondary">
                                                        Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="orders">
                            <div class="content-header">
                                <h2>My Orders</h2>
                                <p>Track and manage your orders</p>
                            </div>

                            <div class="orders-wrapper">
                                <div class="table-responsive">
                                    <table class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>#{{ $order->invoice_no }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}</td>
                                                <td>
                                                    <span
                                                        class="status-badge {{ strtolower($order->delivery_status) }}">
                                                        {{ $order->delivery_status }}
                                                    </span>
                                                </td>
                                                <td>৳{{ number_format($order->grand_total, 2) }}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('order.view', $order->invoice_no) }}"
                                                            class="btn btn-sm btn-outline-primary">
                                                            View Details
                                                        </a>
                                                        @if($order->delivery_status == 'Delivered')
                                                        <button onclick="checkReturn({{ $order->id }})"
                                                            class="btn btn-sm btn-outline-warning">
                                                            Return
                                                        </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Tab -->
                        <div class="tab-pane fade" id="account-detail">
                            <div class="content-header">
                                <h2>Profile Details</h2>
                                <p>Manage your account information</p>
                            </div>

                            <div class="profile-form">
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::user()->name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ Auth::user()->username }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ Auth::user()->email }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone"
                                                    value="{{ Auth::user()->phone }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Profile Image</label>
                                                <input type="file" class="form-control" name="profile_image">
                                                <div class="current-image mt-2">
                                                    <img src="{{ asset(Auth::user()->profile_image) }}"
                                                        alt="Current Profile" width="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                Update Profile
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Password Change Tab -->
                        <div class="tab-pane fade" id="user-password">
                            <div class="content-header">
                                <h2>Change Password</h2>
                                <p>Update your account password</p>
                            </div>

                            <div class="password-form">
                                <form action="{{ route('user-passwordupdate') }}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" class="form-control" name="oldpassword" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" name="newpassword" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #01B45E;
        --primary-light: #efc1ba;
        --secondary: #64748b;
        --success: #10b981;
        --success-light: #d1fae5;
        --warning: #f59e0b;
        --warning-light: #fef3c7;
        --danger: #ef4444;
        --danger-light: #fee2e2;
        --info: #3b82f6;
        --info-light: #dbeafe;
        --light: #f8fafc;
        --dark: #0f172a;
    }

    /* Dashboard Container */
    .dashboard-container {
        padding: 2rem 0;
        background: var(--light);
        min-height: 100vh;
    }

    /* Sidebar Styles */
    .dashboard-sidebar {
        background: white;
        border-radius: 1rem;
        padding: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 1rem;
    }

    .user-profile {
        text-align: center;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 1.5rem;
        /* display: flex;
                flex-direction: column; */
    }

    .profile-image img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 1rem;
    }

    .profile-info h4 {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .profile-info p {
        color: var(--secondary);
        font-size: 0.875rem;
    }

    /* Navigation Styles */
    .nav-group {
        margin-bottom: 2rem;
    }

    .nav-label {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--secondary);
        margin-bottom: 0.75rem;
        padding-left: 0.5rem;
    }

    .dashboard-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dashboard-nav .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: var(--dark);
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .dashboard-nav .nav-link:hover {
        background: var(--primary-light);
        color: var(--primary);
    }

    .dashboard-nav .nav-link.active {
        background: var(--primary);
        color: white;
    }

    .dashboard-nav .nav-link.active i {
        color: white;
    }

    .dashboard-nav .nav-link i {
        width: 1.5rem;
        font-size: 1.25rem;
        margin-right: 0.75rem;
    }

    /* Content Area */
    .dashboard-content {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .content-header {
        margin-bottom: 2rem;
    }

    .content-header h2 {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .content-header p {
        color: var(--secondary);
        margin: 0;
    }

    /* Modern Stat Card */
    .stat-modern-card {
        border-radius: 1rem;
        transition: box-shadow 0.2s;
        background: linear-gradient(135deg, #fff 80%, #f8fafc 100%);
    }

    .stat-modern-card:hover {
        box-shadow: 0 4px 24px rgba(219, 64, 38, 0.08);
    }

    .stat-modern-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        background: #f8fafc;
    }

    /* Order Card */
    .order-card {
        border-radius: 1rem;
        background: #fff;
        transition: box-shadow 0.2s;
    }

    .order-card:hover {
        box-shadow: 0 4px 24px rgba(59, 130, 246, 0.08);
    }

    .order-card .badge {
        font-size: 0.85rem;
        padding: 0.4em 1em;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-icon i {
        font-size: 1.5rem;
        color: var(--primary);
    }

    .stat-info h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .stat-info p {
        color: var(--secondary);
        margin: 0;
        font-size: 0.875rem;
    }

    /* Table Styles */
    .table-responsive {
        margin: 1.5rem 0;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .custom-table th {
        background: var(--light);
        padding: 1rem;
        font-weight: 600;
        color: var(--dark);
        text-align: left;
    }

    .custom-table td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        color: var(--secondary);
    }

    /* Status Badges */
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-badge.pending {
        background: var(--warning-light);
        color: var(--warning);
    }

    .status-badge.processing {
        background: var(--info-light);
        color: var(--info);
    }

    .status-badge.completed {
        background: var(--success-light);
        color: var(--success);
    }

    .status-badge.cancelled {
        background: var(--danger-light);
        color: var(--danger);
    }

    /* Forms */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark);
    }

    .form-control {
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    /* Buttons */
    .btn {
        padding: 10px;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        border: none;
    }

    .btn-outline-primary {
        border: 1px solid var(--primary);
        color: var(--primary);
        background: transparent;
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
    }


    .dashboard-nav .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: var(--dark);
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .dashboard-nav .nav-link:hover {
        background: var(--primary-light);
        color: var(--primary);
    }

    .dashboard-nav .nav-link.active {
        background: var(--primary);
        color: white;
    }

    .dashboard-nav .nav-link.active i {
        color: white;
    }

    /* Updated Profile Styles */
    .modern-user-profile {
        background: #fff;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.05) !important;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .modern-user-profile .profile-info h4 {
        color: #2d3748;
        font-size: 1.25rem;
        line-height: 1.2;
    }

    .modern-user-profile .profile-info p {
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .modern-user-profile .default-avatar {
        transition: all 0.3s ease;
    }

    .modern-user-profile .default-avatar:hover {
        background: #e9ecef !important;
    }

    .modern-user-profile .btn-outline-primary {
        box-shadow: 0 2px 4px rgba(1, 180, 94, 0.1);
        transition: all 0.3s ease;
    }

    .modern-user-profile .btn-outline-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(1, 180, 94, 0.2);
    }

    @media (max-width: 576px) {
        .modern-user-profile {
            text-align: center;
        }

        .modern-user-profile .profile-image {
            margin: 0 auto 1rem;
        }

        .modern-user-profile .col-auto {
            width: 100%;
            margin-top: 1rem;
        }

        .modern-user-profile .btn-outline-primary {
            width: 100%;
        }
    }
</style>

@endsection

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--  Division To District Show Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            // const divArray = division.split("-");
            // var division_id = divArray[0];
            // $('#division_name').val(divArray[1]);
            if (division_id) {
                $.ajax({
                    url: "{{  url('/division-district/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="district_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                        $.each(data, function(key, value) {
                            // console.log(value);
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + capitalizeFirstLetter(value.district_name_en) + '</option>');
                        });
                        $('select[name="upazilla_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                    },
                });
            } else {
                alert('danger');
            }
        });

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    });

    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function(response) {
                // alert(response);
                //checkout();
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartSubTotalShi').val(response.cartTotal);
                $('.cartQty').text(Object.keys(response.carts).length);
                $('#total_cart_qty').text(Object.keys(response.carts).length);

                var miniCart = "";

                if (Object.keys(response.carts).length > 0) {
                    $.each(response.carts, function(key, value) {
                        //console.log(value);
                        var slug = value.options.slug;
                        var base_url = window.location.origin;
                        miniCart += `

                                    <div class="item-cart mb-20">
                                                    <div class="cart-image"><img src="/${value.options.image}" alt="Ecom"></div>
                                            <div class="cart-info"><a class="font-sm-bold color-brand-3" href="${base_url}/product-details/${slug}">${value.name}</a>

                                        <p><span class="color-brand-2 font-sm-bold">${value.qty} x ${value.price}</span></p>
                                        <div class="shopping-cart-delete">
                                                <a  id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                    </div>
                                </div>`

                    });

                    $('#miniCart').html(miniCart);
                    $('#miniCart_empty_btn').hide();
                    $('#miniCart_btn').show();
                } else {
                    html = '<h4 class="text-center">Cart empty!</h4>';
                    $('#miniCart').html(html);
                    $('#miniCart_btn').hide();
                    $('#miniCart_empty_btn').show();
                }
            }
        });
    }
    /* ============ Function Call ========== */
    miniCart();
</script>

<!--  District To Upazilla Show Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            // const divArray = district.split("-");
            // var division_id = divArray[0];
            // $('#district_name').val(divArray[1]);
            if (district_id) {
                $.ajax({
                    url: "{{  url('/district-upazilla/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="upazilla_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="upazilla_id"]').append('<option value="' + value.id + '">' + value.name_en + '</option>');
                            $('select[name="upazilla_id"]').append('<option  class="d-none" value="' + value.id + '">' + value.name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<script>
    function checkReturn(id) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 1200
        });
        $.ajax({
            type: 'get',
            url: 'order/return/check/' + id,
            dataType: 'json',
            success: function(data) {
                // console.log(data);

                // Start Sweertaleart Message
                if (data.result) {
                    var invoice = data.order.invoice_no;
                    console.log(invoice);
                    window.location.href = 'order/return/' + invoice;
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                // Start Sweertaleart Message


            }
        });
    }

    function getDetails(id) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 1200
        });
        $.ajax({
            type: 'get',
            url: '/get-returning-product/' + id,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.products) {
                    var html = `
                            <div class="card">
                                <div class="card-header"><h3 class="mb-0">Details</h3></div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Issue</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>`;
                    if (data.products.length > 0) {
                        $.each(data.products, function(key, item) {
                            html += `<tr>
                                                                <td>${key + 1}</td>
                                                                <td>${data.product[key][0]}</td>
                                                                <td>${item.qty}</td>
                                                                <td>${item.issue}</td>`
                            if (item.status == 1) {
                                html += `<td> Replaced</td>`;
                            } else {
                                html += `<td> Not Replaced</td>`;
                            }
                            html += `</tr>`;
                        });

                    }

                    html += `</tbody>
                                    </table>
                                </div>
                            </div>`;
                    $('#request_details').html(html);

                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                // Start Sweertaleart Message


            }
        });
    }
</script>
<script>
    function openDashboardTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        $('a[onclick="openDashboardTab()"]').addClass('active');
        $('#dashboard').addClass('show active');

        document.getElementById('dashboard').scrollIntoView({
            behavior: 'smooth'
        });
    }

    function openOrdersTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        $('a[onclick="openOrdersTab()"]').addClass('active');
        $('#orders').addClass('show active');

        document.getElementById('orders').scrollIntoView({
            behavior: 'smooth'
        });
    }

    // function openReturnRequestsTab() {
    //     $('.nav-link').removeClass('active');
    //     $('.tab-pane').removeClass('show active');

    //     $('a[onclick="openReturnRequestsTab()"]').addClass('active');
    //     $('#return_request').addClass('show active');

    //     document.getElementById('return_request').scrollIntoView({
    //         behavior: 'smooth'
    //     });
    // }

    function openProfileTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        $('a[onclick="openProfileTab()"]').addClass('active');
        $('#account-detail').addClass('show active');

        document.getElementById('account-detail').scrollIntoView({
            behavior: 'smooth'
        });
    }

    function openPasswordTab() {
        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        $('a[onclick="openPasswordTab()"]').addClass('active');
        $('#user-password').addClass('show active');

        document.getElementById('user-password').scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Initialize tabs
    $(document).ready(function() {
        // Set default active tab
        openDashboardTab();

        // Update active states when URL hash changes
        $(window).on('hashchange', function() {
            const hash = window.location.hash;
            switch (hash) {
                case '#orders':
                    openOrdersTab();
                    break;
                case '#return_request':
                    openReturnRequestsTab();
                    break;
                case '#account-detail':
                    openProfileTab();
                    break;
                case '#user-password':
                    openPasswordTab();
                    break;
                default:
                    openDashboardTab();
            }
        });
    });
</script>
<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>
@endpush