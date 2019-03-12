<a href="{{ route('users.show', $user->id) }}" class="text-dark text-center border-right">
    <p class="mb-0 px-3 mx-md-4">
        <strong>{{ $user->status_count }}</strong>
    </p>
    <span class="text-muted small">微博</span>
</a>

<a href="{{ route('users.followings', $user->id) }}" class="text-dark text-center border-right">
    <p class="mb-0 px-3 mx-md-4">
        <strong>{{ count($user->followings) }}</strong>
    </p>
    <span class="text-muted small">关注</span>
</a>

<a href="{{ route('users.followers', $user->id) }}" class="text-dark text-center">
    <p class="mb-0 px-3 mx-md-4">
        <strong>{{ count($user->followers) }}</strong>
    </p>
    <span class="text-muted small">粉丝</span>
</a>