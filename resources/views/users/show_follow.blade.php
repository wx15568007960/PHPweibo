@extends('users._show_layout')

@section('title', $title)

@section('show-content')
    @forelse ($users as $follow)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
            <div class="card border-0 shadow-sm front-bg">
                <div class="card-body text-center">
                    @include('shared._user_info', ['user' => $follow, 'width' => 78])

                    @can('destroy', $follow)
                        <form action="{{ route('users.destroy', $follow->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger" type="submit">删 除</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    @empty
        <div class="col-sm-12 mt-3">
            <p class="text-center">什么都没有！</p>
        </div>
    @endforelse

    @auth
        <div class="col-sm-12 mt-4 d-flex justify-content-center">
            {!! $users->onEachSide(1)->render() !!}
        </div>
    @endauth
@endsection