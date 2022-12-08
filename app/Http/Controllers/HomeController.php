<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //セッションのクリア
        //$request->session()->flush();
        $request->session()->forget('validatedData');
        $title = "Laravel TEST";
        $message = "Laravelテスト実行中";
        //$books = Book::orderBy("published_at","desc")->get();
        $books = Book::with('user')->orderBy('published_at','desc')->get();//PKの指定
        //dd($books);

        // $isLogin = Auth::check();
        // $username = ($isLogin)?Auth::user()->name:"ゲスト";
        //dd(Auth::id());
        return view('home',compact('title','message','books'));
        //['title'=>$title,'message'=>$message]
    }

    public function showHowTo()
    {
        $message = "このサイトの使い方";
        return view('showhowto',compact("message"));
    }

    public function addBook(Request $request, Book $book)
    {
        if ($request->session()->has('validatedData')) {
            $book->fill($request->session()->get('validatedData'));
            $request->session()->forget('validatedData');
        }
        
        return view('addbook',compact('book'));
    }

    public function validateBook(BookRequest $request)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
        //セッションに保存
        $request->session()->put('validatedData',$validatedData);
        //Book::create($validatedData);

        return redirect(route('addbookconfirm'));
    }

    public function addBookConfirm(Request $request,Book $book)
    {
        if (!$request->session()->has('validatedData')) {
            abort('404');
        }
        $data = $request->session()->get('validatedData');//連想配列
        $book->fill($data);//Bookモデルに戻す
        $keyword = "登録";
        return view('comfirmbook',compact('book','keyword'));
    }

    public function storeBook(Request $request,Book $book)
    {
        if (!$request->session()->has('validatedData')) {
            abort('404');
        }
        $data = $request->session()->get('validatedData');//連想配列
        $data['user_id'] = Auth::id();
        $request->session()->forget('validatedData');
        $book->fill($data)->save();
        return redirect('/');
    }

    public function editBook(Book $book,Request $request)
    {    
        //自分が登録者かどうか確認する
        // if($book->user->id != Auth::id()){
        //     abort('404');
        // }
        abort_if($book->user->id != Auth::id(), 404);
        if ($request->session()->has('validatedData')) {
            $book->fill($request->session()->get('validatedData'));
            $request->session()->forget('validatedData');
        }
        return view('editbook',compact('book')); 
    }

   

    public function validateEdit(Book $book, BookRequest $request)
    {
        $validatedData = $request->validated();
        $request->session()->put('validatedData',$validatedData);
        //dd($validatedData);
        //$book->update($validatedData);
        return redirect(route('editbookconfirm',$book));
    }
    
    public function editBookConfirm(Request $request,Book $book)
    {
        if (!$request->session()->has('validatedData')) {
            abort('404');
        }
        $data = $request->session()->get('validatedData');//連想配列
        $book->fill($data);
        $keyword = "更新";
        return view('comfirmbook',compact('book','keyword'));
    }

    public function updateBook(Request $request,Book $book)
    {
        if (!$request->session()->has('validatedData')) {
            abort('404');
        }
        $data = $request->session()->get('validatedData');//連想配列
        $request->session()->forget('validatedData');
        $book->fill($data)->update();
        return redirect('/');
    }

    public function deleteBook(Book $book)
    {
        return view('deletebook',compact('book'));
        //['book'=>$book,'user'=>$user] compact('book','user')
    }

    public function deletedBook(Book $book)
    {
        $book->delete();
        return redirect('/');
    }

    
}
