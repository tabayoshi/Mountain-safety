<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      @foreach($posts as $post)
        投稿の詳細：{{ $post->user->name }}
      @endforeach

    </title>
    <style>
      .alert {
          font-size: 20px;
          color: #fff;
          background: red;
          display: inline-block;
          padding: 0 10px;
      }

      .down {
        font-size: 20px;
          color: #fff;
          background: #00FF00;
          display: inline-block;
          padding: 0 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>
        @foreach($posts as $post)
            投稿の詳細：{{ $post->user->name }}
        @endforeach
        </h1>
    </header>

    <section class="post">
      <!-- <p>今：{{$today->format('Y/m/d H:i')}}</p> -->
      
      @foreach($times as $time)
        @if(($post->alert_flag) === 0)
          <h1 class="down">下山しました</h1>
        @elseif($distress->gte($time->downhill_time))
          <h1 class="alert">遭難アラート：遭難の可能性があります</h1>
        @elseif($down->gte($time->downhill_time))
          <h1 class="alert">下山アラート：下山ボタンが押されていません。下山ボタンを押してください</h1>
        @endif
      @endforeach

      <div> <!-- 投稿内容表示 -->
        @foreach($posts as $post)
          <h3 >{{$post->id}}．{{$post->title}}</h3>
          <p>{{$post->article}}</p> 
          <p>下山時間：{{$post->downhill_time}}</p>
        @endforeach
      </div>
      <form method="post" action="{{ route('update') }}">
      {{ csrf_field() }} 
        <input type="hidden" name="alert_flag" value="0">
        <input type="submit" value="下山ボタン">
      <!-- <button>下山ボタン</button> -->
      </form>
      <hr>
    </section>

    <section class="comment">
      <h2>コメント</h2>
      @include('common.validation')
      <form method="post" action="{{ route('store') }}">
        <input type='hidden' name='id' value='{{ $post->id }}'>
        {{ csrf_field() }} 
        <textarea name="comment" cols="30" rows="5" value=""></textarea>
        <input type="submit" name="submit" value="投稿">
      </form>
      <div>
        <ul>
          @foreach($comments as $comment)
            <li><p>{{$comment->comment}}：{{ $comment->user->name }}</p></li>           
          @endforeach
        </ul>
      </div>
      <hr>
    </section>

    <section class="now">
      <h3>今登ってる人</h3>
      <div>
        @if($today->eq($people))
          @foreach($people->unique("user_id") as $person)
              {{$person->user->name}}
          @endforeach
        @else
          <p>今登ってる人はいません</p>
        @endif
      </div>
    </section>

    <section class="past">
      <h3>過去に登った人</h3>
      <div>
        @if(!$today->gt($people))
          @foreach($people->unique("user_id") as $person)
            {{$person->user->name}}
          @endforeach
        @else
          <p>まだ誰も登っていません</p>         
        @endif
      </div>
      <hr>
      <a href="{{ route('index') }}">戻る</a>
    </section>
  </body>
