<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class isOwner
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
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();


        if ($user->hasRole('admin')) {
            return $next($request);
        } else {

            if ($user->id == $request->route('user')->id) {
                return $next($request);
            } else {
                return redirect('unauthorized');
            }
        }
    }
}
