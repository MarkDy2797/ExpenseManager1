<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class usertype
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            if(Auth::user()->user_type){
                return $next($request);
            }
            return redirect('user');
        }
        //return $next($request);
        return redirect('login');
    }
}
