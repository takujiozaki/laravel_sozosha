@extends('layout.main')

@section('title')
{{$title}}
@endsection

@section('content')
<h1>ユーザー登録</h1>
<form action="" method="post">
    @csrf 
    @include('inc.error')
    <table class="table">
        <tr>
            <th>名前</th>
            <td><input type="text" name="name" id="" class="form-control" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="email" id="" class="form-control" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>password</th>
            <td><input type="password" name="password" id="" class="form-control"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection