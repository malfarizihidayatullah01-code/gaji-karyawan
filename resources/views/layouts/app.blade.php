<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Sistem Penggajian
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icon -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- CSS Custom -->
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Logo -->
    <div class="logo">

        PENGGAJIAN KARYAWAN

    </div>

    <!-- Dashboard -->
    <a
        href="/dashboard"
        class="
            {{
                request()->is('dashboard')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-house"></i>

        Dashboard

    </a>

    <!-- Departemen -->
    <a
        href="/departemen"
        class="
            {{
                request()->is('departemen*')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-building"></i>

        Departemen

    </a>

    <!-- Jabatan -->
    <a
        href="/jabatan"
        class="
            {{
                request()->is('jabatan*')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-briefcase"></i>

        Jabatan

    </a>

    <!-- Karyawan -->
    <a
        href="/karyawan"
        class="
            {{
                request()->is('karyawan*')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-people"></i>

        Karyawan

    </a>

    <!-- Absensi -->
    <a
        href="/absensi"
        class="
            {{
                request()->is('absensi*')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-calendar-check"></i>

        Absensi

    </a>

    <!-- Penggajian -->
    <a
        href="/penggajian"
        class="
            {{
                request()->is('penggajian*')
                ? 'active'
                : ''
            }}
        "
    >

        <i class="bi bi-cash-stack"></i>

        Penggajian

    </a>

</div>

<!-- Content -->
<div class="content">

    @yield('content')

</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>