@extends('layout.main')

@section('title')
{{$message}}
@endsection

@section('content')
<h1>{{$message}}</h1>
@endsection

@section('script')
console.log("test")
@endsection