<nav class="navbar navbar-expand-md navbar-dark bg-info mb-3">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
            @include('layouts._logo')
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-main" aria-controls="navbar-main" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">首页</a>
                </li>
            </ul>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item"><a href="/login" class="nav-link">登 陆</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">注 册</a></li>
            </ul>
        </div>
    </div>
</nav>