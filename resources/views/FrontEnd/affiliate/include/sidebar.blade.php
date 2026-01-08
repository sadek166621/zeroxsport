{{-- resources/views/FrontEnd/Affiliate/include/sidebar.blade.php --}}
<style>
    /* ========== MOBILE HEADER ========== */
    .mobile-header {
        background: linear-gradient(135deg, #026243 0%, #014d36 100%);
        border-radius: 12px;
        padding: 16px 20px !important;
        color: white;
        margin-bottom: 20px !important;
        display: none;
        box-shadow: 0 4px 15px rgba(2, 98, 67, 0.2);
    }

    .mobile-header h5 {
        font-weight: 700;
        margin: 0;
        font-size: 1.1rem;
        letter-spacing: 0.3px;
    }

    .mobile-toggle {
        background: white;
        border: none;
        border-radius: 8px;
        width: 100px ! important;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #026243;
        padding: 0;
        flex-shrink: 0;
        font-size: 1.3rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .mobile-toggle:hover {
        transform: scale(1.08);
        box-shadow: 0 4px 12px rgba(2, 98, 67, 0.2);
        background-color: #003E33;
    }

    .mobile-toggle:active {
        transform: scale(0.92);
    }

    /* ========== SIDEBAR ========== */
    .sidebar {
        border-radius: 12px;
    }

    .sidebar .card {
        border-radius: 16px !important;
        background: white !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
        border: 1px solid #f5f5f5 !important;
        overflow: hidden;
        position: relative;
    }

    .sidebar .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #026243 0%, #014d36 100%);
    }

    .nav {
        list-style: none;
        padding: 8px 0;
        margin: 0;
    }

    .nav-item {
        margin-bottom: 0 !important;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 10px !important;
        color: #666;
        text-decoration: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 15px;
        background: transparent;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
        margin: 4px 8px;
        position: relative;
    }

    .sidebar-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 20px;
        background: #026243;
        border-radius: 0 4px 4px 0;
        transition: width 0.3s ease;
    }

    .sidebar-item:hover {
        background: #f0f5f3;
        color: #026243;
        transform: translateX(4px);
    }

    .sidebar-item:hover::before {
        width: 4px;
    }

    .sidebar-item i {
        font-size: 1.2rem;
        min-width: 24px;
        transition: all 0.3s ease;
    }

    .sidebar-item.active {
        background: linear-gradient(135deg, rgba(2, 98, 67, 0.15) 0%, rgba(2, 98, 67, 0.08) 100%);
        color: #026243;
        font-weight: 600;
    }

    .sidebar-item.active::before {
        width: 4px;
        background: #026243;
    }

    .sidebar-item.active i {
        color: #026243;
        transform: scale(1.1);
    }

    .logout-item {
        width: calc(100% - 16px);
        justify-content: flex-start;
        margin-top: 8px !important;
        margin-left: 8px;
        margin-right: 8px;
        padding-top: 14px !important;
        border-top: 1px solid #f0f0f0;
        color: #014d36;
    }

    .logout-item:hover {
        background: #e0f0ec;
        color: #014d36;
    }

    .logout-item:hover i {
        transform: translateX(2px);
    }

    /* ========== DESKTOP VIEW ========== */
    @media (min-width: 992px) {
        .mobile-header {
            display: none !important;
        }

        .sidebar {
            display: block !important;
            max-height: none !important;
        }

        .sidebar .card {
            box-shadow: 0 2px 12px rgba(2, 98, 67, 0.1) !important;
        }
    }

    /* ========== TABLET & MOBILE VIEW ========== */
    @media (max-width: 991px) {
        .mobile-header {
            display: flex !important;
        }

        .sidebar {
            display: block;
            max-height: 0;
            overflow: hidden;
            margin-bottom: 0;
            width: 100%;
            transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar.show {
            max-height: 700px;
            margin-bottom: 20px;
        }

        .sidebar-item span {
            display: inline-block;
        }
    }

    @media (max-width: 576px) {
        .mobile-header {
            padding: 12px 16px !important;
            margin-bottom: 16px !important;
            border-radius: 10px;
        }

        .mobile-header h5 {
            font-size: 0.95rem;
        }

        .mobile-toggle {
            width: 38px;
            height: 38px;
            font-size: 1.1rem;
        }

        .sidebar .card {
            padding: 8px !important;
            border-radius: 12px !important;
        }

        .sidebar-item {
            padding: 12px 14px !important;
            font-size: 13px;
            margin: 3px 6px;
            gap: 10px;
        }

        .sidebar-item i {
            font-size: 1rem;
            min-width: 20px;
        }

        .sidebar-item.active {
            border-left: 3px solid #026243;
            padding-left: 11px !important;
        }

        .sidebar.show {
            max-height: 600px;
        }

        .logout-item {
            margin-left: 6px;
            margin-right: 6px;
            width: calc(100% - 12px);
        }
    }
</style>


{{-- Mobile Toggle Button --}}
<div class="mobile-header d-lg-none d-flex justify-content-between align-items-center">
    <!--<h5><i class="bi bi-list me-2"></i>Menu</h5>-->
    <button class="mobile-toggle" type="button" id="sidebarToggle" aria-expanded="false" aria-controls="affiliateSidebar">
      Menu  <i class="bi bi-list"></i>
    </button>
</div>

{{-- Sidebar Content --}}
<div class="sidebar" id="affiliateSidebar">
    <div class="card shadow-sm border-0 rounded-4 bg-white p-2 position-relative">

        {{-- Sidebar Items --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('affiliate.dashboard') }}" class="sidebar-item {{ request()->routeIs('affiliate.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('affiliate.profile') }}" class="sidebar-item {{ request()->routeIs('affiliate.profile') ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i> <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('affiliate.orders') }}" class="sidebar-item {{ request()->routeIs('affiliate.orders') ? 'active' : '' }}">
                    <i class="bi bi-cart3"></i> <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('affiliate.logout') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="sidebar-item logout-item">
                        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('affiliateSidebar');
        const navLinks = document.querySelectorAll('.sidebar-item[href]');

        if (toggleBtn && sidebar) {
            // Toggle sidebar visibility
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const isOpen = sidebar.classList.contains('show');
                sidebar.classList.toggle('show');
                toggleBtn.setAttribute('aria-expanded', !isOpen);
            });

            // Close sidebar when navigation link is clicked (mobile only)
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('show');
                        toggleBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            });

            // Close sidebar when clicking outside (mobile only)
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    const isClickInsideSidebar = sidebar.contains(e.target);
                    const isClickOnToggle = toggleBtn.contains(e.target);
                    
                    if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
                        sidebar.classList.remove('show');
                        toggleBtn.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            // Reset on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('show');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
</script>