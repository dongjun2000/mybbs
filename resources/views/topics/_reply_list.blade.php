<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <li class="d-flex" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a href="{{ route('users.show', [$reply->user_id]) }}">
          <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" class="media-object img-thumbnail mr-3" style="width:48px;height:48px;">
        </a>
      </div>

      <div class="flex-grow-1 ms-2">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}" class="text-decoration-none">{{ $reply->user->name }}</a>

          <span class="text-secondary"> • </span>

          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

          @can('destroy', $reply)
          <span class="meta float-end">
            <form action="{{ route('replies.destroy', $reply->id) }}" method="post" onsubmit="return confirm('确定要删除此评论？');">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                <i class="far fa-trash-alt"></i>
              </button>
            </form>
          </span>
          @endcan
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>

    @if (! $loop->last)
      <hr>
    @endif
  @endforeach
</ul>
