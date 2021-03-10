@extends('layouts.app')

@section('header')
  @foreach($posts as $post)
    投稿の詳細画面：{{$post->user_id}}
  @endforeach
@endsection

@section('post')
<section>
  <div style="color:red">
    <!-- 投稿内容表示 -->
    @foreach($posts as $post)
      <!-- <p>タイトル</p> -->
      <h3 >{{$post->title}}</h3>
      <!-- <p>投稿内容</p> -->
      <p>{{$post->article}}：{{$post->created_at->format('Y/m/d H:i')}}</p>
    @endforeach
  </div>
  </section>
@endsection

@section('store')
  <form method="post" action="">
      {{ csrf_field() }} 
          <textarea name="comment" cols="30" rows="5" value=""></textarea>
      <input type="submit" name="submit" value="投稿">
  </form>
@endsection

@section('comment')
  <div style="color:blue">
  <ul>
    @foreach($comments as $comment)
      <li><p>{{$comment->comment}}</p></li>           
     @endforeach
  </ul>
  </div>
  <hr>
@endsection

@section('now')
  <div style="color:orange">
    <p>今登ってる人</p>
  </div>
@endsection

@section('past')
  <div style="color:orange">
    <p>過去に登った人</p>
  </div>
@endsection

@section('alert')
   <p>今：{{$cb->format('Y/m/d H:i')}}</p>
   <p>下山時間：{{$post->downhill_time}}</p>
    <button>下山ボタン</button>
    @if($cb->gte($post->downhill_time))
     <p>下山ボタンを押してください</p>
    @endif
@endsection


</body>
</html>
