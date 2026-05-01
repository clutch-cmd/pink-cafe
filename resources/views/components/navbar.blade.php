<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('images/pinkcafe_logo.jpg') }}" alt="Pink Cafe Logo" class="navbar-logo">
        <span class="navbar-title">Pink Cafe</span>
    </div>

    <button class="navbar-toggle" id="navbarToggle">&#9776;</button>

    <ul class="navbar-links" id="navbarLinks">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('meniu') }}" class="{{ request()->routeIs('meniu') ? 'active' : '' }}">Meniu</a></li>
        <li><a href="{{ route('contacte') }}" class="{{ request()->routeIs('contacte') ? 'active' : '' }}">Contacte</a></li>
        <li><a href="{{ route('find-us') }}" class="{{ request()->routeIs('find-us') ? 'active' : '' }}">Find Us</a></li>
    </ul>
</nav>