<!-- ベースレイアウト -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @foreach($posts as $post)
            投稿の詳細：{{ $post->user->name }}
        @endforeach
    </title>
    <style>
    .alert {
        font-size: 20px;
        color: #fff;
        background: red;
        display: inline-block;
    }
    
    </style>
  </head>
  <body>
    <header>
      <h1>
      @foreach($posts as $post)
            投稿の詳細：{{ $post->user->name }}
        @endforeach
        </h1>
    </header>

    <section class="post">
      <!-- <p>今：{{$today->format('Y/m/d H:i')}}</p> -->
      <!-- <p>下山時間：{{$person->downhill_time}}</p> -->
      @if($distress->gte($person->downhill_time))
        <h1 class="alert">遭難アラート：遭難の可能性があります</h1>
      @elseif(!$down->gte($person->downhill_time))
        <h1 class="alert">下山アラート：下山ボタンが押されていません。下山ボタンを押してください</h1>
      @endif

      <div style="color:red"> <!-- 投稿内容表示 -->
        @foreach($posts as $post)
          <h3 >{{$post->id}}{{$post->title}}</h3> <!-- <p>タイトル</p> -->
          <p>{{$post->article}}：{{$post->created_at->format('Y/m/d H:i')}}</p> 
        @endforeach
      </div>
      <button>下山ボタン</button>
      <hr>
    </section>

    <section class="comment">
      <h2>コメント</h2>
      @include('common.validation')
      <form method="post" action="{{ route('store') }}">
        <input type='hidden' name='id' value='{{ $post->id }}'>
        {{ csrf_field() }} 
        <textarea name="comment" cols="30" rows="5" value=""></textarea>
        <input type="submit" name="submit" value="投稿">
      </form>
      <div style="color:blue">
        <ul>
          @foreach($comments as $comment)
            <li><p>{{$comment->comment}}：{{ $comment->user->name }}</p></li>           
          @endforeach
        </ul>
      </div>
      <hr>
    </section>

    <section class="now">
      <h3>今登ってる人</h3>
      <div style="color:orange">
          @if($today->eq($person))
        @foreach($people as $person)
            <!-- <p>今登ってる人はいません</p> -->
            {{$person->user->name}}
        @endforeach
          @else
            <p>今登ってる人はいません</p>
          @endif
      </div>
    </section>

    <section class="past">
      <h3>過去に登った人</h3>
      <div style="color:orange">
        @if(!$today->gt($person))
          @foreach($people as $person)
            {{$person->user->name}}
          @endforeach
        @else
          <p>まだ誰も登っていません</p>         
        @endif
      </div>
      <hr>
      <a href="{{ route('index') }}">戻る</a>
    </section>
  </body>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                Mountain_Safety
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
