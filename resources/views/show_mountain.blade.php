<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>山の詳細ページ</title>
</head>
<body>
山の詳細ページ
<h1>{{$mt->mountain_name}}</h1>
<p>所在する県</p>
<p>{{$prefecture->prefecture_name}}</p>
<p>標高</p>
<p>{{$mt->elevation}}m</p>
<a href="{{ route('index') }}">一覧ページに戻る</a>
</body>
</html>