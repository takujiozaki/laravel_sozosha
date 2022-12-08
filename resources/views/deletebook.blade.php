@extends('layout.main')

@section('title')
本の削除
@endsection

@section('content')
<h1>本の削除</h1>
<p class="alert alert-danger">
    この本を削除していいですか？
    <a href="/" class="btn btn-sm btn-success">戻る</a>
</p>
<table class="table">
    <tr>
        <th>ISBN</th>
        <td>{{$book->ISBN}}</td>
    </tr>
        <th>タイトル</th>
        <td>{{$book->title}}</td>
    </tr>
        <th>著者</th>
        <td>{{$book->author}}</td>
    </tr>
        <th>出版日</th>
        <td>
            {{$book->published_at}}
        </td>
    </tr>
</table>
<form action="" method="post">
@csrf @method('delete')
    <button type="submit" class="btn btn-danger">削除</button>
</form>
@endsection