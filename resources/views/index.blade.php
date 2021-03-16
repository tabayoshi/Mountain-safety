<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>一覧ページ</title>
  </head>
  <body>
   @if (session('flash_message')) 
    <div class="flash_message">
     {{ session('flash_message') }} 
    </div>
   @endif
    <a href="{{route('post.create')}}">投稿ページ</a>
    <h2>投稿記事一覧</h2>
    @foreach($posts as $post)
    <a href="{{route('show',$post->id)}}">
      <h3>{{$post->title}}：{{$post->created_at}}</h3>
    </a>
    @endforeach 
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
    <!-- 入力が未記入の場合は、検索しても非表示   -->
    @if($search !== 0)
    @foreach($search as $searchs)
    <div>
      <a href="{{ route('show_mountain',$searchs->id) }}">{{ $searchs->mountain_name }}</a>
    </div>
    @endforeach
    @endif
      <a href="{{ route('index') }}">一覧ページに戻る</a>
    @endisset

    <!-- 検索されなかったときは、一覧を表示 -->
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