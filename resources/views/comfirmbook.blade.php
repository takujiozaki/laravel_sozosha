@extends('layout.main')

@section('title')
{{$keyword}}内容の確認
@endsection

@section('content')
<h1>{{$keyword}}内容の確認</h1>
<p class="alert alert-success">
    この本を{{$keyword}}していいですか？
    @if ($keyword == '登録')
    <a href="/addBook" class="btn btn-sm btn-success">戻る</a>
    @else
    <a href="{{route("editbook",$book)}}" class="btn btn-sm btn-success">戻る</a>
    @endif
</p>
<table class="table">
    <tr>
        <th>ISBN</th>
        <td>{{$book->ISBN}}</td>
    </tr>
    <tr>
        <th>タイトル</th>
        <td>{{$book->title}}</td>
    </tr>
    <tr>
        <th>著者</th>
        <td>{{$book->author}}</td>
    </tr>
    <tr>
        <th>出版日</th>
        <td>
            {{$book->published_at}}
        </td>
    </tr>
</table>
<form action="" method="post">
@csrf
    <button type="submit" class="btn btn-success">{{$keyword}}</button>
</form>
@endsection