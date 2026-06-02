<nav class="navbar">
    {{-- LOGO clickabil spre Home --}}
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ asset('images/pinkcafe_logo.jpg') }}" alt="Pink Cafe Logo" class="navbar-logo">
        <span class="navbar-title">PINK CAFÉ</span>
    </a>

    <button class="navbar-toggle" id="navbarToggle">&#9776;</button>

    <ul class="navbar-links" id="navbarLinks">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('meniu') }}" class="{{ request()->routeIs('meniu') ? 'active' : '' }}">Meniu</a></li>
        <li><a href="{{ route('find-us') }}" class="{{ request()->routeIs('find-us') ? 'active' : '' }}">Find Us & Contacte</a></li>

        @auth
            @if(Auth::user()->rol === 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}" style="color:#e91e8c; font-weight:600">
                        <i class="fa-solid fa-gears"></i> Admin
                    </a>
                </li>
            @else
                <li>
                    <a href="#" style="color:#e91e8c; font-weight:600">
                        <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
                    </a>
                </li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="navbar-logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                    <i class="fa-solid fa-right-to-bracket"></i> Login
                </a>
            </li>
        @endauth
    </ul>
</nav>