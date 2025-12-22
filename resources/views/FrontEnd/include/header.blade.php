{{-- @php
$logoUrl = asset(get_setting('site_logo')->value);
$isAuthenticated = Auth::check();
$userName = $isAuthenticated ? Str::before(Auth::user()->name, ' ') : '';
$userImage = $isAuthenticated && Auth::user()->profile_image ? asset(Auth::user()->profile_image) : '';
$language = session()->get('language');
$isBangla = $language == 'bangla';
@endphp --}}

@php
$logoUrl = asset(get_setting('site_logo')->value);
$isAuthenticated = Auth::check();
$user = $isAuthenticated ? Auth::user() : null;
$userName = $user ? Str::before($user->name, ' ') : '';

// Determine correct image path based on role
if ($user && $user->profile_image) {
if ($user->role == 5) {
$imagePath = $user->profile_image;
} elseif ($user->role == 3) {
$imagePath = $user->profile_image;
} else {
$imagePath = null;
}
$userImage = file_exists(public_path($imagePath)) ? asset($imagePath) : null;
} else {
$userImage = null;
}

$language = session()->get('language');
$isBangla = $language == 'bangla';

// Determine dashboard route based on role
$dashboardRoute = route('login');
if ($user) {
if ($user->role == 5) {
$dashboardRoute = route('wholeseller.dashboard');
} elseif (in_array($user->role, [3, 4])) {
$dashboardRoute = route('dashboard');
}
}
@endphp

<!-- Modern Header Design -->
<style>
    :root {
        --primary: #01B45E;
        --secondary: #EE6B17;
        --primary-light: #02d370;
        --primary-dark: #018f4b;
        --secondary-light: #ff7c2b;
        --secondary-dark: #d85a0f;
        --white: #ffffff;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-800: #343a40;
        --black: #212529;
        --transition: all 0.3s ease;
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        --radius-sm: 4px;
        --radius-md: 8px;
        --radius-lg: 16px;
    }

    /* Common Styles */
    .header-container {
        font-family: 'Poppins', sans-serif;
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
    }

    .btn-primary {
        background-color: #01B45E;
        border-color: #01B45E;
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #018f4b;
    }

    /* Top Bar */
    .top-bar {
        background-color: #01B45E;
        padding: 8px 0;
        color: #ffffff;
    }

    .announcement-ticker {
        display: flex;
        animation: ticker 30s linear infinite;
    }

    @keyframes ticker {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .announcement-item {
        white-space: nowrap;
        margin-right: 40px;
        display: flex;
        align-items: center;
    }

    .announcement-item i {
        margin-right: 8px;
    }

    .highlight {
        font-weight: 600;
        background-color: rgba(255, 255, 255, 0.2);
        padding: 2px 10px;
        border-radius: 4px;
        margin-left: 10px;
    }

    /* Main Header */
    .main-header {
        background-color: #ffffff;
        border-bottom: 2px solid #01B45E;
    }

    .header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-container img {
        max-height: 50px;
        transition: all 0.3s ease;
    }

    .logo-container img:hover {
        transform: scale(1.05);
    }

    /* Search Bar */
    /* Search Bar */
    .search-container {
        position: relative;
        flex-grow: 1;
        max-width: 500px;
        margin: 0 30px;
    }

    .search-bar {
        width: 100%;
        padding: 2px 65px 2px 12px;
        border: 2px solid #01B45E;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-size: 14px;
        box-sizing: border-box;
        outline: none;
    }

    .search-btn {
        position: absolute;
        right: 4px;
        top: 4.5px;
        bottom: 0;
        padding: 2px 10px;
        color: #ffffff;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        background-color: #01B45E;
        border-radius: 0 20px 20px 0;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 12px;
    }

    .search-btn i {
        font-size: 16px;
        color: white;
    }

    /* User Navigation */
    .user-nav {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .nav-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #343a40;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .nav-item:hover {
        color: #EE6B17;
    }

    .nav-item i {
        font-size: 20px;
        margin-bottom: 2px;
    }

    .nav-item span {
        font-size: 12px;
        font-weight: 500;
    }

    .badge-count {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #EE6B17;
        color: #ffffff;
        font-size: 10px;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-profile {
        background-color: #01B45E;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 5px 10px;
        padding-bottom: 10px !important;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-bottom: 0 !important;
    }



    .avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #01B45E;
    }

    .user-info {
        display: flex;
        flex-direction: column;

    }

    .user-name {
        font-weight: 600;
        font-size: 16px;
        line-height: 14px;
        color: white;
    }

    .user-action {
        font-size: 12px;
        line-height: 20px;
        margin-top: 2px;
        color: #ffffff;
    }

    /* Category Navigation */
    .category-nav {
        background-color: #01B45E;
    }

    .category-list {
        display: flex;
        gap: 20px;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .category-item {
        position: relative;
    }

    .category-link {
        text-decoration: none;
        color: #ffffff;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
        padding: 5px 0;
    }

    .category-link:hover {
        color: #e9ecef;
    }

    .category-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #EE6B17;
        transition: all 0.3s ease;
    }

    .category-link:hover::after {
        width: 100%;
    }

    .category-divider {
        color: #ced4da;
        font-weight: 300;
    }

    /* Become Seller Button */
    .become-seller-btn {
        margin-left: auto;
        background-color: transparent;
        border: 2px solid #EE6B17;
        color: #EE6B17;
        padding: 5px 15px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .become-seller-btn:hover {
        background-color: #EE6B17;
        color: #ffffff;
    }

    /* Mobile Menu */
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 24px;
        color: #01B45E;
        cursor: pointer;
    }

    @media (max-width: 767px) {
        .mobile-menu-toggle {
            display: block;
        }

        .user-nav {
            display: none;
        }
    }

    .mobile-menu {
        display: none;
        position: fixed;
        top: 0;
        left: -100%;
        width: 80%;
        height: 100%;
        background-color: #ffffff;
        z-index: 1001;
        transition: all 0.3s ease;
        overflow-y: auto;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .mobile-menu.active {
        left: 0;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .mobile-menu-close {
        background: none;
        border: none;
        font-size: 24px;
        color: #343a40;
        cursor: pointer;
    }

    .mobile-menu-body {
        padding: 20px;
        margin-bottom: 50px;
    }

    .mobile-menu-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        text-decoration: none;
        color: #343a40;
        border-bottom: 1px solid #e9ecef;
    }

    .mobile-menu-item i {
        width: 30px;
        font-size: 18px;
        color: #01B45E;
    }

    .mobile-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    /* Language Selector */
    .language-selector {
        position: relative;
        cursor: pointer;
    }

    .language-display {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .language-display:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .language-options {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #ffffff;
        min-width: 120px;
        border-radius: 4px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 10;
    }

    .language-selector:hover .language-options {
        display: block;
    }

    .language-option {
        padding: 8px 12px;
        display: block;
        text-decoration: none;
        color: #343a40;
        transition: all 0.3s ease;
    }

    .language-option:hover {
        color: #01B45E;
    }

    /* Responsive Styles */
    @media (max-width: 991px) {
        .search-container {
            margin: 0 15px;
        }

        .user-info {
            display: none;
        }

        .mobile-menu-toggle {
            display: block;
        }

        .nav-item span {
            display: none;
        }

        .category-nav {
            display: none;
        }

        .mobile-menu,
        .mobile-overlay {
            display: block;
        }

        .user-nav {
            gap: 15px;
        }

        .logo-container img {
            max-height: 40px;
        }
    }

    @media (max-width: 768px) {
        .top-bar {
            padding: 5px 0;
        }

        .header-flex {
            flex-wrap: wrap;
        }

        .search-container {
            order: 3;
            width: 100%;
            max-width: 100%;
            margin: 15px 0 0;
        }
    }

    @media (max-width: 576px) {
        .user-nav {
            gap: 10px;
        }

        .nav-item1 {
            display: none;
        }

        .nav-item2 {
            display: none;
        }

        .nav-item i {
            font-size: 18px;
        }
    }

    /* First add these CSS styles */
    .user-profile-container {
        position: relative;
    }

    .user-profile-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        min-width: 150px;
        display: none;
        z-index: 1000;
        margin-top: 5px;
    }

    .user-profile-container:hover .user-profile-dropdown {
        display: block;
    }

    .dropdown-item {
        padding: 10px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #343a40;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #01B45E;
        color: white;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #e9ecef;
        margin: 5px 0;
    }
    /* Update the existing user-profile-container and user-profile-dropdown styles */
.user-profile-container {
    position: relative;
    padding-bottom: 10px; /* Add padding to create hover space */
}

.user-profile-dropdown {
    position: absolute;
    top: calc(100% - 10px); /* Adjust to account for container padding */
    right: 0;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-width: 200px;
    display: none;
    z-index: 1000;
    padding: 5px 0;
}

/* Update the hover behavior */
.user-profile-container:hover .user-profile-dropdown,
.user-profile-dropdown:hover {
    display: block;
}

/* Add transition for smoother appearance */
.user-profile-dropdown {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
}

.user-profile-container:hover .user-profile-dropdown,
.user-profile-dropdown:hover {
    opacity: 1;
    visibility: visible;
}
</style>

<div class="header-container">
    <!-- Announcement Bar -->

    <!-- Main Header -->
    <div class="main-header py-3">
        <div class="custom_container">
            <div class="header-flex">
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobile-menu-open">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Logo -->
                <div class="logo-container">
                    <a href="{{ route('home') }}">
                        <img src="{{ $logoUrl }}" alt="Logo">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="search-container">
                    <form action="{{ route('product.search') }}" method="get">
                        <input type="text" class="search-bar" name="search" id="search-input"
                            placeholder="{{ $isBangla ? 'এখানে অনুসন্ধান করুন...' : 'Search products...' }}"
                            onfocus="search_result_show()" onblur="search_result_hide()">
                        <button type="submit" class="search-btn">
                            Search
                        </button>
                    </form>
                    <div id="search-results" class="searchProducts"
                        style="position: absolute; z-index: 999; width: 100%; top: 100%; display: none;"></div>
                </div>

                <!-- User Navigation -->
                <div class="user-nav">
                    <!-- Main Menu Items -->
                    <a href="{{ route('home') }}" class="nav-item">
                        <i class="fas fa-home"></i>
                        <span>{{ $isBangla ? 'হোম' : 'Home' }}</span>
                    </a>

                    <a href="{{ route('product.show') }}" class="nav-item">
                        <i class="fas fa-store"></i>
                        <span>{{ $isBangla ? 'শপ' : 'Shop' }}</span>
                    </a>

                    <a href="{{ route('category_list.index') }}" class="nav-item">
                        <i class="fas fa-th-large"></i>
                        <span>{{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</span>
                    </a>

                    <!-- Track Order -->
                    <a href="{{ route('order.tracking') }}" class="nav-item">
                        <i class="fas fa-truck"></i>
                        <span style="white-space: nowrap;">{{ $isBangla ? 'অর্ডার ট্র্যাকিং' : 'Track Order' }}</span>
                    </a>

                    <!-- Cart -->
                    {{-- <a href="{{ route('cart.show') }}" class="nav-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge-count cartQty">0</span>
                    <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
                    </a> --}}
                    <!-- Cart (toggle sidebar/modal) -->
                    @php
                    $user = auth()->user();
                    $isWholeseller = $user && $user->role == 5;
                    @endphp
                    {{-- <a href="javascript:void(0);" class="nav-item" id="cartSidebarToggle">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge-count cartQty">0</span>
                        <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
                    </a> --}}
                    <a href="javascript:void(0);" class="nav-item" id="cartSidebarToggle">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge-count cartQty">
                            0
                        </span>
                        <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
                    </a>

                    {{-- User Section --}}
                    @auth
                    <div class="user-profile-container">
                        <div class="user-profile">
                            @if ($userImage)
                            <img src="{{ $userImage }}" alt="Profile" class="avatar"
                                style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            @else
                            <i class="fas fa-user-circle" style="font-size: 40px; color: white;"></i>
                            @endif
                        </div>

                        <div class="user-profile-dropdown">
                            <a href="{{ $dashboardRoute }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>{{ $isBangla ? 'ড্যাশবোর্ড' : 'Dashboard' }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>{{ $isBangla ? 'লগআউট' : 'Logout' }}</span>
                            </a>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @else
                    {{-- Guest User --}}
                    <div class="user-profile" onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-user-circle" style="font-size: 40px; color: white;"></i>
                        <div class="user-info ms-2">
                            <span class="user-name d-block fw-semibold">
                                {{ $isBangla ? 'লগইন করুন' : 'Login' }}
                            </span>
                            {{-- <span class="user-action text-muted" style="font-size: 13px;">
                                    {{ $isBangla ? 'একাউন্ট তৈরি করুন' : 'Create Account' }}
                            </span> --}}
                            <span class="user-action">{{ $isBangla ? 'লগইন / সাইনআপ' : 'Login / Signup' }}</span>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Remove the entire category-nav section -->

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <div class="logo-container">
                <img src="{{ $logoUrl }}" alt="Logo" style="max-height: 40px;">
            </div>
            <button class="mobile-menu-close" id="mobile-menu-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="mobile-menu-body">
            @auth
            <div
                style="padding: 15px 0; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #e9ecef;">
                @if ($userImage)
                <img src="{{ $userImage }}" alt="Profile" class="avatar" style="width: 50px; height: 50px;">
                @else
                <i class="fas fa-user-circle" style="font-size: 50px; color: white;"></i>
                @endif
                <div>
                    <div style="font-weight: 600; font-size: 16px;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 14px; color: #ced4da;">{{ Auth::user()->email }}</div>
                </div>
            </div>
            @else
            <div style="padding: 15px 0; border-bottom: 1px solid #e9ecef;">
                <a href="{{ route('login') }}"
                    style="display: block; padding: 10px 0; text-align: center; background-color: #01B45E; color: #ffffff; border-radius: 8px; text-decoration: none; font-weight: 500; margin-bottom: 10px;">
                    {{ $isBangla ? 'লগইন' : 'Login' }}
                </a>
                <a href="{{ route('register') }}"
                    style="display: block; padding: 10px 0; text-align: center; border: 1px solid #01B45E; color: #01B45E; border-radius: 8px; text-decoration: none; font-weight: 500;">
                    {{ $isBangla ? 'সাইন আপ' : 'Sign Up' }}
                </a>
            </div>
            @endauth

            <a href="{{ route('home') }}" class="mobile-menu-item">
                <i class="fas fa-home"></i>
                <span>{{ $isBangla ? 'হোম' : 'Home' }}</span>
            </a>
            <a href="{{ route('product.show') }}" class="mobile-menu-item">
                <i class="fas fa-shopping-bag"></i>
                <span>{{ $isBangla ? 'শপ' : 'Shop' }}</span>
            </a>
            <a href="{{ route('category_list.index') }}" class="mobile-menu-item">
                <i class="fas fa-list"></i>
                <span>{{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</span>
            </a>
            <a href="{{ route('cart.show') }}" class="mobile-menu-item">
                <i class="fas fa-shopping-cart"></i>
                <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
            </a>
            <a href="{{ route('order.tracking') }}" class="mobile-menu-item">
                <i class="fas fa-truck"></i>
                <span>{{ $isBangla ? 'অর্ডার ট্র্যাকিং' : 'Track Order' }}</span>
            </a>
            @auth
            <a href="{{ route('dashboard') }}" class="mobile-menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span>{{ $isBangla ? 'ড্যাশবোর্ড' : 'Dashboard' }}</span>
            </a>
            <a href="{{ route('logout') }}" class="mobile-menu-item"
                onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>{{ $isBangla ? 'লগআউট' : 'Logout' }}</span>
            </a>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endauth

            <div style="padding: 15px 0; border-top: 1px solid #e9ecef; margin-top: 15px;">
                <div style="font-weight: 600; margin-bottom: 10px;">
                    {{ $isBangla ? 'ভাষা পরিবর্তন করুন' : 'Change Language' }}
                </div>
                <div style="display: flex; gap: 10px;">
                    <a href="{{ route('english.language') }}"
                        style="flex: 1; padding: 8px 0; text-align: center; background-color: {{ !$isBangla ? '#01B45E' : '#e9ecef' }}; color: {{ !$isBangla ? '#ffffff' : '#343a40' }}; border-radius: 4px; text-decoration: none;">
                        English
                    </a>
                    <a href="{{ route('bangla.language') }}"
                        style="flex: 1; padding: 8px 0; text-align: center; background-color: {{ $isBangla ? '#01B45E' : '#e9ecef' }}; color: {{ $isBangla ? '#ffffff' : '#343a40' }}; border-radius: 4px; text-decoration: none;">
                        বাংলা
                    </a>
                </div>
            </div>

            <div style="padding: 15px 0; border-top: 1px solid #e9ecef; margin-top: 15px;">
                <button class="btn-primary" style="width: 100%; padding: 10px 0;" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    {{ $isBangla ? 'বিক্রেতা হোন' : 'Become a Seller' }}
                </button>
            </div>
        </div>
    </div>
    <div class="" id=""></div>
</div>
<section class="d-block d-lg-none">

    <div class="container">

        <form class="d-none d-md-flex " role="search" action="{{ route('product.search') }}"
            method="post">
            @csrf
            <input class="form-control typewriter-effect " type="search" onfocus="search_result_show()"
                onblur="search_result_hide()" name="search" placeholder="Search Product Here ..."
                aria-label="Search">
            <button class="btn search-icon" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

    </div>

    <!--Mobile Button Menu Start -->
    <div>
        <nav class='mobile'>
            <ul>
                <li><a href='{{ route('home') }}'><span><i class="fa-solid fa-house-chimney"></i>
                        </span><span>Home</span></a></li>

                <li><a href='{{ route('product.show') }}'><span><i class="fa-solid fa-bag-shopping"></i>
                        </span><span>Shop</span></a></li>
                <li><a href='{{ route('cart.show') }}'><span><i class="fa-solid fa-cart-shopping"></i> <small
                                class="cartQty text-success">0</small></span>
                        <span>Cart</span></a> </li>



                <li>
                    @auth
                    <a href='{{ route('dashboard') }}'>
                        <span>
                            <i class="fa-regular fa-user" style="margin-left: 9px;">
                            </i>
                        </span>
                        <span>Profile</span>
                    </a>
                    @endauth
                    @guest
                    <a href='{{ route('login') }}'>
                        <span>
                            <i class="fa-regular fa-user" style="margin-left: 9px;">
                            </i>
                        </span>
                        <span>Profile</span>
                    </a>
                    @endguest
                </li>
                <li><a href='{{ route('category_list.index') }}'><span><i class="fa-solid fa-list"></i>
                        </span><span>Categories</span></a></li>
            </ul>
        </nav>
    </div>
    <!-- Button Menu End -->
</section>

<!-- Add JS for Mobile Menu Toggle -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuOpen = document.getElementById('mobile-menu-open');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');

        if (mobileMenuOpen) {
            mobileMenuOpen.addEventListener('click', function() {
                mobileMenu.classList.add('active');
                mobileOverlay.style.display = 'block';
                document.body.style.overflow = 'hidden';
            });
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                mobileOverlay.style.display = 'none';
                document.body.style.overflow = '';
            });
        }

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                mobileOverlay.style.display = 'none';
                document.body.style.overflow = '';
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('ajax.product.search') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(response) {
                        $('#search-results').html(response.html).show();
                    },
                    error: function(xhr) {
                        console.log("AJAX error:", xhr.responseText);
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        // Optional: Hide results if clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-input, #search-results').length) {
                $('#search-results').hide();
            }
        });
    });
</script>
