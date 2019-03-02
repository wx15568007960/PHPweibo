@extends('layouts.default')

@section('title', '人脉')

@section('content')
    <div class="row">
        <div class="col-sm-12 my-4">
            <h2 class="mb-4 text-center">人脉</h2>
        </div>

        @foreach ($users as $user)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                <div class="card border-0 shadow-sm front-bg">
                    <div class="card-body text-center">
                        @include('shared._user_info', ['user' => $user, 'width' => 78])

                        @can('destroy', $user)
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger" type="submit">删 除</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-sm-12 d-flex justify-content-center mt-3">
            {!! $users->render() !!}
        </div>
    </div>
@endsection
