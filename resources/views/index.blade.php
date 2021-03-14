@extends('layouts.app')

@section('content')


<body>
<h2>＜投稿記事一覧＞</h2>
  @foreach($posts as $post)
    <a href="http://localhost:8888/public/show?id={{$post->id}}"><h3>{{$post->title}}：{{$post->created_at}}</h3></a>
  @endforeach
<a href="{{route('post.create')}}">投稿ページ</a>
<h2>山の情報一覧</h2>
@foreach($mountains as $mountain)
<div>
<a href="{{route('show_mountain',$mountain->id)}}">{{$mountain->mountain_name}}</a>
</div>
@endforeach
</body>
</html>
@endsection