<nav class="navbar navbar-expand-md navbar-dark bg-info mb-3 shadow-sm">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
            @include('layouts._logo')
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">广场</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">人脉</a>
                </li>
            </ul>
            @if (Auth::check())
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdown-user-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="flase">
                        <img class="rounded" src="{{ Auth::user()->avatar() }}" alt="" width="32px">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-user-info">
                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">编辑资料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logout" href="#">
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-block" type="submit">退出</button>
                            </form>
                        </a>
                    </div>
                </div>
            @else
                <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('login') }}">登 陆</a>
                <a class="btn btn-sm btn-outline-light" href="{{ route('signup') }}">注 册</a>
            @endif
        </div>
    </div>
</nav>