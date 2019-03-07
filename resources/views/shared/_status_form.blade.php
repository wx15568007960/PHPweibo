<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._form_errors')

    {{ csrf_field() }}

    <textarea class="form-control w-100" placeholder="聊聊新鲜事..." maxlength="200" name="content" id="content" rows="3"></textarea>
    <div class="text-right mt-3">
        <button type="submit" class="btn btn-sm btn-dark">发 布</button>
    </div>
</form>