<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="stylesheet" href="{{ asset('/index.css') }}">
  <title>一覧ページ</title>
</head>
<body>
<!-- ログイン機能 -->
<div id="app">
    @include('header')
        <main class="py-4">
         <div class="top">
            @if (session('flash_message')) 
             <div class="flash_message">
                <p class="message alert alert-success">{{ session('flash_message') }} </p>
             </div>
            @endif
            @yield('content')
            <h1>登録一覧</h1>
            <h3>みんなで登山ライフをエンジョイしよう</h3>
            <div class="post">
             @foreach($posts as $post)
             <a href="{{ route('show',$post->id) }}}}"><h3>{{$post->title}}：{{$post->created_at}}</h3></a>
             @endforeach
            </div>
            {{ $posts->appends(request()->input())->links() }}
         </div>
         <hr>
         <div class="photo">
          <h3 class="edge_search">行きたい山を探そう</h3>
           <form action="{{ route('search') }}" method="GET" class="search_container">
            @csrf
            <input type="text" name="search" placeholder="山名検索" size="25">
            <button type="submit"><i class="fas fa-search"></i></button>
           </form>
         </div>
         <div class="bottom">
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
                <h1 class="mt_all">山名一覧</h1>
                    @foreach($mountains as $mountain)
                        <div class="mt_details">
                         <a href="{{ route('show_mountain',$mountain->id) }}">{{ $mountain->mountain_name }}</a>
                        </div>
                    @endforeach
                {{ $mountains->appends(request()->input())->links() }}
                @endempty
        </div>
    </main>
</div>
</body>
</html>