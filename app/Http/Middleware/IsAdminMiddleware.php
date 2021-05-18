<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use App\Models\User_Role;
use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
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
            $roleId = User_Role::Min('role_id')->where('user_id', '=', session()->get('user')->id)->first();
            if($roleId->role_id == 1)
            {
                return $next($request);
            }
        }
        abort(404);
    }
}
