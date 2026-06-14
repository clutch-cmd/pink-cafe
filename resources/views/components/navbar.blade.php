<nav class="navbar" id="navbar">
    <div class="navbar-container">
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="navbar-brand">
            <div class="navbar-logo-icon">
                <i class="fa-solid fa-mug-hot" style="color: rgb(255, 255, 255);"></i>
            </div>
            <span class="navbar-title">PINK CAFÉ</span>
        </a>

        {{-- DESKTOP NAV LINKS (mijloc) --}}
        <div class="navbar-links" id="navbarLinks">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('meniu') }}" class="nav-link {{ request()->routeIs('meniu') ? 'active' : '' }}">Meniu</a>
            <a href="{{ route('find-us') }}" class="nav-link {{ request()->routeIs('find-us') ? 'active' : '' }}">Find Us & Contacte</a>
        </div>

        {{-- USER / LOGIN (dreapta) --}}
        <div class="navbar-auth">
            @auth
                <div class="navbar-user">
                    @if(Auth::user()->rol === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="navbar-user-info">
                            <div class="navbar-avatar">
                                <i class="fa-solid fa-gear"></i>
                            </div>
                            <span class="navbar-username">Admin</span>
                        </a>
                    @else
                        <a href="{{ route('cont.comenzi') }}" class="navbar-user-info">
                            <div class="navbar-avatar">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <span class="navbar-username">{{ Auth::user()->name }}</span>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="navbar-logout-form">
                        @csrf
                        <button type="submit" class="navbar-logout-btn" title="Deconectare">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="login-btn">
                    <div class="login-icon-wrapper">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>Logare</span>
                </a>
            @endauth
        </div>

        {{-- HAMBURGER MOBILE --}}
        <button class="navbar-hamburger" id="hamburgerBtn" onclick="toggleMobileMenu()">
            <i class="fa-solid fa-bars" id="hamburgerIcon"></i>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}" onclick="closeMobileMenu()">Home</a>
        <a href="{{ route('meniu') }}" class="mobile-link {{ request()->routeIs('meniu') ? 'active' : '' }}" onclick="closeMobileMenu()">Meniu</a>
        <a href="{{ route('find-us') }}" class="mobile-link {{ request()->routeIs('find-us') ? 'active' : '' }}" onclick="closeMobileMenu()">Find Us & Contacte</a>

        <div class="mobile-auth">
            @auth
                @if(Auth::user()->rol === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="mobile-link" onclick="closeMobileMenu()">
                        <i class="fa-solid fa-gear"></i> Admin
                    </a>
                @else
                    <a href="{{ route('cont.comenzi') }}" class="mobile-link" onclick="closeMobileMenu()">
                        <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="login-btn mobile-login-btn" onclick="closeMobileMenu()">
                    <div class="login-icon-wrapper">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>Logare</span>
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const icon = document.getElementById('hamburgerIcon');
    menu.classList.toggle('open');
    if (menu.classList.contains('open')) {
        icon.className = 'fa-solid fa-xmark';
    } else {
        icon.className = 'fa-solid fa-bars';
    }
}

function closeMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const icon = document.getElementById('hamburgerIcon');
    menu.classList.remove('open');
    icon.className = 'fa-solid fa-bars';
}

// Close mobile menu on click outside
document.addEventListener('click', function(e) {
    const nav = document.getElementById('navbar');
    const menu = document.getElementById('mobileMenu');
    if (nav && !nav.contains(e.target) && menu && menu.classList.contains('open')) {
        closeMobileMenu();
    }
});
</script>