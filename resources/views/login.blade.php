@extends('layout.main')

@section('title')
{{$title}}
@endsection

@section('content')
<h1>ユーザーログイン</h1>
<form action="" method="post">
    @csrf
    @include('inc.error')
    @include('inc.message')
    <table class="table">
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="email" id="" class="form-control" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>password</th>
            <td><input type="password" name="password" id="" class="form-control"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">ログイン</button>
</form>
@endsection