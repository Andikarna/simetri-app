<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Dashboard</title>
    <link rel="icon" href="{{ asset('images/logo-simetri.png') }}" type="image/png" sizes="16x16">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/akku-logo.png') }}" type="image/png" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-blue: #002B5B;
            --accent-red: #E94560;
            --light-bg: #ffffff;
            --light-gray: #f7f9fc;
            --text-dark: #222831;
            --text-gray: #6c757d;
        }

        body {
            background-color: var(--light-gray);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--primary-blue);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo img {
            width: 90px;
            margin-bottom: 10px;
        }

        .sidebar .logo h5 {
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        .sidebar .nav-item {
            margin-bottom: 10px;
        }

        .sidebar .nav-link {
            color: #cfd8dc;
            font-size: 15px;
            display: flex;
            align-items: center;
            padding: 10px 12px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--accent-red);
            color: #fff;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 90px 30px 30px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 60px;
            background-color: var(--light-bg);
            border-bottom: 2px solid var(--primary-blue);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 25px;
            z-index: 1000;
        }

        .navbar {
            background-color: var(--light-bg);
            /* Tetap putih agar kontras */
            border-bottom: 3px solid var(--primary-blue);
        }

        .card {
            border-left: 4px solid var(--primary-blue);
        }

        .navbar .user-profile {
            display: flex;
            align-items: center;
        }

        .navbar .user-profile img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid var(--accent-red);
        }

        .navbar .user-profile span {
            font-size: 16px;
            font-weight: 500;
            color: var(--primary-blue);
        }


        .btn-danger {
            background-color: var(--accent-red);
            border-color: var(--accent-red);
        }

        .btn-danger:hover {
            background-color: #c02d48;
            border-color: #c02d48;
        }

        footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: var(--text-gray);
            margin-top: 30px;
        }

        .dropdown-menu {
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .dropdown-item:hover {
            background-color: var(--accent-red);
            color: white;
        }
    </style>

</head>

<body>

    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo-simetri.png') }}" alt="Logo">
            <h5 class="mt-2">PT Simetri Indo Pratama</h5>
        </div>

        <ul class="nav flex-column">
            @php use App\Models\user_management; @endphp

            @if (user_management::where('role_id', auth()->user()->role_id)->where('menu_id', 1)->exists())
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-fill"></i> Dashboard
                    </a>
                </li>
            @endif

            @if (user_management::where('role_id', auth()->user()->role_id)->where('menu_id', 2)->exists())
                <li class="nav-item">
                    <a href="{{ route('request') }}"
                        class="nav-link {{ request()->is('request') ? 'active' : '' }} class="nav-link">
                        <i class="bi bi-inbox"></i> Permintaan
                    </a>
                </li>
            @endif

            @if (user_management::where('role_id', auth()->user()->role_id)->where('menu_id', 3)->exists())
                <li class="nav-item">
                    <a href="{{ route('cutting') }}"
                        class="nav-link {{ request()->is('cutting') ? 'active' : '' }} class="nav-link">
                        <i class="bi bi-scissors"></i> Daftar Potong
                    </a>
                </li>
            @endif

            @if (user_management::where('role_id', auth()->user()->role_id)->where('menu_id', 4)->exists())
                <li class="nav-item">
                    <a href="{{ route('buying') }}"
                        class="nav-link {{ request()->is('buying') ? 'active' : '' }} class="nav-link">
                        <i class="bi bi-inbox"></i> Pembelian
                    </a>
                </li>
            @endif

            @if (user_management::where('role_id', auth()->user()->role_id)->where('menu_id', 5)->exists())
                <li class="nav-item">
                    <a href="{{ route('product') }}"
                        class="nav-link {{ request()->is('product') ? 'active' : '' }} class="nav-link">
                        <i class="bi bi-box"></i> Produk
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar">
        <div class="d-flex align-items-center">
            <i class="bi bi-list me-3 fs-4 d-none d-md-block" style="color: var(--primary-blue); cursor: pointer;"></i>
            <h4 class="mb-0">@yield('title')</h4>
        </div>

        <div class="d-flex align-items-center gap-4">
            <!-- Optional: Notification Bell -->
            <div class="position-relative">
                <i class="bi bi-bell-fill fs-5 text-secondary"></i>
            </div>

            <!-- Optional: Clock -->
            <div class="text-secondary d-none d-md-block">
                <small id="clock"></small>
            </div>

            <!-- User Profile Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://picsum.photos/id/{{ Auth::user()->id }}/200/300" alt="User"
                        class="rounded-circle me-2" width="40" height="40">
                    <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="px-3">
                            @csrf
                            <button type="submit" class="btn btn-sm text-danger w-100 text-start">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 PT SiMETRINDO. All Rights Reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

    <script>
        function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString();
            document.getElementById('clock').textContent = time;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>

</body>

</html>
