@extends('layouts.app')

@section('header')
  @foreach($posts as $post)
    投稿の詳細：{{ $post->user->name }}
  @endforeach
@endsection

@section('post')
<section>
  <div style="color:red">
    <!-- 投稿内容表示 -->
    @foreach($posts as $post)
      <!-- <p>タイトル</p> -->
      <h3 >{{$post->id}}{{$post->title}}</h3>
      <!-- <p>投稿内容</p> -->
      <p>{{$post->article}}：{{$post->created_at->format('Y/m/d H:i')}}</p>
    @endforeach
  </div>
  </section>
@endsection

@section('store')
  <form method="post" action="{{ route('store') }}">
   <input type='hidden' name='id' value='{{ $post->id }}'>
      {{ csrf_field() }} 
          <textarea name="comment" cols="30" rows="5" value=""></textarea>
      <input type="submit" name="submit" value="投稿">
  </form>
@endsection

@section('comment')
  <div style="color:blue">
    <ul>
      @foreach($comments as $comment)
        <li><p>{{$comment->comment}}：{{ $comment->user->name }}</p></li>           
      @endforeach
    </ul>
  </div>
  <hr>
@endsection

@section('now')
  <div style="color:orange">
    @if($today->eq($person))
      @foreach($people as $person)
        {{$person->user->name}}
      @endforeach
      <!-- <p>今登ってる人はいません</p> -->
    @else
      <p>今登ってる人はいません</p>
    @endif
  </div>
@endsection

    <!-- 今登ってる人 --> <!-- 日付で判断する--> <!-- 下山日付と同じ日付 -->       

@section('past')
  <div style="color:orange">
    @if(!$today->gt($person))
  @foreach($people as $person)
      {{$person->user->name}}
  @endforeach
    @else
      <p>まだ誰も登っていません</p>         
    @endif
    <!-- 過去に登った人 --> <!-- 日付で判断する-->  <!-- 下山日付よりも大きい日付 -->
    <!-- @foreach($posts as $time) 
        <p>{{ $post->user->name }}(ユーザー{{$post->user_id}})</p>         
     @endforeach -->
  </div>
@endsection

@section('alert')
    <p>今：{{$today->format('Y/m/d H:i')}}</p>
    <p>下山時間：{{$person->downhill_time}}</p>
    @if($distress->gte($person->downhill_time))
      <h1 class="alert">遭難アラート：遭難の可能性があります</h1>
    @elseif(!$down->gte($person->downhill_time))
      <h1 class="alert">下山アラート：下山ボタンが押されていません。下山ボタンを押してください</h1>
    @endif
@endsection