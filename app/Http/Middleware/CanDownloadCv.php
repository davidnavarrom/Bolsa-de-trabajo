<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class CanDownloadCv
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        $userCv = User::where('cvpath', $request->route('file'))->first();
        if (is_null($userCv)) {
            return abort(404);
        } else {
            if ($user->hasRole('admin')) {
                return $next($request);
            } else {
                if ($userCv->id == $user->id) {
                    return $next($request);
                } else {
                    return redirect('unauthorized');
                }
            }
        }

    }

}
