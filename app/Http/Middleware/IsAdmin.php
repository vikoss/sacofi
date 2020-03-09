<?php

namespace App\Http\Middleware;

use Closure, Auth;

class IsAdmin
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
        if (Auth::user()->isAdmin()) {
            return $next($request);
        }elseif (Auth::user()->isAccountant()) {
            return $next($request);
        }else {
            return $next($request);
        }
        
        //return redirect('/');
    }
}
