<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Auth;
use App\Events\MemberLogin;
use App\Events\MemberLogout;


/**
 * 会员用户登录统一认证
 *
 */
class AuthorityController extends MemberController
{

    /**
     * 添加路由过滤中间件
     */
    public function __construct()
    {
    }

    public function getLogin()
    {
        return $this->view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $redirectTo = site_path('', 'member');
        
        //认证凭证
        $credentials = [
            'account'  => $request->input('username'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];
        
        if (Auth::guard('member')->attempt($credentials, $request->has('remember'))) {
            event(new MemberLogin(auth()->user()));
            return redirect()->intended($redirectTo);
        } else {
            // 登录失败
            $msg = '“用户名”、“密码”错误或帐号已被锁定，请重新登录或联系超管！';
            return redirect()->back()->withInput()->withErrors(['attempt' => $msg]);
        }
    }

    public function getLogout()
    {
        @event(new MemberLogout(auth()->user()));
        Auth::guard('member')->logout();
        
        return redirect()->to(site_path('auth/login', 'member'));
    }
}
