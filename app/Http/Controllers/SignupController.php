<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignupController extends Controller
{
    public function index()
    {   
        return view('index');
    }

    public function store(Request $request)
    {
        //ヴァリデーション
        $data = $request->validate([
            'name' => ['required','string','max:20'],
            'email' => ['required','email:filter',Rule::unique('users')],
            'password'=> [Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        //ユーザー登録
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ]);
        //ログインさせる
        Auth::login($user);
        return redirect('/');
    }
}
