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
                    <a class="nav-link" href="/">广场</a>
                </li>
            </ul>
            
            <a class="btn btn-sm btn-outline-warning mr-2" href="/login">登 陆</a>
            <a class="btn btn-sm btn-outline-light" href="/register">注 册</a>
        </div>
    </div>
</nav>