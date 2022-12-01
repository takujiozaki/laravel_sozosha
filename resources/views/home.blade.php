@extends('layouts.template')

@section('title') 書評Books @endsection

@section('content')
<h1>書評Books({{$count}})</h1>
@if(Auth::check())
    {{Auth::user()->name}}さん、ようこそ！
@else
    ゲストさん、ようこそ！
@endif

<table class="table">
    <tr>
        <th>ISBN</th>
        <th>タイトル</th>
        <th>著者</th>
        <th>登録者</th>
        <th>出版日</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{$book->ISBN_CODE}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        {{--<td>{{optional($book->user)->name}}</td> --}}
        <td>{{$book->user->name}}</td>
        <td>{{$book->published_at}}</td>
    </tr>
    @endforeach
</table>

@endsection