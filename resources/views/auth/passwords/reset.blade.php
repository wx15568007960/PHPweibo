@extends('layouts.default')

@section('title', '重置密码')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">重置密码</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('password.update') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email" class="form-control-label">邮箱：</label>

                        <input type="email" name="email" id="email" class="form-control{{ $errors->has('email' ? ' is-invalid' : '') }}" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="form-text" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-control-label">密码：</label>

                        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password' ? ' is-invalid' : '') }}" value="{{ old('password') }}">

                        @if ($errors->has('password'))
                            <span class="form-text" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-control-label">确认密码：</label>

                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control{{ $errors->has('password_confirmation' ? ' is-invalid' : '') }}" value="{{ old('password_confirmation') }}">

                        @if ($errors->has('password_confirmation'))
                            <span class="form-text" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button type="submit" class="btn btn-primary">重置密码</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection