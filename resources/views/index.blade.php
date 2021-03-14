<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
<h2>＜投稿記事一覧＞</h2>
  @foreach($posts as $post)
    <a href="{{route('show',$post->id)}}"><h3>{{$post->title}}：{{$post->created_at}}</h3></a>
  @endforeach
<a href="{{route('post.create')}}">投稿ページ</a>
<h2>山の情報一覧</h2>
@foreach($mountains as $mountain)
<div>
<a href="{{route('show_mountain',$mountain->id)}}">{{$mountain->mountain_name}}</a>
</div>
@endforeach

@extends('layouts.app')
</body>
</html>