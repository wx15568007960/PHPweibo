@extends('users._show_layout')

@section('title', $user->name)

@section('show-content')
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
                <div class="col-sm-12 mt-4 d-flex justify-content-center">
                    {!! $statuses->onEachSide(1)->render() !!}
                </div>
            @endauth
        </div>
    </div>
@endsection