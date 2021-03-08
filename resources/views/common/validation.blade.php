<!-- <p style="color:green">バリデーション</p> -->
@if ($errors->any())
  <div>
      @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
      @endforeach
  </div>
@endif