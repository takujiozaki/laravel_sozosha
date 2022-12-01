<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with('user')->orderBy('published_at','desc')->get();//PKの指定
        //配列として受け取る場合
        //$books = Book::get()->toArray();
        $count = $books->count();
        
        return view('home',compact('books','count'));
    }
}
