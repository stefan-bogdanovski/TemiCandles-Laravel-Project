<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class IsLoggedInMiddleware
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
        if($request->session()->has('user'))
        {
            return $next($request);
        }
        session()->put('notLoggedIn', 'Da biste ovo izvršili, morate biti prijavljeni.');
        return redirect()->back();
    }
}
