<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 多站点用户/会员认证中间件(游客跳转登录中间件)
 *
 */
class MultiSiteAuthenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $site
     * @return mixed
     */
    public function handle($request, Closure $next, $site = null)
    {
        $member_login_url = 'member/auth/login';
        $member_login_url_mobile = 'mobile/member/auth/login';
        $backend_login_url = 'admin/auth/login';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $login_url = $backend_login_url;
                break;
            case 'member':
                $guard = 'member';
                $login_url = $member_login_url;
                break;
            case 'mobile':
                $guard = 'member';
                $login_url = $member_login_url_mobile;
                break;
            case 'desktop':
            default:
                # code...
                $guard = 'member';
                $login_url = $member_login_url;
                break;
        }
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest($login_url);
            }
        }
        return $next($request);
    }
}
