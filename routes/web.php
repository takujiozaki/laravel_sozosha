<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     //$message = "laravel message";
//     //return $message;
//     //dd($message);
//     $arr = [
//         "school" => "創造社デザイン専門学校",
//         "course" => "情報セキュリティ",
//     ];
//     return $arr;
//     //return view('home');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('/showhowto',[HomeController::class,'showHowTo'])->name('showhowto');


//ユーザー登録
Route::get('/signup',[SignUpController::class,'signup'])->name('signup');
Route::post('/signup',[SignUpController::class,'store']);

//ログインの機能
Route::get('/login',[SignUpController::class,'loginform'])->name('login');
Route::post('/login',[SignUpController::class, 'login']);

//ログインしているときにだけ有効なルーティング
Route::middleware('auth')->group(function(){
    //本の登録
    Route::get('/addBook',[HomeController::class,'addBook'])->name('addBook');
    Route::post('/addBook',[HomeController::class,'validateBook']);
    //本の登録時の確認
    Route::get('/addBookConfirm',[HomeController::class,'addBookConfirm'])->name('addbookconfirm');
    Route::post('/addBookConfirm',[HomeController::class,'storeBook']);
    //本の修正
    Route::get('/editBook/{book}',[HomeController::class,'editBook'])->name('editbook');
    Route::post('/editBook/{book}',[HomeController::class,'validateEdit']);
    //本の修正時の確認
    Route::get('/editBookComfirm/{book}',[HomeController::class,'editBookConfirm'])->name('editbookconfirm');
    Route::post('/editBookComfirm/{book}',[HomeController::class,'updateBook']);
    //本の削除
    Route::get('/deleteBook/{book}',[HomeController::class,'deleteBook'])->name('deletebook');
    Route::delete('/deleteBook/{book}',[HomeController::class,'deletedBook']);

    //ログアウト
    Route::post('/logout',[SignUpController::class, 'logout']);
});


/**
 * 
 * /howto というURLで使い方に関するページを表示する
 * Viewファイルには「このサイトの使い方」というタイトルと
 * H1タグを表示する
 * HomeControllerにshowHowTo()というメソッドを作成
 * Viewファイル名はshowHowTo.blade.phpとします
 */