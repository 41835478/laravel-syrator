<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Events\UserLogin;
use App\Events\UserLogout;


/**
 * 后台管理员用户登录统一认证
 *
 */
class AuthorityController extends BackController
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
        //控制面板路径
        $redirectTo = site_path('home', 'admin');
        
        //认证凭证
        $credentials = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];
        
        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            event(new UserLogin(auth()->user()));  //触发登录事件
            return redirect()->intended($redirectTo);
        } else {
            $msg = '“用户名”、“密码”错误或帐号已被锁定，请重新登录或联系超级管理员！';
            return redirect()->back()->withInput()->withErrors(['attempt' => $msg]);
        }
    }

    public function getLogout()
    {
        @event(new UserLogout(auth()->user()));  //触发登出事件
        Auth::logout();
        return redirect()->to(site_path('auth/login', 'admin'));
    }
}
