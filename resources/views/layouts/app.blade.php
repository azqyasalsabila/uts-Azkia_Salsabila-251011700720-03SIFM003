<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'RuangKarya | Marketplace Kerajinan')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>

    @yield('navbar')

    <main>
        @yield('content')
    </main>

    @yield('footer')

    @stack('scripts')
</body>
</html>
