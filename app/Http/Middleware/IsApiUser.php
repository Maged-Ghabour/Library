<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class IsApiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if($request->has("access_token")){
            if($request->access_token != null){
                $user = User::where("access_token" , $request->access_token)->frist();
                if($user != null){
                    return $next($request);
                }else{
                    return response()->json("Access Token is Not Correct");
                }
            }else{
                return response()->json("There is no access token");
            }
        }else{
            return response()->json("All access token is empty");
        }


    }
}
