<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ route('home') }}/favicon.ico">

    <title>@yield('title')</title>

    @stack('links')
    @stack('endHead')
</head>

<body>
@yield('content')

@stack('scripts')
</body>
</html>
