@extends('layouts.default')

@section('title', '编辑 ' . $user->name . ' 的个人资料')

@section('content')
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
        </h4>
      </div>
      <div class="card-body">
        <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @include('shared._errors')

          <div class="mb-3">
            <label for="name">用户名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
          </div>
          <div class="mb-3">
            <label for="email">邮箱</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
          </div>
          <div class="mb-3">
            <label for="introduction">个人简介</label>
            <textarea name="introduction" id="introduction" rows="3" class="form-control">{{ old('introduction', $user->introduction) }}</textarea>
          </div>
          <div class="mb-4">
            <label for="" class="avatar-label form-label">用户头像</label>
            <input type="file" name="avatar" class="form-control" onchange="showPreview(this)">
            @if ($user->avatar)
              <br>
              <img id="avatar-preview" class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200">
            @endif
          </div>
          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop

@section('scripts')
  <script>
    // 上传头像预览
    function showPreview(source) {
      var file = source.files[0];
      if (window.FileReader) {
        var fr = new FileReader();
        var avatar_preview = document.getElementById("avatar-preview");
        fr.onloadend = function (e) {
          avatar_preview.src = e.target.result;
        }
        fr.readAsDataURL(file);
        avatar_preview.style.display = 'block';
      }
    }
  </script>
@stop
