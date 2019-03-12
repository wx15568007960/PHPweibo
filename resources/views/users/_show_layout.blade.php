@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="text-center">
                @include('shared._user_info', ['user' => $user, 'width' => 100])
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            @include('shared._stats', ['user' => $user])
        </div>
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        @yield('show-content')
    </div>
@endsection