@extends('layouts.default')

@section('title', '更新个人资料')

@section('content')
    <div class="offset-md-2 col-md-8 front-bg py-3">
        <h4 class="border-bottom border-light py-2 mb-3">更新个人资料</h4>
        @include('shared._form_errors')

        <div class="text-center mb-3">
            <a href="http://gravatar.com/emails" target="_blank" title="前往 gravatar 更换头像">
                <img src="{{ $user->avatar() }}" alt="{{ $user->name }}">
            </a>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">名称：</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">邮箱：</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
                <label for="password">密码：</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="form-group">
                <label for="password_confirmation">确认密码：</label>
                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">确认更新</button>
            </div>
        </form>
    </div>
@endsection