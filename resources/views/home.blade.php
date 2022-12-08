@extends('layout.main')

@section('title')
{{$title}}
@endsection

@section('content')
<h1>{{$message}}</h1>
@if(Auth::check())
{{Auth::user()->name}}さん、こんにちは <a href="{{route('addBook')}}" class="btn btn-info btn-sm">新しい本の登録</a>
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">ログアウト</button>
</form>
@else
ゲストさん、こんにちは <a href="/signup" class="btn btn-sm btn-success">ユーザー登録</a>|<a href="/login" class="btn btn-sm btn-primary">ログイン</a>
@endif
<table class="table">
    <tr>
        <th>ISBN</th>
        <th>タイトル</th>
        <th>著者</th>
        <th>出版日</th>
        <th>登録者</th>
        <th>--</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{$book->ISBN}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->published_at}}</td>
        {{--<td>{{$book->user ? $book->user->name : "[退会ユーザー]"}}</td>--}}
        <td>{{$book->user->name}}</td>
        {{--<td>@if (!is_null($book->user) && Auth::id() == $book->user->id)
            <a href="{{route('editbook',$book)}}" class="btn btn-sm btn-info">編集</a> <a href="{{route('deletebook',$book)}}" class="btn btn-sm btn-danger">削除</a>
            @endif
        </td>--}}
        <td>
            @if(Auth::check() && Auth::id() == optional($book->user)->id)
            <a href="{{route('editbook',$book)}}" class="btn btn-sm btn-info">編集</a> <a href="{{route('deletebook',$book)}}" class="btn btn-sm btn-danger">削除</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('script')
console.log("test")
@endsection