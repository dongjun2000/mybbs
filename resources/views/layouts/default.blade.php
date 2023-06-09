<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content={{ csrf_token() }}>

  <title>@yield('title', 'MyBBS') - {{ setting('site_name', '我的地盘，听我说！') }}</title>
  <meta name="description" content="@yield('description', setting('seo_description', 'MyBBS 我们的社区'))">
  <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'MyBBS,分享,有趣,生活'))">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  @yield('styles')
</head>
<body>
  <div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')

    <div class="container">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  @if (app()->isLocal())
    @include('sudosu::user-selector')
  @endif

  <script src="{{ mix('js/app.js') }}"></script>

  @yield('scripts')

</body>
</html>
