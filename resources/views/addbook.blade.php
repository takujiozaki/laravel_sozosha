@extends('layout.main')

@section('title')
本の登録
@endsection

@section('content')
<h1>本の登録</h1>
<p class="text-end"><a href="/" class="btn btn-sm btn-success">戻る</a></p>
<form action="" method="post">
    @csrf
    @include('inc.error')
<table class="table">
    <tr>
        <th>ISBN</th>
        <td><input type="text" name="ISBN" id="" class="form-control" value="{{!empty(old('ISBN'))?old('ISBN'):$book->ISBN}}"></td>
    </tr>
        <th>タイトル</th>
        <td><input type="text" name="title" id="" class="form-control" value="{{!empty(old('title'))?old('title'):$book->title}}"></td>
    </tr>
        <th>著者</th>
        <td><input type="text" name="author" id="" class="form-control" value="{{!empty(old('author'))?old('author'):$book->author}}"></td>
    </tr>
        <th>出版日</th>
        <td>
            <input type="text" name="published_at" id="" class="form-control" placeholder="2022-11-01" value="{{!empty(old('published_at'))?old('published_at'):$book->published_at}}">
        </td>
    </tr>
</table>
<button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection