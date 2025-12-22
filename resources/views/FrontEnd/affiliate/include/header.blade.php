@php  $logoUrl = asset(get_setting('site_logo')->value); @endphp
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 mb-4">
    <div class="container-fluid align-items-center d-flex justify-content-between">

        {{-- Left: Logo --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('affiliate.dashboard') }}">
            <img src="{{ $logoUrl }}" alt="Logo" height="40">
        </a>

        {{-- Center: Title --}}
        <h5 class="mb-0 text-center flex-grow-1 text-primary fw-bold" style="font-size: 1.25rem;">
            অ্যাফিলিয়েট ড্যাশবোর্ড
        </h5>

        {{-- Right: Logout --}}
        <form method="POST" action="{{ route('affiliate.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="bi bi-box-arrow-right me-1"></i> লগআউট
            </button>
        </form>

    </div>
</nav>
