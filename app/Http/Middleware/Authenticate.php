<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard=='web') {
            return $next($request);
        }
        
        $redirectUrl = "";
        switch ($guard) {
            case 'admin':
                $guard = 'admin';
                $redirectUrl = 'admin/auth/login';
                break;
            case 'member':
                $guard = 'member';
                $redirectUrl = 'member/auth/login';
                break;
            case 'mobile':
                $guard = 'member';
                $redirectUrl = 'mobile/member/auth/login';
                break;
            default:
                $guard = 'admin';
                $redirectUrl = 'admin/auth/login';
                break;
        }

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest($redirectUrl);
            }

        echo $guard;
        exit();
        }

        return $next($request);
    }
}
