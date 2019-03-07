<div class="card border-0 shadow-sm w-100">
    <div class="card-body">
        <div class="">
            <a href="{{ route('users.show', $status->user) }}">
                <img class="rounded-circle border" width="36px" src="{{ $status->user->avatar() }}" alt="{{ $status->user->name }}">
            </a>
            <a class="text-dark ml-2" href="{{ route('users.show', $status->user) }}">
                <strong>{{ $status->user->name }}</strong>
            </a>
            <span class="small text-muted ml-3">{{ $status->created_at->diffForHumans() }}</span>
        </div>
        <p class="card-text mt-3">
            {{ $status->content }}
        </p>

        @can('destroy', $status)
            <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('确定要删除本条微博吗？');">
                {{ csrf_field() }}

                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-light py-0 px-2 float-right" title="删除">🗑</button>
            </form>
        @endcan
    </div>
</div>