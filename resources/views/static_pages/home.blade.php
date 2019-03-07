@extends('layouts.default')

@section('title', '首页')

@section('top-content')
    @guest
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-6 justify-content-center d-flex align-items-center py-4">
                                @include('layouts._logo', ['width' => 100, 'height' => 100])
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-6">
                                @include('partials._invite_to_join')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8 col-sm-12">
            @auth
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        @include('shared._status_form')
                    </div>
                </div>
            @endauth
            <div class="col-sm-12">
                <hr>
            </div>
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
    </div>
@endsection