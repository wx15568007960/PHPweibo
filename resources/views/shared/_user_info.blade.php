
<a href="{{ route('users.show', $user->id) }}">
    <img class="rounded-sm" src="{{ $user->avatar() }}" alt="{{ $user->name }}" width="{{ $width ?? '48' }}px">
</a>
<h5 class="mt-1">{{ $user->name }}</h5>
