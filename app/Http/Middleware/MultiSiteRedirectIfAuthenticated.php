<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 多站点用户/会员认证中间件(登录跳转中间件)
 *
 */
class MultiSiteRedirectIfAuthenticated
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
        $member_home_url = 'member';
        $member_home_url_mobile = 'mobile';
        $backend_home_url = 'admin/home';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $home_url = $backend_home_url;
                break;
            case 'member':
                $guard = 'member';
                $home_url = $member_home_url;
                break;
            case 'mobile':
                $guard = 'member';
                $home_url = $member_home_url_mobile;
                break;
            case 'desktop':
            default:
                # code...
                $guard = 'member';
                $home_url = $member_home_url;
                break;
        }
        if (Auth::guard($guard)->check()) {
            return redirect($home_url);
        }

        return $next($request);
    }
}
