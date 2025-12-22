{{-- resources/views/FrontEnd/Affiliate/include/sidebar.blade.php --}}
{{-- Mobile Toggle Button --}}
<div class="mobile-header d-lg-none d-flex justify-content-between align-items-center mb-3 px-2">
    <h5 class="mb-0">Menu</h5>
    <button class="mobile-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#affiliateSidebar" aria-expanded="false" aria-controls="affiliateSidebar">
        <i class="bi bi-list fs-5"></i>
    </button>
</div>

{{-- Sidebar Content --}}
<div class="collapse d-lg-block sidebar" id="affiliateSidebar">
    <div class="card shadow-sm border-0 rounded-4 bg-white p-3">

        {{-- Sidebar Items --}}
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('affiliate.dashboard') }}" class="sidebar-item {{ request()->routeIs('affiliate.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('affiliate.profile') }}" class="sidebar-item {{ request()->routeIs('affiliate.profile') ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i> <span>Profile</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('affiliate.orders') }}" class="sidebar-item {{ request()->routeIs('affiliate.orders') ? 'active' : '' }}">
                    <i class="bi bi-cart3"></i> <span>Orders</span>
                </a>
            </li>

            <li class="nav-item mb-2">
                <form method="POST" action="{{ route('affiliate.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-item logout-item btn btn-link p-0 d-flex align-items-center">
                        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>

    </div>
</div>
