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
        
        '/api/system/app/get_guide_pages',        
    ];
}
