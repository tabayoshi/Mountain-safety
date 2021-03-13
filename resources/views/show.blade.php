@extends('layouts.app')

@section('header')
  @foreach($posts as $post)
    投稿の詳細画面：ユーザー{{$post->user_id}}
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
        <li><p>{{$comment->comment}}：ユーザー{{$comment->user_id}}</p></li>           
      @endforeach
    </ul>
  </div>
  <hr>
@endsection

@section('now')
  <div style="color:orange">
    <!-- 今登ってる人 --> <!-- 日付で判断する-->
    @foreach($posts as $time) 
      @if(!$cb->eq($time))
        <p>今登ってる人はいません</p>         
      @else
        <p>ユーザー{{$time->user_id}}</p>         
      @endif
     @endforeach
  </div>
@endsection

@section('past')
  <div style="color:orange">
    <!-- 過去に登った人 --> <!-- 日付で判断する-->
    @foreach($posts as $time) 
      @if(!$cb->gt($time))
        <p>ユーザー{{$post->id}}</p>         
      @else
        <p>まだ誰も登っていません</p>         
      @endif
     @endforeach
  </div>
@endsection

@section('alert')
   <!-- <p>今：{{$cb->format('Y/m/d H:i')}}</p> -->
   <p>下山時間：{{$post->downhill_time}}</p>

    <button>下山ボタン</button>
    @if($down->gte($post->downhill_time))
      <p>下山アラート：下山ボタンが押されていません。下山ボタンを押してください</p>
    @elseif($distress->gte($post->downhill_time))
      <p>遭難アラート：遭難の可能性があります</p>
    @endif
@endsection

</body>
</html>
