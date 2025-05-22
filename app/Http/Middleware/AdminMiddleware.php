<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
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
        if(Auth::check()){
            if(Auth::User()->role == 1){
                return $next($request);
            }else{
                return redirect('home')->with('admin_access', 'You are not an Admin');
            }
        }else{
            return redirect('login')->with('error', 'Login Failed');
        }


        
    }
}
