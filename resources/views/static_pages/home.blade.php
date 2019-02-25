@extends('layouts.default')

@section('title', '首页')

@section('content')
    @guest
        @include('partials._invite_to_join')
    @endguest
    
    <h1>首页</h1>
@endsection