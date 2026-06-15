<nav class="navbar" id="navbar">
    {{-- TOPBAR INFO --}}
    <div class="navbar-topbar" id="navbarTopbar">
        <div class="navbar-topbar-container">
            <div class="navbar-topbar-info">
                <span><i class="fa-solid fa-phone"></i> 0790 43 047</span>
                <span><i class="fa-solid fa-clock"></i> Luni - Duminică: 07:00 - 22:00</span>
            </div>
            <div class="navbar-topbar-social">
                <a href="https://instagram.com/pink_cafe_cahul" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://tiktok.com/@pink_cafe_cahul" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </div>

    <div class="navbar-container">
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="navbar-brand">
            <div class="navbar-logo-icon">
                <img src="{{ asset('images/pc-logo.png') }}" alt="Pink Café">
            </div>
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
                        <button type="button" class="navbar-user-info" id="userDropdownBtn" onclick="toggleUserDropdown()">
                            <div class="navbar-avatar">
                                <i class="fa-solid fa-gear"></i>
                            </div>
                            <span class="navbar-username">Admin</span>
                            <i class="fa-solid fa-chevron-down navbar-dropdown-arrow"></i>
                        </button>

                        <div class="navbar-dropdown-menu" id="userDropdownMenu">
                            <a href="{{ route('admin.dashboard') }}" class="navbar-dropdown-item">
                                <i class="fa-solid fa-gauge"></i> Panou control
                            </a>
                            <div class="navbar-dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="navbar-logout-form">
                                @csrf
                                <button type="submit" class="navbar-dropdown-item logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                                </button>
                            </form>
                        </div>
                    @else
                        <button type="button" class="navbar-user-info" id="userDropdownBtn" onclick="toggleUserDropdown()">
                            <div class="navbar-avatar">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <span class="navbar-username">{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-chevron-down navbar-dropdown-arrow"></i>
                        </button>

                        <div class="navbar-dropdown-menu" id="userDropdownMenu">
                            <a href="{{ route('cont.comenzi') }}#panou" class="navbar-dropdown-item">
                                <i class="fa-solid fa-gauge"></i> Panou Control
                            </a>
                            <a href="{{ route('cont.comenzi') }}#comenzi" class="navbar-dropdown-item">
                                <i class="fa-solid fa-bag-shopping"></i> Comenzi
                            </a>
                            <a href="{{ route('cont.comenzi') }}#favorite" class="navbar-dropdown-item">
                                <i class="fa-solid fa-heart"></i> Favorite
                            </a>
                            <div class="navbar-dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="navbar-logout-form">
                                @csrf
                                <button type="submit" class="navbar-dropdown-item logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                                </button>
                            </form>
                        </div>
                    @endif
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

function toggleUserDropdown() {
    const menu = document.getElementById('userDropdownMenu');
    const btn = document.getElementById('userDropdownBtn');
    menu.classList.toggle('open');
    btn.classList.toggle('open');
}

function closeUserDropdown() {
    const menu = document.getElementById('userDropdownMenu');
    const btn = document.getElementById('userDropdownBtn');
    if (menu) menu.classList.remove('open');
    if (btn) btn.classList.remove('open');
}

// Close mobile menu and user dropdown on click outside
document.addEventListener('click', function(e) {
    const nav = document.getElementById('navbar');
    const menu = document.getElementById('mobileMenu');
    if (nav && !nav.contains(e.target) && menu && menu.classList.contains('open')) {
        closeMobileMenu();
    }

    const dropdownBtn = document.getElementById('userDropdownBtn');
    const dropdownMenu = document.getElementById('userDropdownMenu');
    if (dropdownMenu && dropdownBtn && !dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
        closeUserDropdown();
    }
});

// Ascunde/arata topbar-ul de informatii la scroll
(function() {
    const topbar = document.getElementById('navbarTopbar');
    if (!topbar) return;

    let lastScroll = window.scrollY;
    const threshold = 10;

    window.addEventListener('scroll', function() {
        const currentScroll = window.scrollY;

        if (currentScroll <= 0) {
            topbar.classList.remove('collapsed');
        } else if (currentScroll > lastScroll && currentScroll > threshold) {
            // scroll down
            topbar.classList.add('collapsed');
        } else if (currentScroll < lastScroll) {
            // scroll up
            topbar.classList.remove('collapsed');
        }

        lastScroll = currentScroll;
    }, { passive: true });
})();
</script>