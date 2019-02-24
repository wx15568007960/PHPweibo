<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '') @yield('title-gap', '-') {{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item"><a href="/help" class="nav-link">帮助</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">关于</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @guest
            @include('partials._invite_to_join')
        @endguest
        @yield('content')
    </div>
</body>
</html>