<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vendor Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #d9e4f5);
            font-family: 'Inter', sans-serif;
        }

        .card-login {
            max-width: 400px;
            margin: 120px auto;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: #fff;
            padding: 30px;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .btn-primary {
            border-radius: 30px;
            padding: 12px;
            font-weight: bold;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #004085);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="card card-login">
        <h4 class="text-center mb-4">Vendor Login</h4>

        <!-- Alert Message -->
        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('vendor.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label fw-semibold">Email or Phone</label>
                <input type="text" name="login" id="login"
                    class="form-control @error('login') is-invalid @enderror" placeholder="Enter your email or phone"
                    value="{{ old('login') }}">
                @error('login')
                    <span class="text-danger fw-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                @error('password')
                    <span class="text-danger fw-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" checked>
                    <span class="form-check-label">Remember</span>
                </label>
                <a href="{{ route('forgot.password') }}" class="text-muted small">Forgot password?</a>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Messages -->
    <script>
        @if (Session::has('message'))
            toastr["{{ Session::get('alert-type', 'info') }}"]("{{ Session::get('message') }}");
        @endif
    </script>

</body>

</html>
