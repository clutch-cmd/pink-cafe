<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">

    <div class="admin-wrapper">

        {{-- SIDEBAR --}}
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <img src="{{ asset('images/pinkcafe_logo.jpg') }}" alt="Pink Cafe">
                <span>PINK CAFÉ</span>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </a>
                <a href="{{ route('admin.comenzi') }}" class="{{ request()->routeIs('admin.comenzi') ? 'active' : '' }}">
                    <i class="fa-solid fa-box-open"></i> Comenzi
                </a>
                <a href="{{ route('admin.produse') }}" class="{{ request()->routeIs('admin.produse') ? 'active' : '' }}">
                    <i class="fa-solid fa-cookie-bite"></i> Produse
                </a>
            </nav>

            <div class="admin-sidebar-footer">
                <a href="{{ route('home') }}" class="btn-back-site">
                    <i class="fa-solid fa-arrow-left"></i> Înapoi la Site
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout-admin">
                        <i class="fa-solid fa-power-off"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- CONTENT --}}
        <main class="admin-main">
            @if(session('success'))
                <div class="admin-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>