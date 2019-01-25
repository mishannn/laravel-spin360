<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ route('home') }}/favicon.ico">

    <title>@yield('title')</title>

    <link href="{{ route('home') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ route('home') }}/css/style.css" rel="stylesheet">
    @stack('links')
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-items"
                aria-controls="navbar-items" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-items">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Список изображений</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.upload') }}">Загрузить</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<main role="main" class="container">
    @yield('content')
</main>

<script src="{{ route('home') }}/js/jquery.min.js"></script>
<script src="{{ route('home') }}/js/popper.min.js"></script>
<script src="{{ route('home') }}/js/bootstrap.min.js"></script>
@stack('scripts')
</body>
</html>
