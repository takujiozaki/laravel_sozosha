<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Symfony\Contracts\Service\Attribute\Required;

class SignUpController extends Controller
{
    public function signup()
    {
        //ログインしているときにはアクセス不可
        if(Auth::check()){
            return redirect('/');
        }
        $title = "ユーザー登録";
        return view('signup',compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:20'],
            'email' => ['required','email:filter',Rule::unique('users')],
            'password'=>[Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        $data['password'] =  bcrypt($data['password']);
        $user = User::create($data);
        
        //ログインさせる
        Auth::login($user);

        return redirect('/');

    }

    public function loginform()
    {
        if(Auth::check()){
            return redirect('/');
        }
        $title = "ユーザーログイン";
        return view('login',compact('title'));
    }

    public function login(Request $request)
    {
        
        $data = $request->validate([
            'email'=>['required','string'],
            'password'=>['required','string'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'ユーザー認証情報に誤りがあります',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with("message","ログアウトしました");
    }
}
