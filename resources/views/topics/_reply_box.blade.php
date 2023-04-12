@include('shared._errors')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="post" accept-charset="UTF-8">
    @csrf

    <input type="hidden" name="topic_id" value={{ $topic->id }}>
    <div class="mb-3">
      <textarea name="content" id="content" rows="3" placeholder="分享你的见解~" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary btn-sm " type="submit">
      <i class="fa fa-share mr-1"></i>  回复
    </button>
  </form>
</div>

<hr>
