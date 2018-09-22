<?php

namespace App\Http\Middleware;

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
			return redirect()->route('user');                
        }elseif(Auth::user()->tipo != 'USER' && Auth::user()->tipo != 'ADMIN'){
            Auth::logout();
			return redirect()->route('index');
		}
        return $next($request);
    }
}
