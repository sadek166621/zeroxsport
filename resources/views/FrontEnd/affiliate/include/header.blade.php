<style>
    .affiliate-navbar {
        background: #036243 !important;
        box-shadow: 0 2px 12px rgba(241, 89, 42, 0.15);
        padding: 10px 0 !important;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .navbar-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 0 12px;
        width: 100%;
        min-height: 56px;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        padding: 4px 8px;
        border-radius: 6px;
        flex-shrink: 0;
        min-width: 50px;
        max-width: 150px;
    }

    .navbar-brand img {
        width: 100%;
        height: auto;
        max-width: 150px;
        object-fit: contain;
    }

    .navbar-title {
        color: white;
        font-size: clamp(0.8rem, 2.5vw, 1.3rem);
        font-weight: 700;
        text-align: center;
        flex-grow: 1;
        flex-shrink: 1;
        letter-spacing: 0.3px;
        margin: 0;
        line-height: 1.2;
        word-wrap: break-word;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding: 5px;
    }

    .navbar-logout {
        background: white;
        color: #036243;
        border: none;
        padding: clamp(6px, 1.5vw, 8px) clamp(10px, 2vw, 20px);
        border-radius: 6px;
        font-weight: 600;
        font-size: clamp(11px, 1.5vw, 13px);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        flex-shrink: 0;
        white-space: nowrap;
        cursor: pointer;
    }

    .navbar-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        color: #036243;
    }

    .navbar-logout:active {
        transform: translateY(0);
    }

    .navbar-logout i {
        font-size: clamp(12px, 2vw, 16px);
        min-width: 14px;
    }

    /* Extra Small Devices (320px - 374px) */
    @media (max-width: 374px) {
        .affiliate-navbar {
            padding: 8px 0 !important;
        }

        .navbar-container {
            min-height: 50px;
            padding: 0 8px;
            gap: 6px;
        }

        .navbar-brand {
            padding: 3px 6px;
            min-width: 45px;
            max-width: 70px;
        }

        .navbar-brand img {
            max-width: 65px;
        }

        .navbar-title {
            font-size: 0.75rem;
            letter-spacing: 0;
        }

        .navbar-logout {
            padding: 5px 8px;
            font-size: 10px;
            gap: 4px;
        }

        .navbar-logout i {
            display: none;
        }

        .navbar-logout span {
            display: inline;
        }
    }

    /* Small Devices (375px - 575px) */
    @media (min-width: 375px) and (max-width: 575px) {
        .affiliate-navbar {
            padding: 9px 0 !important;
        }

        .navbar-container {
            min-height: 52px;
            padding: 0 10px;
            gap: 8px;
        }

        .navbar-brand {
            padding: 3px 7px;
            min-width: 48px;
            max-width: 80px;
        }

        .navbar-brand img {
            max-width: 75px;
        }

        .navbar-title {
            font-size: 0.85rem;
        }

        .navbar-logout {
            padding: 6px 12px;
            font-size: 11px;
            gap: 5px;
        }

        .navbar-logout i {
            display: none;
        }
    }

    /* Medium Devices (576px - 767px) */
    @media (min-width: 576px) and (max-width: 767px) {
        .navbar-container {
            padding: 0 12px;
            gap: 12px;
            min-height: 54px;
        }

        .navbar-brand {
            padding: 4px 8px;
            min-width: 60px;
            max-width: 90px;
        }

        .navbar-brand img {
            max-width: 85px;
        }

        .navbar-title {
            font-size: 1rem;
        }

        .navbar-logout {
            padding: 7px 14px;
            font-size: 12px;
            gap: 5px;
        }

        .navbar-logout i {
            display: none;
        }
    }

    /* Tablets & Large Devices (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .navbar-container {
            padding: 0 16px;
            gap: 16px;
        }

        .navbar-brand {
            padding: 5px 10px;
            max-width: 100px;
        }

        .navbar-brand img {
            max-width: 95px;
        }

        .navbar-title {
            font-size: 1.1rem;
        }

        .navbar-logout {
            padding: 7px 16px;
            font-size: 12px;
        }

        .navbar-logout i {
            display: inline;
        }
    }

    /* Desktop (992px and above) */
    @media (min-width: 992px) {
        .navbar-container {
            padding: 0 20px;
        }

        .navbar-brand {
            padding: 5px 10px;
        }

        .navbar-brand img {
            width: 120px;
        }

        .navbar-title {
            font-size: 1.3rem;
        }

        .navbar-logout {
            padding: 8px 20px;
            font-size: 13px;
        }

        .navbar-logout i {
            display: inline;
        }
    }
</style>

@php $logoUrl = asset(get_setting('site_logo')->value); @endphp

<nav class="navbar affiliate-navbar">
    <div class="navbar-container">
        {{-- Left: Logo --}}
        <a class="navbar-brand" href="{{ route('affiliate.dashboard') }}" title="Dashboard">
            <img src="{{ asset('FrontEnd/img/Online-Hut-BD-Main-Logo.png') }}" alt="Logo">
        </a>

        {{-- Center: Title --}}
        <h5 class="navbar-title" title="Affiliate Dashboard">
            অ্যাফিলিয়েট ড্যাশবোর্ড
        </h5>

        {{-- Right: Logout --}}
        <form method="POST" action="{{ route('affiliate.logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="navbar-logout" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>লগআউট</span>
            </button>
        </form>
    </div>
</nav>
