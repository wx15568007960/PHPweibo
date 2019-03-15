<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '') @yield('title-gap', '-') {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="d-flex flex-column h-100">
    @include('layouts._header')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('shared._messages')
            </div>
        </div>
    </div>

    @yield('top-content')
    
    <div class="container mb-5">
        @yield('content')
    </div>

    @include('layouts._footer')

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>