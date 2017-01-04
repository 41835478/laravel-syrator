<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class BlockSite
 *
 * 多服务器部署站点拦截
 *
 * @package App\Http\Middleware
 * 
 */
class BlockSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $site
     * @return mixed
     */
    public function handle($request, Closure $next, $site)
    {
        return $next($request);
    }
}
