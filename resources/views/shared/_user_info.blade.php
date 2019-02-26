<a href="{{ route('users.show', $user->id) }}">
    <img class="rounded-sm" src="{{ $user->avatar() }}" alt="{{ $user->name }}">
</a>
<h5 class="mt-1">{{ $user->name }}</h5>
