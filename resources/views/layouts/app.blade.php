<!-- ベースレイアウト -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header')</title>
  </head>
  <body>
    <header>
      <h1>@yield('header')</h3>
    </header>

    <section class="post">
      @yield('post')
      <!-- <button>下山ボタン</button> -->
      @yield('alert')
      <hr>
    </section>

    <section class="comment">
    <h2>コメント</h2>
      @include('common.validation')
      @yield('store')
      @yield('comment')
    </section>

    <section class="now">
      @yield('now')
    </section>

    <section class="past">
      @yield('past')
    </section>
    <hr>

    <section class="alert">
    <!-- <p>下山アラート</p> laravel Carbonを使う -->
    <p>遭難アラート</p>
    </section>
    <a href="http://localhost:8888/public/">戻る</a>
  </body>
</html>
