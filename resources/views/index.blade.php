<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>一覧ページ</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

<!-- ログイン機能 -->
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
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<a href="{{route('post.create')}}">投稿ページ</a>
<h2>投稿記事一覧</h2>
  @foreach($posts as $post)
    <a href="http://localhost:8888/public/show?id={{$post->id}}"><h3>{{$post->title}}：{{$post->created_at}}</h3></a>
  @endforeach
  @if (session('flash_message')) 
    <div class="flash_message">
     {{ session('flash_message') }} 
    </div>
   @endif
  <h2>山の情報一覧</h2>
    <p>山検索フォーム</p>
    <form action="{{ route('search') }}" method="POST">
    @csrf
    <input type="text" name="search" placeholder="山名">
    <input type="submit" value="検索"></input>
    </form>
    <!-- 検索結果（検索された時だけ表示） -->
    @isset($search_result)
    <h2>{{ $search_result }}</h2>
    <!-- 検索フォームで、入力が未記入の場合は検索しても非表示   -->
    @if($search !== 0)
    @foreach($search as $searchs)
    <div>
      <a href="{{ route('show_mountain',$searchs->id) }}">{{ $searchs->mountain_name }}</a>
    </div>
    @endforeach
    @endif
      <a href="{{ route('index') }}">一覧ページに戻る</a>
    @endisset

    <!-- 検索してないときは、一覧を表示 -->
    @empty($search_result)
    @foreach($mountains as $mountain)
    <div>
      <a href="{{ route('show_mountain',$mountain->id) }}">{{ $mountain->mountain_name }}</a>
    </div>
    @endforeach
    {{ $mountains->links() }}
    @endempty
</body>
</html>