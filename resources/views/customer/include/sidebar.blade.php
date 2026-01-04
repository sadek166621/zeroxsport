<div class="col-lg-3">
    <div class="dashboard-sidebar">
        <div class="user-profile modern-user-profile p-2 shadow-sm rounded-3 position-relative text-center d-flex align-items-center gap-4">
            <div class="profile-bg rounded-3 position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #01B45E 0%, #efc1ba 100%); opacity: 0.08; z-index: 0;"></div>
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="profile-image position-relative" style="z-index:1;">
                        @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))
                        <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile" class="rounded-circle border border-3 border-white shadow" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                        <div class="default-avatar rounded-circle border border-3 border-white shadow d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: #f8f9fa;">
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
            </div>
        </div>

        <nav class="dashboard-nav mt-3">
            <div class="nav-group">
                <p class="nav-label">MAIN MENU</p>
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.orders') }}" class="nav-link {{ request()->routeIs('dashboard.orders') ? 'active' : '' }}">
                            <i class="fas fa-shopping-bag"></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-group">
                <p class="nav-label">ACCOUNT SETTINGS</p>
                <ul>
                    <li>
                        <a href="{{ route('dashboard.profile') }}" class="nav-link {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
                            <i class="fas fa-user"></i>
                            <span>Profile Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.password') }}" class="nav-link {{ request()->routeIs('dashboard.password') ? 'active' : '' }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --primary-dark: #014d34;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

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
        text-decoration: none;
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

    @media (max-width: 992px) {
        .dashboard-sidebar {
            position: relative;
            top: auto;
            margin-bottom: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .modern-user-profile {
            padding: 1.75rem !important;
        }

        .dashboard-nav {
            padding: 1.25rem;
        }
    }
</style>