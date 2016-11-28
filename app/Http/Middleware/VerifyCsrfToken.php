<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/member/login',
        '/api/member/register',
        '/api/member/sendverifycode',
        '/api/member/validateverifycode',
        '/api/member/resetpassword',
        
        '/api/material/list',        
        '/api/material/getcatalogs',
        
        '/api/servicer/shigong/list',
        '/api/servicer/jianli/list',
        '/api/servicer/fenbao/list',
        '/api/device/list',
        '/api/finance/list',
        '/api/project/list',
        '/api/freight/list',
        '/api/task/list',
        '/api/forum/list',
    ];
}
