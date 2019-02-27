@extends('layouts.default')

@section('title', '登陆')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">登陆</h5>
            </div>
            <div class="card-body">
                @include('shared._form_errors')
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">记住我</label>
                    </div>

                    <button  class="btn btn-success btn-block" type="submit">登 陆</button>
                </form>

                <hr>

                <p class="text-right mb-0">还没有账号？<a href="{{ route('signup') }}">立即注册</a></p>
            </div>
        </div>
    </div>
@endsection