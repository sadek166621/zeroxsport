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

// Fetch categories for nav-bottom
$navCategories = \App\Models\Category::where('type', 1)->limit(7)->get();
$allCategories = \App\Models\Category::where('type', 1)->get();
$currentCategorySlug = request()->route('slug');
@endphp

<style>
    .navbar {
        background: linear-gradient(to right, #003D32, #036B47);
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
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
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
    }

    .search-button {
        background-color: #febd69;
        border: none;
        padding: 0 20px;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
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
        color: #fff;
        font-weight: bold;
        font-size: 14px;
    }

    .cart-text {
        font-size: 12px;
        font-weight: bold;
    }

    .nav-bottom {
        background-color: #085749;
        display: flex;
        align-items: center;
        gap: 0;
        font-size: 14px;
        border-bottom: 1px solid #003D32;
        flex-wrap: nowrap;
        width: 100%;
        padding: 0;
        overflow-x: auto;
        margin: 0 auto;
        max-width: 1400px;
    }

    .nav-bottom-item {
        padding: 5px 8px;
        cursor: pointer;
        border: none;
        color: whitesmoke;
        transition: all 0.3s ease;
        white-space: nowrap;
        flex-shrink: 0;
        border-bottom: 3px solid transparent;
    }

    .nav-bottom-item a {
        color: whitesmoke;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .nav-bottom-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-bottom-color: #01B45E;
    }

    .nav-bottom-item:hover a {
        color: white;
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
        background-color: #003D32;
        flex-direction: column;
        padding: 15px;
        gap: 10px;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-mobile-menu.active {
        display: flex;
    }

    .nav-mobile-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        color: white;
        border-radius: 4px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .nav-mobile-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .nav-mobile-item a {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
    }

    .user-account-dropdown {
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .user-account-dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        color: #333;
        border-radius: 4px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        min-width: 200px;
        z-index: 1001;
        margin-top: 5px;
    }

    .user-account-dropdown:hover .user-account-dropdown-menu {
        display: block;
    }

    .dropdown-menu-item {
        padding: 10px 15px;
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .dropdown-menu-item:hover {
        background-color: #f0f0f0;
    }

    .dropdown-menu-divider {
        height: 1px;
        background-color: #e0e0e0;
        margin: 5px 0;
    }

    .mobile-bottom-nav {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #003D32;
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
            width: 130px;
        }
    }

    @media (max-width: 768px) {
        .logo {
            width: 100px;
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
            width: 80px;
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
    }

    @media (max-width: 320px) {
        .logo {
            width: 65px;
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
        <div class="nav-logo">
            <a href="{{ route('home') }}" class="logo-text">
                <img src="{{ $logoUrl }}" alt="logo" class="logo">
            </a>
        </div>

        <div class="nav-search">
            <select class="search-select" onchange="redirectToCategory(this)">
                <option value="">{{ $isBangla ? 'সব' : 'All' }}</option>
                @foreach ($allCategories as $category)
                <option value="{{ route('product.category', $category->slug) }}"
                    {{ $currentCategorySlug === $category->slug ? 'selected' : '' }}>
                    {{ $isBangla ? $category->name_bn : $category->name_en }}
                </option>
                @endforeach
            </select>
            <input type="text" class="search-input" id="search-input" name="search"
                placeholder="{{ $isBangla ? 'এখানে অনুসন্ধান করুন...' : 'Search products...' }}"
                onfocus="search_result_show()" onblur="search_result_hide()">
            <button class="search-button" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <div id="search-results" class="searchProducts"
                style="position: absolute; z-index: 999; width: 100%; top: 120%; display: none;"></div>
        </div>

        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="nav-account-section">
            @auth
            <div class="user-account-dropdown">
                <div class="nav-item">
                    <a href="{{ $dashboardRoute }}">
                        <span class="btn btn-info"
                            style="background-color: white; color: #003D32;">{{ $isBangla ? 'ড্যাশবোর্ড' : 'Dashboard' }}</span>
                    </a>
                    {{-- <span class="nav-item-top">{{ $isBangla ? 'হ্যালো' : 'Hello' }}, {{ $userName }}</span> --}}
                    {{-- <span class="nav-item-bottom">{{ $isBangla ? 'অ্যাকাউন্ট' : 'Account' }}</span> --}}
                </div>
                {{-- <div class="user-account-dropdown-menu">
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
            </div> --}}
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @else
        <div class="nav-item" onclick="window.location.href='{{ route('login') }}'">
            <span class="nav-item-top">{{ $isBangla ? 'স্বাগতম' : 'Hello, sign in' }}</span>
            <span class="nav-item-bottom">{{ $isBangla ? 'অ্যাকাউন্ট' : 'Account' }}</span>
        </div>
        @endauth

        <div class="nav-item">
            <span class="nav-item-top">{{ $isBangla ? 'রিটার্ন' : 'Returns' }}</span>
            <span class="nav-item-bottom">{{ $isBangla ? 'ও অর্ডার' : '& Orders' }}</span>
        </div>

        <div class="nav-cart" id="cartSidebarToggle">
            <span class="cart-icon"><i class="fas fa-shopping-cart"></i></span>
            <span class="cart-count cartQty">0</span>
            <span class="cart-text">{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
        </div>
    </div>

    <div class="nav-mobile-menu" id="mobileMenu">
        <div class="nav-mobile-item">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> {{ $isBangla ? 'হোম' : 'Home' }}</a>
        </div>
        <div class="nav-mobile-item">
            <a href="{{ route('product.show') }}"><i class="fas fa-store"></i> {{ $isBangla ? 'শপ' : 'Shop' }}</a>
        </div>
        <div class="nav-mobile-item">
            <a href="{{ route('category_list.index') }}"><i class="fas fa-th-large"></i>
                {{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</a>
        </div>
        <div class="nav-mobile-item">
            <a href="{{ route('order.tracking') }}"><i class="fas fa-truck"></i>
                {{ $isBangla ? 'ট্র্যাক করুন' : 'Track Order' }}</a>
        </div>
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.3); margin-top: 10px;"></div>
        @auth
        <div class="nav-mobile-item">
            <a href="{{ $dashboardRoute }}"><i class="fas fa-tachometer-alt"></i>
                {{ $isBangla ? 'ড্যাশবোর্ড' : 'Dashboard' }}</a>
        </div>
        <div class="nav-mobile-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ $isBangla ? 'লগআউট' : 'Logout' }}
            </a>
        </div>
        @else
        <div class="nav-mobile-item">
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>
                {{ $isBangla ? 'লগইন' : 'Login' }}</a>
        </div>
        @endauth
    </div>
    </div>

    <div class="nav-bottom">
        <div class="nav-bottom-item">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> {{ $isBangla ? 'হোম' : 'Home' }}</a>
        </div>
        <div class="nav-bottom-item">
            <a href="{{ route('product.show') }}"><i class="fas fa-store"></i> {{ $isBangla ? 'শপ' : 'Shop' }}</a>
        </div>
        <div class="nav-bottom-item">
            <a href="{{ route('category_list.index') }}"><i class="fas fa-th-large"></i>
                {{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</a>
        </div>
        <div class="nav-bottom-item">
            <a href="{{ route('order.tracking') }}"><i class="fas fa-truck"></i>
                {{ $isBangla ? 'ট্র্যাক করুন' : 'Track Order' }}</a>
        </div>
    </div>

    <div class="nav-bottom-slider-wrapper" id="navBottomSlider">
        <div class="nav-bottom-slider">
            <div class="nav-bottom-item">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i> {{ $isBangla ? 'হোম' : 'Home' }}</a>
            </div>
            <div class="nav-bottom-item">
                <a href="{{ route('product.show') }}"><i class="fas fa-store"></i> {{ $isBangla ? 'শপ' : 'Shop' }}</a>
            </div>
            <div class="nav-bottom-item">
                <a href="{{ route('category_list.index') }}"><i class="fas fa-th-large"></i>
                    {{ $isBangla ? 'ক্যাটাগোরি' : 'Categories' }}</a>
            </div>
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
        <span class="cart-count cartQty">0</span>
        <span>{{ $isBangla ? 'কার্ট' : 'Cart' }}</span>
    </a>
    <a href="{{ route('order.tracking') }}" class="mobile-bottom-nav-item">
        <i class="fas fa-truck"></i>
        <span>{{ $isBangla ? 'ট্র্যাক' : 'Track' }}</span>
    </a>
</div>

<section class="d-block d-lg-none">
    <div class="container">
        <form class="d-none d-md-flex " role="search" action="{{ route('product.search') }}" method="post">
            @csrf
            <input class="form-control typewriter-effect " type="search" onfocus="search_result_show()"
                onblur="search_result_hide()" name="search" placeholder="Search Product Here ..."
                aria-label="Search">
            <button class="btn search-icon" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function redirectToCategory(select) {
        if (select.value) {
            window.location.href = select.value;
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

        // Search button functionality
        document.querySelector('.search-button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-input').value;
            if (searchTerm) {
                window.location.href = "{{ route('product.search') }}?search=" + encodeURIComponent(searchTerm);
            }
        });

        document.querySelector('.search-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value;
                if (searchTerm) {
                    window.location.href = "{{ route('product.search') }}?search=" + encodeURIComponent(searchTerm);
                }
            }
        });
    });
</script>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle('active');
    });

    document.querySelectorAll('.nav-mobile-item a').forEach(link => {
        link.addEventListener('click', function(e) {
            mobileMenu.classList.remove('active');
        });
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.navbar')) {
            mobileMenu.classList.remove('active');
        }
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