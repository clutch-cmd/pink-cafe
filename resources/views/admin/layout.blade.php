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

    {{-- OVERLAY mobil --}}
    <div class="admin-overlay" id="adminOverlay" onclick="closeSidebar()"></div>

    {{-- SIDEBAR --}}
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="admin-logo">
            
            <h1 class="hero-title">ADMIN PINK CAFÉ</h1>
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i> Dashboard
            </a>
            <a href="{{ route('admin.comenzi') }}" class="{{ request()->routeIs('admin.comenzi') ? 'active' : '' }}">
                <i class="fas fa-list"></i> Comenzi
            </a>
            <a href="{{ route('admin.produse') }}" class="{{ request()->routeIs('admin.produse') ? 'active' : '' }}">
                <i class="fas fa-utensils"></i> Produse
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Site</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="admin-main">

        {{-- TOPBAR MOBIL --}}
        <div class="admin-topbar">
            <button class="btn-hamburger" onclick="openSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h2>ADMIN PINK CAFÉ</h2>
            <a href="{{ route('home') }}" style="color:#e91e8c; font-size:0.85rem">
                <i class="fas fa-external-link-alt"></i> Site
            </a>
        </div>

        @if(session('success'))
            <div class="admin-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</div>

<script>
function openSidebar() {
    document.getElementById('adminSidebar').classList.add('open');
    document.getElementById('adminOverlay').classList.add('active');
}

function closeSidebar() {
    document.getElementById('adminSidebar').classList.remove('open');
    document.getElementById('adminOverlay').classList.remove('active');
}
</script>

</body>
</html>