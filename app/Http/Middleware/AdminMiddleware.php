<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if user is authenticated
        if(Auth::check()){
            // if user is admin 
            // role = 0 is user
            // role = 1 is admin
            // role = 1 is Super Admin
            if(Auth::user()->role > 0){
                if (auth()->user()->first_time) {
                   $user = User::find(auth()->user()->id);
                   $user->first_time = false;
                   $user->save();
                   return redirect()->away(route('welcome'));
                } else {
                    return $next($request);
                }
                
            }else{
                return redirect('/')->with('error', "Access Denied, You must be an Admin To access Feature!");
            }
            //user not authenticated
        }else{
            return redirect('/login')->with('error', "Login to Access Feature!");

        }
        return $next($request);
    }
}
