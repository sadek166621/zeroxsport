@php

$logoUrl = asset(get_setting('site_logo')->value);
$isAuthenticated = Auth::check();
$user = $isAuthenticated ? Auth::user() : null;
$userName = $user ? Str::before($user->name, ' ') : '';
$userImage = $isAuthenticated && $user->profile_image ? asset($user->profile_image) : '';
$language = session()->get('language');
$isBangla = $language == 'bangla';

$dashboardRoute = route('login');
if ($user) {
if ($user->role == 5) {
$dashboardRoute = route('wholeseller.dashboard');
} elseif (in_array($user->role, [3, 4])) {
$dashboardRoute = route('dashboard');
}
}

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

// Get cart count
$cartCount = 0;
try {
    $cartCount = Cart::instance('default')->count();
} catch (\Exception $e) {
    $cart = session()->get('cart', []);
    $cartCount = is_array($cart) ? count($cart) : 0;
}

$navCategories = Category::where('type', 1)->where('status', 1)->with(['categories.categories'])->get();
$allCategories = Category::where('type', 1)->where('status', 1)->get();

$currentCategorySlug = request()->route('slug');
$currentCategory = $currentCategorySlug ? Category::where('slug', $currentCategorySlug)->first() : null;

$subCategories = $currentCategory ? Category::where('parent_id', $currentCategory->id)->where('type', 2)->get() : collect();
$subSubCategories = $subCategories->count() ? Category::whereIn('parent_id', $subCategories->pluck('id'))->where('type', 3)->get() : collect();

@endphp

<style>
    .navbar {

        width: 100%;
        color: white;
        padding: 0;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .nav-top {
        background: #f09220;
        display: flex;
        justify-content: center;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .nav-top-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 1400px;
        padding: 0 15px;
        box-sizing: border-box;
    }

    .nav-logo {
        padding: 8px 0;
        border: 1px solid transparent;
        cursor: pointer;
        display: flex;
        align-items: center;
        flex-shrink: 0;
    }

    .logo {
        width: 150px;
        height: auto;
    }

    .logo-text {
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-decoration: none;
    }

    .nav-search {
        flex: 1;
        display: flex;
        min-width: 200px;
        max-width: 900px;
        gap: 0;
        position: relative;
    }

    .search-select {
        background-color: #f3f3f3;
        border: none;
        padding: 8px 10px;
        border-radius: 4px 0 0 4px;
        cursor: pointer;
        font-size: 12px;
        color: #555;
        flex-shrink: 0;
    }

    .search-input {
        flex: 1;
        padding: 8px 12px;
        border: none;
        outline: none;
        font-size: 14px;
        background-color: #FFFFFF;
        border-radius: 8px 0 0 8px;
    }

    .search-button {
        background-color: #F6F6F6;
        border: none;
        padding: 0 20px;
        cursor: pointer;
        border-radius: 0 8px 8px 0;
        transition: background-color 0.3s ease;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-button:hover {
        background-color: #f3a847;
    }

    .search-icon {
        font-size: 20px;
    }

    .items {
        display: none;
    }

    .nav-account-section {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-shrink: 0;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        padding: 8px 10px;
        border: 1px solid transparent;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .nav-item:hover {
        border: 1px solid white;
        border-radius: 4px;
    }

    .nav-item-top {
        font-size: 12px;
        color: #ccc;
    }

    .nav-item-bottom {
        font-size: 13px;
        font-weight: bold;
    }

    .nav-cart {
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 8px 10px;
        border: 1px solid transparent;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        flex-direction: column;
        white-space: nowrap;
    }

    .nav-cart:hover {
        border: 1px solid white;
        border-radius: 4px;
    }

    .cart-icon {
        font-size: 28px;
    }

    .cart-count {
        position: absolute;
        top: 0;
        right: 0;
        background: #ff4444;
        color: #fff;
        font-weight: bold;
        font-size: 12px;
        min-width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cart-text {
        font-size: 12px;
        font-weight: bold;
    }

    .nav-bottom {
        background: #fff;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #003D32;
        width: 100%;
    }

    .nav-bottom-content {
        display: flex;
        gap: 0;
        width: 100%;
        margin: 0 auto;
        max-width: 1400px;
    }

    .nav-bottom-item {
        position: relative;
    }

    /* Hide all items by default */
    .nav-bottom-item {
        display: none;
    }

    /* Desktop: Show first 10 items */
    @media (min-width: 1025px) {
        .nav-bottom-item:nth-child(-n + 10) {
            display: block;
        }
    }

    /* Tablet: Show first 7 items */
    @media (max-width: 1024px) and (min-width: 769px) {
        .nav-bottom-item:nth-child(-n + 7) {
            display: block;
        }
    }

    /* Mobile Large: Show first 5 items */
    @media (max-width: 768px) and (min-width: 481px) {
        .nav-bottom-item:nth-child(-n + 5) {
            display: block;
        }
    }

    /* Mobile Small: Show first 4 items */
    @media (max-width: 480px) {
        .nav-bottom-item:nth-child(-n + 4) {
            display: block;
        }
    }

    .nav-bottom-item>a {
        padding: 12px 16px;
        display: block;
        font-weight: 500;
        color: #f09220;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .nav-bottom-item:hover {
        background-color: rgba(1, 180, 94, 0.1);
    }

    .nav-bottom-item:hover>a {
        color: #003D32;
    }

    /* Level 2 - Submenu */
    .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 250px;
        background: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 1000;
    }

    .nav-bottom-item:hover>.submenu {
        display: block;
    }

    .submenu-item {
        position: relative;
        border-bottom: 1px solid #f0f0f0;
    }

    .submenu-item:last-child {
        border-bottom: none;
    }

    .submenu-item>a {
        padding: 12px 16px;
        display: block;
        white-space: nowrap;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .submenu-item:hover>a {
        background: #f5f5f5;
        color: #006A4E;
        padding-left: 20px;
    }

    /* Level 3 - Sub-submenu */
    .submenu-right {
        position: absolute;
        top: 0;
        left: 100%;
        min-width: 250px;
        background: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 1001;
    }

    .submenu-item:hover>.submenu-right {
        display: block;
    }

    .submenu-right a {
        padding: 12px 16px;
        display: block;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .submenu-right a:last-child {
        border-bottom: none;
    }

    .submenu-right a:hover {
        background: #f5f5f5;
        color: #006A4E;
        padding-left: 20px;
    }

    /* Arrow indicators */
    .submenu-item>a::after {
        content: '\f054';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        float: right;
        margin-left: 10px;
        font-size: 10px;
        opacity: 0.5;
    }

    .submenu-item:hover>a::after {
        opacity: 1;
    }

    .hamburger {
        font-size: 18px;
        margin-right: 5px;
        margin-top: 5px;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 8px 10px;
        flex-shrink: 0;
    }

    .menu-toggle:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    .nav-mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: white;
        flex-direction: column;
        padding: 10px 0;
        gap: 0;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-height: 80vh;
        overflow-y: auto;
    }

    .nav-mobile-menu.active {
        display: flex;
    }

    .nav-mobile-item {
        padding: 12px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-mobile-item:last-child {
        border-bottom: none;
    }

    .nav-mobile-item a {
        color: black;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        text-transform: uppercase;
    }

    .nav-mobile-item a .category-name {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-mobile-item a i {
        width: 20px;
        font-size: 16px;
        color: #f09220;
    }

    .nav-mobile-item a .category-icon {
        width: 18px;
        height: 18px;
        object-fit: contain;
    }

    .nav-mobile-item:hover {
        background-color: rgba(202, 186, 13, 0.1);
    }

    .submenu-arrow {
        font-size: 12px;
        transition: transform 0.3s ease;
        color: #f09220;
    }

    .nav-mobile-item.has-submenu.active .submenu-arrow {
        transform: rotate(90deg);
    }

    /* Mobile Submenu Styles */
    .mobile-submenu {
        display: none;
        background: rgba(0, 0, 0, 0.2);
        margin-top: 10px;
        margin-left: 32px;
        border-left: 2px solid #f09220;
        padding-left: 15px;
    }

    .nav-mobile-item.has-submenu.active .mobile-submenu {
        display: block;
    }

    .mobile-submenu-item {
        padding: 10px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
    }

    .mobile-submenu-item:last-child {
        border-bottom: none;
    }

    .mobile-submenu-item a {
        font-size: 13px;
        color: black;
        text-transform: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mobile-submenu-item a i {
        font-size: 10px;
        color: #f09220;
    }

    .mobile-submenu-item:hover {
        background-color: rgba(202, 186, 13, 0.1);
    }

    /* Mobile Sub-submenu Styles */
    .mobile-subsubmenu {
        display: none;
        background: rgba(0, 0, 0, 0.3);
        margin-top: 8px;
        margin-left: 15px;
        padding-left: 10px;
    }

    .mobile-submenu-item.active .mobile-subsubmenu {
        display: block;
    }

    .mobile-subsubmenu-item {
        padding: 8px 0;
    }

    .mobile-subsubmenu-item a {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.8);
    }

    .mobile-subsubmenu-item:hover {
        background-color: rgba(202, 186, 13, 0.1);
    }

    .user-account-dropdown {
        position: relative;
        display: flex;
        flex-direction: column;
        padding-bottom: 8px;
    }

    .user-account-dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        color: #333;
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        min-width: 220px;
        z-index: 1001;
        margin-top: 0;
        border: 1px solid #f0f0f0;
        overflow: hidden;
    }

    .user-account-dropdown:hover .user-account-dropdown-menu {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-menu-item {
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s ease;
        font-size: 14px;
        font-weight: 500;
    }

    .dropdown-menu-item:hover {
        background-color: #f8f9fa;
        color: #006A4E;
        padding-left: 20px;
    }

    .dropdown-menu-item i {
        width: 18px;
        text-align: center;
        color: #006A4E;
    }

    .dropdown-menu-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
        margin: 8px 0;
    }

    .mobile-bottom-nav {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #f09220;
        padding: 0;
        height: 65px;
        z-index: 999;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .mobile-bottom-nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        color: white;
        text-decoration: none;
        flex: 1;
        height: 100%;
        font-size: 11px;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .mobile-bottom-nav-item:hover {
        background-color: rgba(255, 255, 255, 0.15);
    }

    .mobile-bottom-nav-item i {
        font-size: 20px;
    }

    .mobile-bottom-nav-item .cart-count {
        position: absolute;
        top: 5px;
        right: 8px;
        background-color: #ff4444;
        color: #fff;
        font-weight: bold;
        font-size: 10px;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Slider styles for nav-bottom */
    .nav-bottom-slider-wrapper {
        display: none;
        overflow-x: auto;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        padding: 0;
    }

    .nav-bottom-slider-wrapper::-webkit-scrollbar {
        height: 3px;
    }

    .nav-bottom-slider-wrapper::-webkit-scrollbar-track {
        background: #003D32;
    }

    .nav-bottom-slider-wrapper::-webkit-scrollbar-thumb {
        background: #01B45E;
        border-radius: 3px;
    }

    .nav-bottom-slider {
        display: flex;
        gap: 0;
        padding: 8px 10px;
        width: fit-content;
    }

    /* Search results */
    .searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
    }

    .searchProducts a {
        display: block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        border-bottom: 1px solid #f0f0f0;
    }

    .searchProducts a:hover {
        background: #f5f5f5;
        color: #f09220;
    }

    /* Custom scrollbar for mobile menu */
    .nav-mobile-menu::-webkit-scrollbar {
        width: 4px;
    }

    .nav-mobile-menu::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-mobile-menu::-webkit-scrollbar-thumb {
        background: #f09220;
        border-radius: 4px;
    }

    @media (max-width: 1024px) {
        .nav-top {
            padding: 0 10px;
            gap: 10px;
        }

        .nav-search {
            max-width: 500px;
        }

        .nav-account-section {
            gap: 10px;
        }

        .nav-item {
            padding: 6px 8px;
        }

        .nav-item-bottom {
            font-size: 12px;
        }

        .logo {
            width: 150px;
        }
    }

    @media (max-width: 768px) {
        .logo {
            width: 140px;
        }

        .nav-top {
            padding: 8px 10px;
            gap: 8px;
            width: 100%;
        }

        .nav-logo {
            padding: 5px 0;
        }

        .nav-search {
            order: 3;
            width: calc(100% - 20px);
            margin-top: 8px;
            min-width: unset;
            max-width: unset;
            flex-basis: 100%;
        }

        .search-select {
            font-size: 11px;
            padding: 6px 5px;
        }

        .search-input {
            font-size: 12px;
            padding: 6px 8px;
        }

        .search-button {
            padding: 0 12px;
        }

        .nav-account-section {
            display: none;
        }

        .menu-toggle {
            display: flex;
            align-items: center;
            order: 2;
            flex-shrink: 0;
        }

        .nav-bottom {
            display: none !important;
        }

        .nav-bottom-slider-wrapper {
            display: flex !important;
            width: 100%;
            overflow-x: auto;
            padding: 0;
        }

        .nav-bottom-slider {
            gap: 0;
            display: none;
        }

        .nav-bottom-item {
            padding: 10px 12px;
            font-size: 12px;
            border-bottom: none;
            border-left: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-bottom-item:first-child {
            border-left: none;
        }

        body {
            padding-bottom: 70px;
        }

        .mobile-bottom-nav {
            display: flex !important;
        }
    }

    @media (max-width: 480px) {
        .logo {
            width: 120px;
        }

        .nav-top {
            padding: 6px 8px;
            gap: 6px;
        }

        .nav-logo {
            padding: 3px 0;
        }

        .nav-search {
            margin-top: 6px;
        }

        .search-select {
            font-size: 10px;
            padding: 5px 3px;
        }

        .search-input {
            font-size: 11px;
            padding: 5px 6px;
        }

        .search-button {
            padding: 0 8px;
            font-size: 12px;
        }

        .menu-toggle {
            font-size: 20px;
            padding: 6px 8px;
        }

        .nav-bottom-item {
            padding: 8px 10px;
            font-size: 11px;
        }

        .mobile-bottom-nav-item {
            font-size: 9px;
        }

        .mobile-bottom-nav-item i {
            font-size: 18px;
        }

        .nav-cart {
            display: none;
        }
    }

    @media (max-width: 320px) {
        .logo {
            width: 120px;
        }

        .nav-top {
            padding: 5px 6px;
            gap: 4px;
        }

        .search-select {
            font-size: 9px;
            padding: 4px 2px;
        }

        .search-input {
            font-size: 10px;
            padding: 4px 4px;
        }

        .search-button {
            padding: 0 6px;
        }

        .menu-toggle {
            font-size: 18px;
            padding: 4px 6px;
        }

        .nav-bottom-item {
            padding: 6px 8px;
            font-size: 9px;
        }
    }
</style>

<nav class="navbar">
    <div class="nav-top">
        <div class="nav-top-content pb-2 pb-md-0">
            <div class="nav-logo">
                <a href="{{ route('home') }}" class="logo-text">
                    <img src="{{ $logoUrl }}" alt="logo" class="logo">
                </a>
            </div>

            <div class="nav-search">
                <!-- <select class="search-select" onchange="redirectToCategory(this)">
                    <option value="">{{ $isBangla ? 'সব' : 'All' }}</option>
                    @foreach ($allCategories as $category)
                    <option value="{{ route('product.category', $category->slug) }}"
                        {{ $currentCategorySlug === $category->slug ? 'selected' : '' }}>
                        {{ $isBangla ? $category->name_bn : $category->name_en }}
                    </option>
                    @endforeach
                </select> -->
                <input type="text" class="search-input" id="search-input" name="search"
                    placeholder="{{ $isBangla ? 'এখানে অনুসন্ধান করুন...' : 'Search products...' }}"
                    autocomplete="off">
                <button class="search-button" type="button" onclick="performSearch()">
                    <i class="fas fa-search" style="color: #006A4E;"></i>
                </button>
                <div id="search-results" class="searchProducts" style="display: none;"></div>
            </div>

            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="nav-cart" id="cartSidebarToggle" onclick="window.location.href='{{ route('cart.show') }}'">
                <span class="cart-icon"><i class="fas fa-shopping-cart"></i></span>
                <span class="cart-count cartQty">{{ $cartCount }}</span>
                <span class="cart-text">{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
            </div>

            <div class="nav-account-section">
                @auth
                <div class="user-account-dropdown">
                    <div class="nav-item" style="padding: 0; border: none;">
                        <a href="{{ $dashboardRoute }}" style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px;">
                            @if($userImage)
                            <img src="{{ $userImage }}" alt="User Profile" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover; border: 2px solid white;">
                            @else
                            <span style="height: 40px; width: 40px; border: 2px solid white; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-user" style="font-size: 20px; color: white;"></i></span>
                            @endif
                        </a>
                    </div>
                    <div class="user-account-dropdown-menu">
                        <a href="{{ $dashboardRoute }}" class="dropdown-menu-item">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>{{ $isBangla ? 'ড্যাশবোর্ড' : 'Dashboard' }}</span>
                        </a>
                        <div class="dropdown-menu-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-menu-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>{{ $isBangla ? 'লগআউট' : 'Logout' }}</span>
                        </a>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                <div class="nav-item" onclick="window.location.href='{{ route('login') }}'">
                    <span style="height: 40px; width: 40px; border: 2px solid white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-user" style="font-size: 20px; color: white;"></i>
                    </span>
                </div>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu with Categories and Subcategories -->
        <div class="nav-mobile-menu" id="mobileMenu">
            <!-- Main Categories with Subcategories -->
            @php
                // Get main categories (type = 1) for the menu
                $mainCategories = App\Models\Category::where('status', 1)
                                        ->where('type', 1)
                                        ->orderBy('id', 'asc')
                                        ->limit(12)
                                        ->get();
            @endphp
            
            @foreach($mainCategories as $category)
                @php
                    // Check if this category has subcategories (type = 2 with this parent_id)
                    $hasSubcategories = App\Models\Category::where('status', 1)
                                            ->where('type', 2)
                                            ->where('parent_id', $category->id)
                                            ->exists();
                @endphp
                
                <div class="nav-mobile-item {{ $hasSubcategories ? 'has-submenu' : '' }}">
                    <a href="{{ route('product.category', $category->slug) }}" class="main-category-link">
                        <span class="category-name">
                            @if($category->icon)
                            <img src="{{ asset($category->icon) }}" alt="{{ $category->name_en }}" class="category-icon">
                            @else
                            <i class="fas fa-tag"></i>
                            @endif
                            {{ strtoupper($isBangla ? ($category->name_bn ?? $category->name_en) : $category->name_en) }}
                        </span>
                        @if($hasSubcategories)
                        <i class="fas fa-chevron-right submenu-arrow"></i>
                        @endif
                    </a>
                    
                    @if($hasSubcategories)
                        @php
                            // Get subcategories (type = 2)
                            $subcategories = App\Models\Category::where('status', 1)
                                                    ->where('type', 2)
                                                    ->where('parent_id', $category->id)
                                                    ->orderBy('id', 'asc')
                                                    ->get();
                        @endphp
                        
                        <div class="mobile-submenu">
                            @foreach($subcategories as $sub)
                                @php
                                    // Check if this subcategory has further subcategories (type = 3)
                                    $hasSubSubcategories = App\Models\Category::where('status', 1)
                                                            ->where('type', 3)
                                                            ->where('parent_id', $sub->id)
                                                            ->exists();
                                @endphp
                                
                                <div class="mobile-submenu-item {{ $hasSubSubcategories ? 'has-submenu' : '' }}">
                                    <a href="{{ route('product.category', $sub->slug) }}">
                                        {{ $isBangla ? ($sub->name_bn ?? $sub->name_en) : $sub->name_en }}
                                        @if($hasSubSubcategories)
                                        <i class="fas fa-chevron-right submenu-arrow" style="font-size: 10px;"></i>
                                        @endif
                                    </a>
                                    
                                    @if($hasSubSubcategories)
                                        @php
                                            // Get sub-subcategories (type = 3)
                                            $subSubcategories = App\Models\Category::where('status', 1)
                                                                    ->where('type', 3)
                                                                    ->where('parent_id', $sub->id)
                                                                    ->orderBy('id', 'asc')
                                                                    ->get();
                                        @endphp
                                        
                                        <div class="mobile-subsubmenu">
                                            @foreach($subSubcategories as $subSub)
                                            <div class="mobile-subsubmenu-item">
                                                <a href="{{ route('product.category', $subSub->slug) }}">
                                                    {{ $isBangla ? ($subSub->name_bn ?? $subSub->name_en) : $subSub->name_en }}
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
            
            <!-- Divider -->
            <div style="border-top: 1px solid rgba(255, 255, 255, 0.2); margin: 10px 0;"></div>
            
            <!-- Track Order -->
            <div class="nav-mobile-item">
                <a href="{{ route('order.tracking') }}"><i class="fas fa-truck"></i> TRACK ORDER</a>
            </div>
            
            <!-- Divider -->
            <div style="border-top: 1px solid rgba(255, 255, 255, 0.2); margin: 10px 0;"></div>
            
            <!-- User Account Section -->
            @auth
            <div class="nav-mobile-item">
                <a href="{{ $dashboardRoute }}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
            </div>
            <div class="nav-mobile-item">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> LOGOUT
                </a>
            </div>
            @else
            <div class="nav-mobile-item">
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
            </div>
            <div class="nav-mobile-item">
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> REGISTER</a>
            </div>
            @endauth
        </div>
    </div>

    <!-- Desktop Bottom Navigation (Commented Out) -->
    <!--<div class="nav-bottom">
        <div class="nav-bottom-content">
            @foreach ($navCategories as $category)
            <div class="nav-bottom-item">
                <a href="{{ route('product.category', $category->slug) }}">
                    {{ $isBangla ? $category->name_bn : $category->name_en }}
                </a>

                @if ($category->categories->count())
                <div class="submenu">
                    @foreach ($category->categories as $sub)
                    <div class="submenu-item">
                        <a href="{{ route('product.category', $sub->slug) }}">
                            {{ $isBangla ? $sub->name_bn : $sub->name_en }}
                        </a>

                        @if ($sub->categories->count())
                        <div class="submenu-right">
                            @foreach ($sub->categories as $subsub)
                            <a href="{{ route('product.category', $subsub->slug) }}">
                                {{ $isBangla ? $subsub->name_bn : $subsub->name_en }}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>-->

    <!-- Bottom Slider Navigation -->
    <div class="nav-bottom-slider-wrapper" id="navBottomSlider">
        <div class="nav-bottom-slider">
            <div class="nav-bottom-item">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i> {{ $isBangla ? 'হোম' : 'Home' }}</a>
            </div>
            <div class="nav-bottom-item">
                <a href="{{ route('product.show') }}"><i class="fas fa-store"></i> {{ $isBangla ? 'শপ' : 'Shop' }}</a>
            </div>
            @foreach ($navCategories as $category)
            <div class="nav-bottom-item">
                <a href="{{ route('product.category', $category->slug) }}">
                    {{ $isBangla ? $category->name_bn : $category->name_en }}
                </a>
            </div>
            @endforeach
            <div class="nav-bottom-item">
                <a href="{{ route('order.tracking') }}"><i class="fas fa-truck"></i>
                    {{ $isBangla ? 'ট্র্যাক করুন' : 'Track Order' }}</a>
            </div>
        </div>
    </div>
</nav>

<!-- Bottom Nav for Mobile -->
<div class="mobile-bottom-nav">
    <a href="{{ route('home') }}" class="mobile-bottom-nav-item">
        <i class="fas fa-home"></i>
        <span>{{ $isBangla ? 'হোম' : 'Home' }}</span>
    </a>
    <a href="{{ route('product.show') }}" class="mobile-bottom-nav-item">
        <i class="fas fa-store"></i>
        <span>{{ $isBangla ? 'শপ' : 'Shop' }}</span>
    </a>
    <a href="{{ route('category_list.index') }}" class="mobile-bottom-nav-item">
        <i class="fas fa-th-large"></i>
        <span>{{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</span>
    </a>
    <a href="{{ route('cart.show') }}" class="mobile-bottom-nav-item" id="cartSidebarToggleMobile">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">{{ $cartCount }}</span>
        <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
    </a>
    <a href="{{ route('order.tracking') }}" class="mobile-bottom-nav-item">
        <i class="fas fa-truck"></i>
        <span>{{ $isBangla ? 'ট্র্যাক' : 'Track' }}</span>
    </a>
</div>

<!-- Mobile Search Section -->
<section class="d-block d-lg-none">
    <div class="container">
        <form class="d-none d-md-flex" role="search" action="{{ route('product.search') }}" method="post">
            @csrf
            <input class="form-control typewriter-effect" type="search" name="search" placeholder="Search Product Here ..." aria-label="Search">
            <button class="btn search-icon" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</section>

<style>
    .nav-bottom {
        background: #fff;
        border-top: 1px solid #eee;
    }

    .nav-bottom-content {
        display: flex;
        gap: 14px;
    }

    .nav-bottom-item {
        position: relative;
    }

    .nav-bottom-item>a {
        padding: 8px 5px;
        display: block;
        font-size: 14px;
        font-weight: 500;
    }

    /* Level 2 */
    .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background: #fff;
        border: 1px solid #eee;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        display: none;
        z-index: 20;
    }

    .nav-bottom-item:hover>.submenu {
        display: block;
    }

    .submenu-item {
        position: relative;
    }

    .submenu-item>a {
        padding: 10px 14px;
        display: block;
        white-space: nowrap;
    }

    .submenu-item>a:hover {
        background: #f5f5f5;
    }

    /* Level 3 */
    .submenu-right {
        position: absolute;
        top: 0;
        left: 100%;
        min-width: 220px;
        background: #fff;
        border: 1px solid #eee;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        display: none;
    }

    .submenu-item:hover>.submenu-right {
        display: block;
    }

    .submenu-right a {
        padding: 10px 14px;
        display: block;
    }

    .submenu-right a:hover {
        background: #f5f5f5;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function redirectToCategory(select) {
        if (select.value) {
            window.location.href = select.value;
        }
    }
    
    function performSearch() {
        const searchTerm = document.querySelector('.search-input').value;
        if (searchTerm.trim()) {
            window.location.href = "{{ route('product.search') }}?search=" + encodeURIComponent(searchTerm);
        }
    }
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

        // Search on enter key
        $('.search-input').on('keypress', function(e) {
            if (e.which === 13) {
                performSearch();
            }
        });
        
        // Hide search results when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.nav-search').length) {
                $('#search-results').hide();
            }
        });
    });
</script>

<script>
    // Mobile Menu Toggle
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            mobileMenu.classList.toggle('active');
        });

        // Close menu when clicking on a link (except submenu toggles)
        document.querySelectorAll('.nav-mobile-item > a').forEach(link => {
            link.addEventListener('click', function(e) {
                const parent = this.parentElement;
                if (!parent.classList.contains('has-submenu')) {
                    mobileMenu.classList.remove('active');
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.navbar') && mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
            }
        });
    }

    // Mobile Submenu Toggle
    document.querySelectorAll('.nav-mobile-item.has-submenu > a').forEach(item => {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('active');
                
                // Close other open submenus at same level
                document.querySelectorAll('.nav-mobile-item.has-submenu.active').forEach(other => {
                    if (other !== parent) {
                        other.classList.remove('active');
                    }
                });
            }
        });
    });

    // Mobile Sub-submenu Toggle
    document.querySelectorAll('.mobile-submenu-item.has-submenu > a').forEach(item => {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('active');
                
                // Close other open sub-submenus at same level
                document.querySelectorAll('.mobile-submenu-item.has-submenu.active').forEach(other => {
                    if (other !== parent) {
                        other.classList.remove('active');
                    }
                });
            }
        });
    });

    // Cart sidebar toggle
    const cartToggle = document.getElementById('cartSidebarToggle');
    const cartToggleMobile = document.getElementById('cartSidebarToggleMobile');
    if (cartToggle) cartToggle.addEventListener('click', function() {
        // Trigger your cart sidebar here
    });
    if (cartToggleMobile) cartToggleMobile.addEventListener('click', function() {
        // Trigger your cart sidebar here
    });
</script>