<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(){
        return view ("auth.register");
    }
    public function handleRegister(Request $request ){
        $request->validate([
            "name"  => "required|string|max:100",
            "email" => "required||email|max:100|unique:users,email,",
            "password"  => "required|string|min:6|max:50"
        ]);

       $user =  User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request ->pass)
        ]);

        Auth::login($user);

        return redirect(route("books.index"));
    }


    public function login(){
        return view("auth.login");
    }

    public function handleLogin(Request $request){
        $request->validate([
            "email" => "required|email|max:100",
            "password"  => "required|string|min:6|max:50"
        ]);

       $is_admin =  Auth::attempt([
            "email" => $request->email,
            "password"  => $request->pass
        ]);

        if(!$is_admin){
            return back();
        }

        return redirect(route("books.index"));


    }

    public function logout(){
        Auth::logout();
        return back();
    }



}
