(仮index)
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
<h2>＜投稿記事一覧＞</h2>
  @foreach($posts as $post)
    <a href="http://localhost:8888/public/show?id={{$post->id}}"><h3>{{$post->title}}</h3></a>
  @endforeach
<a href="{{route('post.create')}}">投稿ページ</a>
<a href="{{route('show_mountain')}}">山の詳細ページ</a>
</body>
</html>