<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Penggajian</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            background-color: #0d6efd;
            color: white;
            padding: 24px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
    </style>
</head>
<body>

    <div class="login-card">

        <!-- Header -->
        <div class="login-header">
            <i class="bi bi-cash-stack fs-1"></i>
            <h5 class="mt-2 mb-0">Sistem Penggajian</h5>
        </div>

        <!-- Form -->
        <div class="card border-top-0 rounded-top-0">
            <div class="card-body p-4">

                <h6 class="mb-4 text-muted">Silakan login untuk melanjutkan</h6>

                <!-- Error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Success -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                autofocus
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                            >
                        </div>
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Login
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>
</html>
