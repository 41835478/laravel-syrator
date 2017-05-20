<?php

namespace App\Http\Middleware;

use Closure;

/**
 * SYRATOR后台管理 权限不足抛出异常响应 中间件
 *
 */
class PermissionDenied
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
        return response()->view('admin.errors.403', array(), 403);
        return $next($request);
    }
}
