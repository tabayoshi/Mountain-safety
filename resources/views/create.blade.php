<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/post.css') }}">
    <title>投稿ページ</title>
</head>
<body>
    
    <form action="{{ route('post.store') }}" method="POST" autocomplete="off">
    @csrf
    <!-- <input type="hidden" value="これでユーザーIDを送る> -->
    <p>タイトル:</p>
    <div class="cp_iptxt">
        <input type="text" name="title" class="ef">
        <label>タイトル</label>
    <span class="focus_bg"></span>
    </div>
    @if($errors->has("title")) 
       <span class="error">{{ $errors->first("title") }}</span> 
     @endif 
    <p>記事:</p>
    <div class="cp_iptxt">
        <textarea name="article" cols="30" rows="10" class="efs"></textarea>
        <label>記事</label>
    <span class="focus_bg"></span>
    </div>
    @if($errors->has("article"))
    <span class="error">{{ $errors->first("article") }}</span>
    @endif
<p>下山時間</p>
    <div class="cp_iptxt">
        <input type="datetime-local" name="climbing_time" class="efa">
        <label>下山時間</label>
    <span class="focus_bg"></span>
    </div>
    @if($errors->has("climbing_time"))
    <span class="error">{{ $errors->first("climbing_time") }}</span>
    @endif
    <p>登山日:</p>
    <div class="cp_iptxt">
        <input type="date" name="downhill_time" class="efa">
        <label>登山日</label>
    <span class="focus_bg"></span>
    </div>
    @if($errors->has("downhill_time"))
    <span class="error">{{ $errors->first("downhill_time") }}</span>
    @endif 
    <p>登山する山を選択:</p>
    <div class="cp_iptxt">
        <select  class="efa" name="mountain_id">
            <option value="">選択してください</option>
            @foreach($mountain_select as $mountain_selects)
            <option value="{{ $mountain_selects->id }}">{{ $mountain_selects->mountain_name }}</option>
            @endforeach
        </select>
    <span class="focus_bg"></span>
    </div>
    @if($errors->has("mountain_select"))
    <span class="error">{{ $errors->first("mountain_select") }}</span>
    @endif 
    <input type="hidden" value="1" name="alert_flag">
    <div class="submit">
    <input type="submit" value="登録" class="submit_button">
    </div>
    </form>
</body>
</html>
