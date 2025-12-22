<style>
    .dashboard-sidebar {
        background: #13B262;
        border-radius: 12px;
        padding: 20px 0 20px 0;
        /* min-height: 100vh; */
    }

    .user-profile {
        background: #13B262;
    }

    .profile-bg {
        display: none;
    }

    .profile-image img,
    .profile-image .fa-user {
        border: 3px solid #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .profile-info {
        text-align: left;
    }

    .profile-info h5 {
        color: #fff;
        font-weight: 500 !important;
    }

    .dashboard-nav .nav-link {
        color: #fff;
        font-weight: 500;
        padding: 12px 24px;
        /* border-radius: 0 30px 30px 0; */
        margin-bottom: 6px;
        transition: background 0.2s, color 0.2s;
        display: flex;
        align-items: center;
        font-size: 16px;
        display: block;
        width: 100%;
    }

    .dashboard-nav .nav-link i {
        margin-right: 12px;
        font-size: 18px;
    }

    .dashboard-nav .nav-link.active,
    .dashboard-nav .nav-link:hover {
        background: #EE6812;
        color: #fff;
    }

    .dashboard-nav .nav-item {
        list-style: none;
    }

    .btn-outline-primary {
        border-color: #fff;
        color: #fff;
    }

    .btn-outline-primary:hover {
        background: #fff;
        color: #000000;
        border-color: #000000;
    }
</style>

<div class="">
    <div class="dashboard-sidebar">
        <div
            class="user-profile modern-user-profile p-2 shadow-sm rounded-3 position-relative text-center d-flex align-items-center ">
            <div class="profile-image position-relative mb-2 p-2" style="z-index:1; text-align:center;">

                @php
                    $user = Auth::user();
                    $profileImage = $user && $user->profile_image ? $user->profile_image : null;
                @endphp

                @if ($profileImage && file_exists(public_path($profileImage)))
                    <img src="{{ asset($profileImage) }}" alt="Profile" class="rounded-circle border border-3 shadow-sm"
                        style="width: 100px; height: 100px; object-fit: cover; background: #fff;">
                @else
                    <div class="d-flex align-items-center justify-content-center rounded-circle border border-3 shadow-sm mx-auto"
                        style="width: 100px; height: 100px; background: #fff; font-size: 42px; color: #13B262;">
                        <i class="fas fa-user"></i>
                    </div>
                @endif

            </div>
            <div class="profile-info position-relative" style="z-index:1;">
                <h5 class="fw-bold mb-1">{{ Auth::user()->name ?? 'User' }}</h5>
                <a href="{{ route('wholeseller.profile.edit') }}"
                    class="btn btn-sm btn-outline-primary mt-2 position-relative" style="z-index:1;">
                    <i class="fas fa-user-edit me-1"></i> Edit Profile
                </a>
            </div>
        </div>

        <nav class="dashboard-nav mt-4">
            <ul class="nav flex-column">
                <li class="nav-item" onclick="scrollToTop()">
                    <a href="{{ route('wholeseller.dashboard') }}"
                        class="nav-link {{ request()->is('wholeseller/dashboard*') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item" onclick="scrollToTop()">
                    <a href="{{ route('wholeseller.my-order') }}"
                        class="nav-link {{ request()->is('wholeseller/my-order*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-bag"></i>
                        My Orders
                    </a>
                </li>

                <li class="nav-item" onclick="scrollToTop()">
                    <a href="{{ route('wholeseller.product-details') }}"
                        class="nav-link {{ request()->is('wholeseller/profile-details*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        Profile Details
                    </a>
                </li>
                <li class="nav-item" onclick="scrollToTop()">
                    <a href="{{ route('wholeseller.change-password') }}"
                        class="nav-link {{ request()->is('wholeseller/change-password*') ? 'active' : '' }}">
                        <i class="fas fa-key"></i>
                        Change Password
                    </a>
                </li>

                <li class="nav-item" onclick="scrollToTop()">
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
