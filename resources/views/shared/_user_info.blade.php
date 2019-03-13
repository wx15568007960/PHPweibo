
<a href="{{ route('users.show', $user->id) }}">
    <img class="rounded-sm" src="{{ $user->avatar() }}" alt="{{ $user->name }}" width="{{ $width ?? '48' }}px">
</a>
<h5 class="mt-1">{{ $user->name }}</h5>

@if (Auth::check() && Auth::user()->isFollowing($user->id))
    <form action="{{ route('followers.store', $user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-outline-info mt-3">取消关注</button>
    </form>
@elseif (Auth::check() && Auth::user()->id !== $user->id)
    <form action="{{ route('followers.destroy', $user->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm btn-info px-3 mt-3 text-white">关 注</button>
    </form>
@endif
