<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/post.css') }}">
    <title>投稿ページ</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    <!-- ログイン機能 -->
    @include('header')
        <main class="py-4">
            @yield('content')
            <div class="card">
          <div class="card-header">
                <p>登録画面</p>
            </div>
            <div class="card-body">     
              <form action="{{ route('post.store') }}" method="POST" autocomplete="off">
              @csrf 
                <input type="hidden" value="{{ $user_id }}" name="user_id">
                <p>タイトル</p>
                <div class="cp_iptxt">
                  <input type="text" name="title" class="ef" class="form-control">
                  <span class="focus_bg"></span>
                </div>
                @if($errors->has("title")) 
                <span class="error">{{ $errors->first("title") }}</span>
                @endif
                <p>記事</p>
                <div class="cp_iptxt">
                  <textarea name="article" cols="30" rows="10" class="efs"></textarea>
                  <span class="focus_bg"></span>
                </div>
                @if($errors->has("article")) 
                <span class="error">{{ $errors->first("article") }}</span>
                @endif
                <p>下山時間</p>
                <div class="cp_iptxt">
                  <input type="datetime-local" name="climbing_time" class="efa">
                  <span class="focus_bg"></span>
                </div>
                @if($errors->has("climbing_time")) 
                <span class="error">
                {{ $errors->first("climbing_time") }}
                </span>
                @endif
                <p>登山日</p>
                <div class="cp_iptxt">
                  <input type="date" name="downhill_time" class="efa">
                  <span class="focus_bg"></span>
                </div>
                @if($errors->has("downhill_time")) 
                <span class="error">{{ $errors->first("downhill_time") }}</span>
                @endif
                <p>登山する山を選択</p>
                <div class="cp_iptxt">
                  <select class="efa" name="mountain_id">
                    <option value="0">選択してください</option>
                    @foreach($mountain_select as $mountain_selects)
                    <option value="{{ $mountain_selects->id }}">{{ $mountain_selects->mountain_name }}</option>
                    @endforeach
                  </select>
                  <span class="focus_bg"></span>
                </div>
                @if($errors->has("mountain_id")) 
                <span class="error">
                {{ $errors->first("mountain_id") }}
                </span>
                @endif
                <input type="hidden" value="1" name="alert_flag">
                <div class="submit">
                  <input type="submit" value="登録" class="submit_button">
                </div>
              </form>
            </div>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        </main>
    </div>


  </body>
</html>