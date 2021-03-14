<!-- ベースレイアウト -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header')</title>
    <style>
      .alert {
        font-size: 20px;
        color: white;
        border: 1px solid red;
        background: red;
        display: inline-block;
        padding: 0 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>@yield('header')</h3>
      @yield('alert')
    </header>

    <section class="post">
      @yield('post')
        <button>下山ボタン</button>
      <hr>
    </section>

    <section class="comment">
    <h2>コメント</h2>
      @include('common.validation')
      @yield('store')
      @yield('comment')
    </section>

    <section class="now">
    <h3>今登ってる人</h3>
      @yield('now')
    </section>

    <section class="past">
    <h3>過去に登った人</h3>
      @yield('past')
    </section>
    <hr>

    </section>
    <a href="{{ url('/') }}">戻る</a>
    
   
  </body>
</html>
