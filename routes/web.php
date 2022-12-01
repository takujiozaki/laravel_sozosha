<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserLoginController;
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
//     // return view('home');
//     $arr = ['name'=>'創造社デザイン専門学校','course'=>'情報セキュリティ'];
//     return $arr;
// });
Route::get('/',[HomeController::class,'index']);

Route::get('/signup',[SignupController::class,'index']);
Route::post('/signup',[SignupController::class,'store']);

Route::get('/login',[UserLoginController::class,'index'])->name('login');
Route::post('/login',[UserLoginController::class,'login']);

Route::middleware('auth')->group(function(){
    Route::post('/logout',[UserLoginController::class,'logout']);
});