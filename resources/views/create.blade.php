<form action="{{ route('post.store') }}" method="POST">
@csrf
<!-- <input type="hidden" value="これでユーザーIDを送る> -->
<div>
<label for="title">タイトル:</label>
<input type="text" name="title">
</div>
<div class="error">
@if($errors->has("title")) 
    {{ $errors->first("title") }} 
 @endif 
</div> 
<div>
<label for="article">記事:</label>
<textarea name="article" cols="30" rows="10"></textarea>
</div>
<div class="error">
@if($errors->has("article"))
    {{ $errors->first("article") }} 
@endif 
</div>
<div>
<label for="climbing_time">下山時間を登録:</label>
<input type="datetime-local" name="climbing_time">
</div>
<div class="error">
@if($errors->has("climbing_time"))
    {{ $errors->first("climbing_time") }} 
@endif
</div> 
<div>
<label for="downhill_time">登山日を登録:</label>
<input type="date" name="downhill_time">
</div>
<div class="error">
@if($errors->has("downhill_time"))
    {{ $errors->first("downhill_time") }} 
@endif 
</div>
<div>
<label for="mountain_select">山登録:</label>
<select name="mountain_select">
<option value="">選択してください</option>
</select>
</div>
<div class="error">
@if($errors->has("mountain_select"))
    {{ $errors->first("mountain_select") }} 
@endif 
</div>
<input type="hidden" value="1" name="alert_flag">
<input type="submit" value="登録">
</form>
