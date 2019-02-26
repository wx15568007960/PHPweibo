@extends('layouts.default')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="text-center">
                @include('shared._user_info', ['user' => $user])
            </section>
        </div>
    </div>
@endsection