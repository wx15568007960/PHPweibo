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
    @include('layouts._header')

    @yield('top-content')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('shared._messages')
            </div>
        </div>
        @yield('content')
    </div>

    @include('layouts._footer')

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>