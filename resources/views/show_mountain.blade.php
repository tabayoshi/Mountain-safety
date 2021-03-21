<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <title>山の詳細ページ</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('/show_mountain.css') }}">
  </head>
  <body>
    <!-- ログイン機能 -->
    <div id="app">
      @include('header')
        <main class="py-4">
          <div class="top">
            @yield('content')
              <h1 class="name">{{$mt->mountain_name}}</h1>
              <span>所在県</span>
              <p>{{$prefecture->prefecture_name}}</p>
              <span>標高</span>
              <p>{{$mt->elevation}}m</p>
              <a href="{{ route('index') }}">一覧ページに戻る</a>
          </div>
            </body>
          </html>
        </main>
    </div>
  