<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class ApiAuthController extends Controller
{

    public function handleRegister(Request $request){


        $validator = Validator::make($request->all(),[
            "name"  => "required|string|max:100",
            "email" => "required|email|max:100|unique:users,email",
            "password"  => "required|string|min:6|max:50"
    ]);

    if($validator->fails()){
        $errors = $validator->errors();
        return response()->json($errors);
    }

       $user =  User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->pass),
            "access_token" => Str::random(64)
        ]);

        return response()->json($user->access_token);
    }



    public function handleLogin(Request $request){

        $validator = Validator::make($request->all(),[
            "email" => "required|email|max:100",
            "password"  => "required|string|min:6|max:50"
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json($errors);
        }


       $is_user =  Auth::attempt([
            "email" => $request->email,
            "password"  => $request->pass
        ]);


        if(! $is_user){
            $error = "Credentials are Not correct";
            return response()->json($error);
        }

        $user = User::where("email" , "=" , $request->email)->first();

        $new_access_token = Str::random(64);

        $user->update([
            "access_token" => $new_access_token
        ]);

        return response()->json($user);



    }

    public function logout(Request $request){

        $access_token = $request->access_token;

        $user = User::where("access_token" , $access_token)->first();

        if($user == null){
            $error = "Token not Correct";
            return response()->json($error);
        }

        $user->update([
            "access_token" => null
        ]);

        $success = "logged out successfully";
        return response()->json($success);
    }

}

