<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        @auth
        <div class="text-end"><form action="/logout" method="post">@csrf<button type="submit" class="btn btn-danger">ログアウト</button></form></div>
        @else
        <div class="text-end"><a href="/login" class="btn btn-primary">ログイン</a></div>
        @endauth
    @yield('content')
    </div>
</body>
</html>