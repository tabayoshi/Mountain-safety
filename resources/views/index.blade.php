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
<a href="{{route('post.create')}}">投稿ページ</a>
<h2>投稿記事一覧</h2>
  @foreach($posts as $post)
    <a href="http://localhost:8888/public/show?id={{$post->id}}"><h3>{{$post->title}}：{{$post->created_at}}</h3></a>
  @endforeach
<h2>山の情報一覧</h2>
@foreach($mountains as $mountain)
<div>
<a href="{{route('show_mountain',$mountain->id)}}">{{$mountain->mountain_name}}</a>
</div>
@endforeach
{{$mountains->withQueryString()->links()}}
</body>
</html>