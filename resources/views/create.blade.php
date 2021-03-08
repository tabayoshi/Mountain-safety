<form action="">
@csrf
<!-- <input type="hidden" value="これでユーザーIDを送る> -->
<div>
<label for="title"> タイトル:</label>
<input type="text" name="title">
</div>
<div>
<label for="title"> 記事:</label>
<textarea name="text" cols="30" rows="10"></textarea>
</div>
<div>
<label for="climbing_time"> 下山時間を登録:</label>
<input type="datetime-local" name="climbing_time">
</div>
<div>
<label for="climbing_time"> 登山日を登録:</label>
<input type="date" name="downhill_time">
</div>
<div>
<label for="mountain_select">山登録:</label>
<select name="mountain_select">
<option value="">選択してください</option>
</select>
</div>
<input type="submit" value="登録">
</form>
