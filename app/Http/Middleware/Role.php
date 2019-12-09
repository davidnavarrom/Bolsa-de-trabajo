<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {

        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();

        if($user->hasRole('admin'))
            return $next($request);


        if (is_array($roles))
        {
            foreach($roles as $role) {
                if($user->hasRole($role))
                    return $next($request);
            }
        }else{
            if($user->hasRole($roles))
                return $next($request);
        }

        return redirect('unauthorized');
    }
}
