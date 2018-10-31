<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class User
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
        if(!Auth::user()){
			return redirect()->route('index');                
        }elseif(Auth::user()->type != 'USER' && Auth::user()->type != 'ADMIN'){
            Auth::logout();
			return redirect()->route('index');
		}
        return $next($request);
    }
}
