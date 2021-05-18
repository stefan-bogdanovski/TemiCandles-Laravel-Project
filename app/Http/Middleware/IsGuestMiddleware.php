<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user'))
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
