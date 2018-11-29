<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
			return redirect()->route('admin');                
        }elseif(Auth::user()->tipo != 'ADMIN'){
            Auth::logout();
			return redirect()->route('admin');
		}
        return $next($request);
    }
}
