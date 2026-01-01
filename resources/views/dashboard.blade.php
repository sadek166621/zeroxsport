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
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h3 class="fw-semibold mb-1">Recent Orders</h3>
                                        <p class="text-muted small mb-0">Your latest 5 orders</p>
                                    </div>
                                    <a href="#orders" onclick="openOrdersTab()" class="btn btn-primary">
                                        <i class="fas fa-arrow-right me-2"></i>View All Orders
                                    </a>
                                </div>
                                <div class="row g-3">
                                    @foreach($orders->take(5) as $order)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-0 shadow-sm order-card h-100">
                                            <div class="card-body">
                                                <div class="order-card-header mb-3">
                                                    <div class="d-flex align-items-start justify-content-between">
                                                        <div>
                                                            <span class="badge rounded-pill status-badge {{ strtolower($order->delivery_status) }} mb-2">
                                                                {{ $order->delivery_status }}
                                                            </span>
                                                            <div class="order-id-large">Order #{{ $order->invoice_no }}</div>
                                                        </div>
                                                        <span class="order-date-small">{{ \Carbon\Carbon::parse($order->date)->format('d M') }}</span>
                                                    </div>
                                                </div>

                                                <div class="order-card-divider mb-3"></div>

                                                <div class="order-card-body mb-3">
                                                    <div class="order-item-count mb-2">
                                                        <i class="fas fa-box-open text-muted me-2"></i>
                                                        <span class="text-muted small">Items in order</span>
                                                    </div>
                                                    <div class="order-total">
                                                        <span class="text-muted small">Total Amount</span>
                                                        <div class="amount-display">৳{{ number_format($order->grand_total, 2) }}</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('order.view', $order->invoice_no) }}"
                                                        class="btn btn-sm btn-outline-primary flex-grow-1">
                                                        <i class="fas fa-file-pdf me-1"></i>Invoice
                                                    </a>
                                                    <a href="{{ route('order.details', $order->invoice_no) }}"
                                                        class="btn btn-sm btn-outline-secondary flex-grow-1">
                                                        <i class="fas fa-eye me-1"></i>Details
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
                                <p>Track and manage all your purchases</p>
                            </div>

                            @if($orders->count() > 0)
                            <div class="orders-filter-section mb-4">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="filter-card">
                                            <div class="filter-icon">📦</div>
                                            <div class="filter-info">
                                                <div class="filter-value">{{ count($all) }}</div>
                                                <div class="filter-label">Total Orders</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="filter-card">
                                            <div class="filter-icon">⏳</div>
                                            <div class="filter-info">
                                                <div class="filter-value">{{ count($pending) }}</div>
                                                <div class="filter-label">Pending</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="filter-card">
                                            <div class="filter-icon">✓</div>
                                            <div class="filter-info">
                                                <div class="filter-value">{{ count($completed) }}</div>
                                                <div class="filter-label">Completed</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="orders-wrapper">
                                <div class="table-responsive">
                                    <table class="table orders-table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Total Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    <span class="order-id-badge">#{{ $order->invoice_no }}</span>
                                                </td>
                                                <td>
                                                    <div class="order-date">
                                                        {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                                                    </div>
                                                    <div class="order-time">
                                                        {{ \Carbon\Carbon::parse($order->date)->format('h:i A') }}
                                                    </div>
                                                </td>
                         <td>
                            @php
                                $statusMap = [
                                  0   => ['text' => 'Pending',   'class' => 'bg-secondary text-white'],
                                    1           => ['text' => 'Confirmed', 'class' => 'bg-info text-white'],
                                    2           => ['text' => 'Processing','class' => 'bg-primary text-white'],
                                    3           => ['text' => 'Shipped',   'class' => 'bg-warning text-dark'],
                                    4           => ['text' => 'Delivered', 'class' => 'bg-success text-white'],
                                    5           => ['text' => 'Canceled',  'class' => 'bg-danger text-white'],
                                    6           => ['text' => 'Returned',  'class' => 'bg-dark text-white'],
                                    7           => ['text' => 'Refunded',  'class' => 'bg-purple text-white'], // custom color
                                    8           => ['text' => 'Failed',    'class' => 'bg-danger text-white'],
                                ];

                                $status = $statusMap[$order->delivery_status] ?? ['text' => $order->delivery_status, 'class' => 'bg-light text-dark'];
                            @endphp

                            <span class="status-badge {{ $status['class'] }} px-3 py-1 rounded-pill">
                                {{ $status['text'] }}
                            </span>
                        </td>
                                                                                <td>
                                                    <span class="order-amount">৳{{ number_format($order->grand_total, 2) }}</span>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ route('order.details', $order->invoice_no) }}" class="btn-action btn-view" title="View Details">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                        <a href="{{ route('order.view', $order->invoice_no) }}" class="btn-action btn-invoice" title="Download Invoice">
                                                            <i class="fas fa-file-pdf"></i> Invoice
                                                        </a>
                                                        @if($order->delivery_status == 'Delivered')
                                                        <button onclick="checkReturn({{ $order->id }})" class="btn-action btn-return" title="Return Order">
                                                            <i class="fas fa-undo"></i> Return
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
                            @else
                            <div class="empty-state">
                                <div class="empty-icon">📦</div>
                                <h3>No Orders Yet</h3>
                                <p>You haven't placed any orders yet. Start shopping to see your orders here.</p>
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    <i class="fas fa-shopping-bag"></i> Continue Shopping
                                </a>
                            </div>
                            @endif
                        </div>

                        <!-- Profile Tab -->
                        <div class="tab-pane fade" id="account-detail">
                            <div class="content-header">
                                <h2>Profile Details</h2>
                                <p>Manage your account information</p>
                            </div>

                            <div class="profile-form">
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    enctype="multipart/form-data" id="profileForm">
                                    @csrf
                                    
                                    <!-- Profile Image Section -->
                                    <div class="profile-image-section mb-5">
                                        <div class="profile-image-container">
                                            <div class="profile-image-preview">
                                                @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))
                                                <img id="imagePreview" src="{{ asset(Auth::user()->profile_image) }}" alt="Profile Preview">
                                                @else
                                                <div id="imagePreview" class="default-image-preview">
                                                    <i class="fas fa-user-circle"></i>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="profile-image-overlay">
                                                <label for="profile_image_input" class="upload-label">
                                                    <i class="fas fa-camera"></i>
                                                    <!-- <span>Change Photo</span> -->
                                                </label>
                                                <input type="file" id="profile_image_input" name="profile_image" accept="image/*" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="image-info">
                                            <p class="image-hint">Recommended: 500x500px, max 2MB</p>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-user input-icon"></i>
                                                    <input type="text" class="form-control form-control-modern" name="name"
                                                        value="{{ Auth::user()->name }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-at input-icon"></i>
                                                    <input type="text" class="form-control form-control-modern" name="username"
                                                        value="{{ Auth::user()->username }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-envelope input-icon"></i>
                                                    <input type="email" class="form-control form-control-modern" name="email"
                                                        value="{{ Auth::user()->email }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <div class="input-wrapper">
                                                    <i class="fas fa-phone input-icon"></i>
                                                    <input type="tel" class="form-control form-control-modern" name="phone"
                                                        value="{{ Auth::user()->phone }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-save me-2"></i>Save Changes
                                                </button>
                                                <button type="reset" class="btn btn-secondary btn-lg">
                                                    <i class="fas fa-undo me-2"></i>Reset
                                                </button>
                                            </div>
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

@include('FrontEnd.include.cart-contianer')

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --primary-dark: #014d34;
        --primary-lighter: #f0faf8;
        --secondary: #6b7280;
        --success: #10b981;
        --success-light: #d1fae5;
        --warning: #f59e0b;
        --warning-light: #fef3c7;
        --danger: #ef4444;
        --danger-light: #fee2e2;
        --info: #3b82f6;
        --info-light: #dbeafe;
        --light: #f9fafb;
        --lighter: #f3f4f6;
        --dark: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, 'Trebuchet MS', sans-serif;
        color: var(--dark);
        background: linear-gradient(135deg, #f0faf8 0%, #f9fafb 100%);
    }

    /* Dashboard Container */
    .dashboard-container {
        padding: 2.5rem 0;
        min-height: 100vh;
    }

    .custom_container {
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* Sidebar Styles */
    .dashboard-sidebar {
        background: white;
        border-radius: 1.5rem;
        padding: 0;
        box-shadow: 0 4px 20px rgba(2, 97, 66, 0.08);
        position: sticky;
        top: 2rem;
        overflow: hidden;
        border: 1px solid rgba(2, 97, 66, 0.05);
    }

    /* User Profile Card */
    .modern-user-profile {
        background: linear-gradient(135deg, var(--primary) 0%, #004d34 100%);
        color: white;
        padding: 2.5rem 2rem !important;
        border-radius: 0;
        overflow: visible;
        margin-bottom: 0;
        position: relative;
    }

    .modern-user-profile::after {
        content: '';
        position: absolute;
        top: 0;
        right: -50px;
        width: 300px;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .modern-user-profile .profile-bg {
        display: none;
    }

    .modern-user-profile .row {
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .modern-user-profile .profile-image img,
    .modern-user-profile .default-avatar {
        border: 4px solid rgba(255, 255, 255, 0.25) !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        transition: var(--transition);
    }

    .modern-user-profile:hover .profile-image img,
    .modern-user-profile:hover .default-avatar {
        transform: scale(1.05);
        border-color: rgba(255, 255, 255, 0.4) !important;
    }

    .modern-user-profile .profile-info h4 {
        color: white;
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        letter-spacing: -0.5px;
    }

    .modern-user-profile .profile-info p {
        color: rgba(255, 255, 255, 0.9) !important;
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0.5rem 0;
    }

    .modern-user-profile .profile-info i {
        width: 18px;
        margin-right: 0.5rem;
        opacity: 0.8;
    }

    /* Navigation Styles */
    .dashboard-nav {
        padding: 2rem 1.5rem;
    }

    .nav-group {
        margin-bottom: 2.5rem;
    }

    .nav-group:last-child {
        margin-bottom: 0;
    }

    .nav-label {
        font-size: 0.65rem;
        font-weight: 800;
        color: var(--text-muted);
        margin-bottom: 1.2rem;
        padding: 0 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .dashboard-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dashboard-nav li {
        margin-bottom: 0.75rem;
    }

    .dashboard-nav .nav-link {
        display: flex;
        align-items: center;
        padding: 0.95rem 1.25rem;
        color: var(--dark);
        border-radius: 0.875rem;
        transition: var(--transition);
        border-left: 3px solid transparent;
        font-weight: 500;
        font-size: 0.95rem;
        position: relative;
    }

    .dashboard-nav .nav-link i {
        width: 20px;
        font-size: 1.1rem;
        margin-right: 1rem;
        transition: var(--transition);
        color: var(--text-muted);
    }

    .dashboard-nav .nav-link:hover {
        background: var(--primary-light);
        color: var(--primary);
        padding-left: 1.75rem;
        border-left-color: var(--primary);
    }

    .dashboard-nav .nav-link:hover i {
        color: var(--primary);
        transform: translateX(2px);
    }

    .dashboard-nav .nav-link.active {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.08) 100%);
        color: var(--primary);
        border-left-color: var(--primary);
        padding-left: 1.75rem;
        font-weight: 600;
    }

    .dashboard-nav .nav-link.active i {
        color: var(--primary);
    }

    .dashboard-nav .nav-link.active::before {
        content: '';
        position: absolute;
        right: 0;
        width: 3px;
        height: 100%;
        background: var(--primary);
        border-radius: 0 0.875rem 0.875rem 0;
    }

    /* Content Area */
    .dashboard-content {
        background: white;
        border-radius: 1.5rem;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(2, 97, 66, 0.08);
        border: 1px solid rgba(2, 97, 66, 0.05);
    }

    .content-header {
        /* margin-bottom: 3.5rem; */
        padding-bottom: 2rem;
        border-bottom: 2px solid var(--lighter);
    }

    .content-header h2 {
        color: var(--dark);
        font-weight: 800;
        margin-bottom: 0.5rem;
        font-size: 2.2rem;
        letter-spacing: -0.5px;
    }

    .content-header p {
        color: var(--text-muted);
        margin: 0;
        font-size: 1rem;
        font-weight: 400;
    }

    /* Modern Stat Card */
    .stat-modern-card {
        border-radius: 1.25rem;
        border: 1.5px solid var(--border-color);
        transition: var(--transition);
        background: white;
        overflow: hidden;
        position: relative;
    }

    .stat-modern-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .stat-modern-card:hover {
        box-shadow: 0 12px 32px rgba(2, 97, 66, 0.15);
        transform: translateY(-4px);
        border-color: var(--primary);
    }

    .stat-modern-card .card-body {
        padding: 1rem;
    }

    .stat-modern-icon {
        width: 60px;
        height: 60px;
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        flex-shrink: 0;
        transition: var(--transition);
    }

    .stat-modern-card:hover .stat-modern-icon {
        transform: scale(1.1);
    }

    .stat-modern-icon.bg-primary {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        color: var(--primary);
    }

    .stat-modern-icon.bg-warning {
        background: linear-gradient(135deg, #fef3c7 0%, rgba(245, 158, 11, 0.1) 100%);
        color: var(--warning);
    }

    .stat-modern-icon.bg-success {
        background: linear-gradient(135deg, var(--success-light) 0%, rgba(16, 185, 129, 0.1) 100%);
        color: var(--success);
    }

    .stat-modern-icon.bg-info {
        background: linear-gradient(135deg, var(--info-light) 0%, rgba(59, 130, 246, 0.1) 100%);
        color: var(--info);
    }

    .stat-modern-card .fs-4 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    .stat-modern-card .text-muted {
        font-size: 0.9rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    /* Order Card */
    .order-card {
        border-radius: 1.25rem;
        background: white;
        transition: var(--transition);
        border: 1.5px solid var(--border-color);
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .order-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .order-card:hover {
        box-shadow: 0 12px 32px rgba(2, 97, 66, 0.15);
        transform: translateY(-4px);
        border-color: var(--primary);
    }

    .order-card .card-body {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .order-card .badge {
        font-size: 0.75rem;
        padding: 0.6em 1.2em;
        font-weight: 700;
        border-radius: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .order-card .fw-bold {
        color: var(--dark);
        font-size: 1.1rem;
        font-weight: 700;
    }

    /* Recent Orders Section */
    .recent-orders {
        margin-top: 3.5rem;
        padding-top: 2.5rem;
        border-top: 2px solid var(--lighter);
    }

    .recent-orders h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--dark);
        letter-spacing: -0.5px;
    }

    .btn-outline-primary {
        border: 2px solid var(--primary);
        color: var(--primary);
        background: transparent;
        font-weight: 600;
        transition: var(--transition);
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(2, 97, 66, 0.25);
    }

    /* Table Styles */
    .table-responsive {
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid var(--border-color);
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .custom-table thead tr {
        background: linear-gradient(135deg, var(--lighter) 0%, #f0faf8 100%);
        border-bottom: 2px solid var(--border-color);
    }

    .custom-table th {
        padding: 1.5rem 1.25rem;
        font-weight: 700;
        color: var(--dark);
        text-align: left;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .custom-table td {
        padding: 1.25rem;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .custom-table tbody tr {
        transition: var(--transition);
    }

    .custom-table tbody tr:hover {
        background: var(--lighter);
    }

    /* Status Badges */
    .status-badge {
        display: inline-block;
        padding: 0.6rem 1.1rem;
        border-radius: 0.6rem;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .status-badge.pending {
        background: linear-gradient(135deg, #fef3c7 0%, rgba(245, 158, 11, 0.1) 100%);
        color: #b45309;
    }

    .status-badge.processing {
        background: linear-gradient(135deg, var(--info-light) 0%, rgba(59, 130, 246, 0.1) 100%);
        color: #1e40af;
    }

    .status-badge.delivered {
        background: linear-gradient(135deg, var(--success-light) 0%, rgba(16, 185, 129, 0.1) 100%);
        color: #065f46;
    }

    .status-badge.cancelled {
        background: linear-gradient(135deg, var(--danger-light) 0%, rgba(239, 68, 68, 0.1) 100%);
        color: #7f1d1d;
    }

    /* Forms */
    .form-group {
        margin-bottom: 2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.875rem;
        font-weight: 600;
        color: var(--dark);
        font-size: 0.95rem;
        letter-spacing: -0.3px;
    }

    .form-control {
        border: 1.5px solid var(--border-color);
        border-radius: 0.875rem;
        padding: 0.95rem 1.25rem;
        font-size: 0.95rem;
        transition: var(--transition);
        background: white;
        font-weight: 400;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(2, 97, 66, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: var(--text-muted);
    }

    /* Buttons */
    .btn {
        padding: 0.95rem 2rem;
        border-radius: 0.875rem;
        font-weight: 600;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        letter-spacing: 0.3px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(2, 97, 66, 0.3);
    }

    .btn-sm {
        padding: 0.7rem 1.4rem;
        font-size: 0.85rem;
    }

    .btn-outline-secondary {
        border: 2px solid var(--border-color);
        color: var(--text-muted);
        background: white;
        font-weight: 600;
    }

    .btn-outline-secondary:hover {
        background: var(--lighter);
        border-color: var(--primary);
        color: var(--primary);
    }

    .btn-outline-warning {
        border: 2px solid var(--warning);
        color: var(--warning);
        background: transparent;
        font-weight: 600;
    }

    .btn-outline-warning:hover {
        background: var(--warning-light);
        border-color: var(--warning);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-top: auto;
    }

    /* Profile Form */
    .profile-form,
    .password-form {
        max-width: 800px;
    }

    .current-image {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .current-image img {
        border-radius: 0.875rem;
        border: 3px solid var(--primary-light);
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .dashboard-sidebar {
            margin-bottom: 2.5rem;
            position: relative;
            top: auto;
        }

        .dashboard-content {
            padding: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1.5rem 0;
        }

        .custom_container {
            padding: 0 1rem;
        }

        .dashboard-content {
            padding: 1.75rem;
            border-radius: 1.25rem;
        }

        .content-header {
            margin-bottom: 2.5rem;
        }

        .content-header h2 {
            font-size: 1.75rem;
        }

        .modern-user-profile {
            padding: 1.75rem !important;
        }

        .modern-user-profile .row {
            flex-direction: column;
            text-align: center;
        }

        .modern-user-profile .col-auto {
            width: 100%;
        }

        .dashboard-nav {
            padding: 1.25rem;
        }

        .stat-modern-card .card-body {
            padding: 1.5rem;
        }

        .custom-table th,
        .custom-table td {
            padding: 1rem;
            font-size: 0.85rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.5rem;
        }

        .action-buttons .btn {
            width: 100%;
            justify-content: center;
        }

        .btn {
            padding: 0.85rem 1.5rem;
        }

        .recent-orders {
            margin-top: 2.5rem;
        }
    }

    @media (max-width: 576px) {
        .custom_container {
            padding: 0 0.75rem;
        }

        .content-header h2 {
            font-size: 1.4rem;
        }

        .stat-modern-card {
            margin-bottom: 1rem;
        }

        .dashboard-content {
            padding: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .row.g-3 {
            gap: 1rem !important;
        }

        .row.g-4 {
            gap: 1.25rem !important;
        }

        .stat-modern-card .fs-4 {
            font-size: 1.5rem;
        }

        .modern-user-profile .profile-info h4 {
            font-size: 1.15rem;
        }
    }

    /* My Orders Section */
    .orders-filter-section {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .filter-card {
        background: linear-gradient(135deg, #f0faf8 0%, #ffffff 100%);
        border: 2px solid #e0e0e0;
        border-radius: 1.25rem;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .filter-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, transparent 100%);
    }

    .filter-card:hover {
        border-color: var(--primary);
        box-shadow: 0 8px 20px rgba(2, 97, 66, 0.1);
        transform: translateY(-4px);
    }

    .filter-icon {
        font-size: 2.5rem;
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .filter-info {
        flex: 1;
    }

    .filter-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    .filter-label {
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .orders-wrapper {
        background: white;
        border-radius: 1.25rem;
        border: 1px solid var(--border-color);
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(2, 97, 66, 0.08);
    }

    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .orders-table thead {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        border-bottom: 2px solid var(--primary);
    }

    .orders-table thead th {
        padding: 1.75rem 1.5rem;
        font-weight: 700;
        color: #004d34;
        text-align: left;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .orders-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .orders-table tbody tr:hover {
        background-color: var(--accent-color);
    }

    .orders-table tbody td {
        padding: .5rem;
        color: var(--text-dark);
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .order-id-badge {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        color: var(--primary);
        padding: 0.7rem 1.2rem;
        border-radius: 0.6rem;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-block;
    }

    .order-date {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.3rem;
    }

    .order-time {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .order-amount {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary);
    }

    .action-buttons {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 0.6rem;
        border: 2px solid transparent;
        font-weight: 600;
        font-size: 0.8rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        cursor: pointer;
    }

    .btn-view {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border-color: var(--primary);
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(2, 97, 66, 0.25);
    }

    .btn-invoice {
        background: transparent;
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-invoice:hover {
        background: var(--primary-light);
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-return {
        background: transparent;
        color: var(--warning);
        border-color: var(--warning);
    }

    .btn-return:hover {
        background: var(--warning-light);
        color: var(--warning);
        border-color: var(--warning);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: linear-gradient(135deg, var(--accent-color) 0%, #ffffff 100%);
        border-radius: 1.25rem;
        border: 2px dashed var(--border-color);
    }

    .btn.btn-primary {
        color: white;
    }
    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.75rem;
        letter-spacing: -0.3px;
    }

    .empty-state p {
        color: var(--text-muted);
        margin-bottom: 2rem;
        font-size: 1rem;
    }

    /* Profile Form Styles */
    .profile-form {
        background: #ffffff;
        padding: 1.5rem;
        border-radius: 1.25rem;
        box-shadow: 0 4px 20px rgba(2, 97, 66, 0.08);
        border: 1px solid rgba(2, 97, 66, 0.05);
    }

    .profile-image-section {
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.05) 100%);
        border-radius: 1.5rem;
        padding: 2rem 1rem;
        border: 2px solid rgba(2, 97, 66, 0.1);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .profile-image-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(2, 97, 66, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .profile-image-section::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(2, 97, 66, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .profile-image-container {
        position: relative;
        width: 180px;
        height: 180px;
        margin: 0 auto 2rem;
        display: inline-block;
        z-index: 1;
    }

    .profile-image-preview {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
        background: white;
        border: 5px solid white;
        box-shadow: 0 12px 40px rgba(2, 97, 66, 0.25), inset 0 0 0 2px var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        position: relative;
    }

    .profile-image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .default-image-preview {
        font-size: 5rem;
        color: var(--primary);
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(2, 97, 66, 0.1) 100%);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-image-container:hover .profile-image-preview {
        transform: scale(1.08);
        box-shadow: 0 16px 50px rgba(2, 97, 66, 0.35), inset 0 0 0 2px var(--primary);
    }

    .profile-image-overlay {
        position: absolute;
        bottom: -8px;
        right: -8px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(2, 97, 66, 0.35);
        transition: var(--transition);
        border: 4px solid white;
        z-index: 10;
    }

    .profile-image-overlay:hover {
        transform: scale(1.15) rotate(10deg);
        box-shadow: 0 10px 30px rgba(2, 97, 66, 0.45);
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
    }

    .upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.75rem;
        text-align: center;
        gap: 0.25rem;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .upload-label i {
        font-size: 1.4rem;
        transition: var(--transition);
    }

    .profile-image-overlay:hover .upload-label i {
        transform: scale(1.2);
    }

    .image-info {
        margin-top: 1.5rem;
        z-index: 1;
        position: relative;
    }

    .image-hint {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin: 0;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    /* Responsive Design for Profile Image Section */
    @media (max-width: 768px) {
        .profile-image-section {
            padding: 3rem 1.5rem;
        }

        .profile-image-container {
            width: 160px;
            height: 160px;
            margin: 0 auto 1.75rem;
        }

        .default-image-preview {
            font-size: 4rem;
        }

        .profile-image-overlay {
            width: 55px;
            height: 55px;
            bottom: -10px;
            right: -10px;
        }

        .upload-label i {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .profile-image-section {
            padding: 2.5rem 1rem;
        }

        .profile-image-container {
            width: 140px;
            height: 140px;
            margin: 0 auto 1.5rem;
        }

        .profile-image-preview {
            border-width: 4px;
            box-shadow: 0 8px 28px rgba(2, 97, 66, 0.2), inset 0 0 0 2px var(--primary);
        }

        .default-image-preview {
            font-size: 3.5rem;
        }

        .profile-image-overlay {
            width: 50px;
            height: 50px;
            bottom: -8px;
            right: -8px;
            border-width: 3px;
        }

        .upload-label i {
            font-size: 1rem;
        }

        .upload-label span {
            display: none;
        }

        .image-hint {
            font-size: 0.8rem;
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