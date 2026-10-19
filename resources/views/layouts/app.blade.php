<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'RuangKarya | Marketplace Kerajinan')</title>

    <!-- Bootstrap lokal -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">

    @stack('styles')
</head>
<body>

    @yield('navbar')

    <main>
        @yield('content')
    </main>

    @yield('footer')

    <!-- Bootstrap JS lokal -->
    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
