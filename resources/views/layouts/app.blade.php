<!-- ベースレイアウト -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header')</title>
  </head>
  <body>

    @foreach($posts as $post)
      {{$post->user->name}}
    @endforeach
    <!-- ------------------------------------ -->

    <header>
      <h1>@yield('header')</h3>
    </header>

    <section class="post">
      @yield('post')
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
    <h2>今登ってる人</h2>
      @yield('now')
    </section>

    <section class="past">
    <h2>過去に登った人</h2>
      @yield('past')
    </section>
    <hr>

    </section>
    <a href="http://localhost:8888/public/">戻る</a>
    
   
  </body>
</html>
