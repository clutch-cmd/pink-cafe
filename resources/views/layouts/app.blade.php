<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Cafe - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    
    @yield('styles')
</head>

<body class="{{ request()->routeIs('home') ? 'home-page' : '' }}">
    
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @yield('scripts')
    <script>
    const toggle = document.getElementById('navbarToggle');
    const links = document.getElementById('navbarLinks');
    toggle.addEventListener('click', () => {
        links.classList.toggle('open');
    });
</script>
</body>
</html>