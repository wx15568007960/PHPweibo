@extends('layouts.default')

@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="text-center">
                @include('shared._user_info', ['user' => $user, 'width' => 100])
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="offset-md-2 col-md-8 col-sm-12">
            <div class="row">
                @forelse ($statuses as $status)
                    <div class="col-sm-12 mt-3">
                        @include('statuses._status', $status)
                    </div>
                @empty
                    <div class="col-sm-12 mt-3">
                        <p class="text-center">没有微博动态！</p>
                    </div>
                @endforelse
        
                @auth
                    <div class="col-sm-12 mt-4">
                        {!! $statuses->render() !!}
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection