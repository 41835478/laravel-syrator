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
        $this->middleware('multi-site.guest:member', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return $this->view('auth.login');
    }

    public function postLogin(Request $request)
    {
        //控制面板路径
        $redirectTo = site_path('', 'member');
        
        //认证凭证
        $credentials = [
            'account'  => $request->input('username'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];
        
        if (Auth::guard('member')->attempt($credentials, $request->has('remember'))) {
            event(new MemberLogin(auth()->user()));  //触发登录事件
            return redirect()->intended($redirectTo);
        } else {
            // 登录失败，跳回
            return redirect()->back()->withInput()->withErrors(
                ['attempt' => '“用户名”、“密码”错误或帐号已被锁定，请重新登录或联系超级管理员！']
                );  //回传错误信息
        }
    }

    public function getLogout()
    {
        @event(new MemberLogout(auth()->user()));  //触发登出事件
        Auth::logout();
        return redirect()->to(site_path('auth/login', 'admin'));
    }
}