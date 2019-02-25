<div class="jumbotron bg-white shadow-sm">
    <h1>Hello，There You Are !</h1>
    <p class="lead">
        翻迎来到 <a href=""><span class="h2">{{ config('app.name') }}</span></a> !
    </p>
    <p>这是一个友好的社区。</p>
    <p>
        期待你的加入 ！
    </p>
    <a class="btn btn-success rounded-pill mr-2" href="{{ route('signup') }}">立即加入</a>
    <a class="btn btn-light rounded-pill" href="{{ route('about') }}">了解更多</a>
</div>