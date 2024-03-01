<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    function signin(){
        return view('auth.signin');
    }

    function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
    ]);
    
    return redirect('/');
    }
}
