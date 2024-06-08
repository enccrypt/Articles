<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function signin(){
        return view('auth.signin');
    }

    function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:App\Models\User|email',
            'password'=>'required|min:6'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $token = $user->createToken('MyAppTokens');
        if($request->expectsJson()) return response()->json($token);
        return redirect()->route('login');
    }

    function login(){
        return view('auth.signup');
    }


    function signup(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required|min:6'
        ]);

        if (Auth::attempt($credentials)){
            $token = auth()->user()->createToken('MyAppTokens');
            if($request->expectsJson()) return response()->json($token);
            $request->session()->regenerate();
            return redirect()->intended('/article');
        } 

        return back()->withErrors([
            'email'=> 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    function logout(Request $request){
        auth()->user()->tokens()->delete(); //удаляет все токены пользователя
        if($request->expectsJson()) return response()->json('logout'); 
        Auth::logout(); // завершение аутентификация пользователя
        $request->session()->invalidate(); //предотвращает повторное использование идентификатора
        $request->session()->regenerateToken(); //важно создать новый csrf для безопасности
        return redirect('/');
    }
}
