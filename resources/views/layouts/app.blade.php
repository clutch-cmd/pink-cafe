<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Cafe - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

    <script>
        const btn = document.getElementById('navbarToggle');
        const links = document.getElementById('navbarLinks');
        if(btn) {
            btn.addEventListener('click', () => {
                links.classList.toggle('open');
            });
        }
    </script>

    @yield('scripts')
</body>
</html>