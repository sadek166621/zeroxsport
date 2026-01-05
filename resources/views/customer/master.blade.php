<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<style>
    :root {
        --primary: #026142;
        --primary-light: #e8f5f1;
        --primary-dark: #014d34;
        --primary-lighter: #f0faf8;
        --secondary: #6b7280;
        --success: #10b981;
        --success-light: #d1fae5;
        --warning: #f59e0b;
        --warning-light: #fef3c7;
        --danger: #ef4444;
        --danger-light: #fee2e2;
        --info: #3b82f6;
        --info-light: #dbeafe;
        --light: #f9fafb;
        --lighter: #f3f4f6;
        --dark: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, 'Trebuchet MS', sans-serif;
        color: var(--dark);
        background: linear-gradient(135deg, #f0faf8 0%, #f9fafb 100%);
    }

    .dashboard-container {
        padding: 2.5rem 0;
        min-height: 100vh;
    }

    .custom_container {
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .dashboard-content {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(2, 97, 66, 0.08);
        border: 1px solid rgba(2, 97, 66, 0.05);
    }

    .content-header {
        padding-bottom: 2rem;
        border-bottom: 2px solid var(--lighter);
        margin-bottom: 2rem;
    }

    .content-header h2 {
        color: var(--dark);
        font-weight: 800;
        margin-bottom: 0.5rem;
        font-size: 2.2rem;
        letter-spacing: -0.5px;
    }

    .content-header p {
        color: var(--text-muted);
        margin: 0;
        font-size: 1rem;
        font-weight: 400;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1.5rem 0;
        }

        .custom_container {
            padding: 0 .5rem;
        }

        .dashboard-content {
            padding: .75rem;
        }
</style>

<body class="bg-light">
    @include('customer.include.header')

    <div class="dashboard-container">
        <div class="custom_container">
            <div class="row g-4">
                <!-- Sidebar -->
                @include('customer.include.sidebar')

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="dashboard-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('customer.include.cart-contianer')
    @include('customer.include.footer')


    @stack('scripts')
</body>

</html>