@extends('layouts.default')

@section('title', '首页')

@section('content')
    @guest
        @include('partials._invite_to_join')
    @endguest
    
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
        
                <div class="col-sm-12 mt-3">
                    {!! $statuses->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection