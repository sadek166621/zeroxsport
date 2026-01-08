<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Affiliate Panel')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />

    {{-- Custom CSS --}}
    @include('FrontEnd.affiliate.include.style')
</head>
<body class="bg-light">

    {{-- Header --}}
    @include('FrontEnd.affiliate.include.header')

<div class="container-fluid py-4">
    <div class="row gx-4 gy-3">

        {{-- Sidebar --}}
        <div class="col-lg-3">
            @include('FrontEnd.affiliate.include.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="col-lg-9">
            @yield('content')
        </div>

    </div>
</div>

    {{-- Footer Scripts --}}
    @include('FrontEnd.affiliate.include.scripts')

    {{-- Clipboard JS --}}
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Optionally, use a toast notification here instead of alert
                console.log("Copied to clipboard");
            }).catch(err => {
                console.error("Copy failed: ", err);
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
