@extends('layouts.template')

@section('title') 書評Books｜ユーザーログイン @endsection

@section('content')
<h1>ユーザーログイン</h1>
<form action="" method="post">
    @csrf
    @include('inc.error')
    @include('inc.message')
<table class="table">
        <th>メールアドレス</th>
        <td><input type="text" name="email" id="" class="form-control" value="{{old('email')}}"></td>
    </tr>
    <tr>
        <th>パスワード</th>
        <td><input type="password" name="password" id="" class="form-control"></td>
    </tr>
</table>
<button type="submit" class="btn btn-primary">ログイン</button>
<p class="mt-3"><a class="btn btn-success" href="/signup">新規登録</a></p>
</form>
@endsection