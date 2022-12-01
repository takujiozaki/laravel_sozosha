@extends('layouts.template')

@section('title') 書評Books｜ユーザー登録 @endsection

@section('content')
<h1>新規ユーザー登録</h1>
<form action="" method="post">
    @csrf
    @include('inc.error')
<table class="table">
    <tr>
        <th>氏名</th>
        <td><input type="text" name="name" id="" class="form-control" value="{{old('name')}}"></td>
    </tr>
        <th>メールアドレス</th>
        <td><input type="text" name="email" id="" class="form-control" value="{{old('email')}}"></td>
    </tr>
    <tr>
        <th>パスワード</th>
        <td><input type="password" name="password" id="" class="form-control"></td>
    </tr>
</table>
<button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection