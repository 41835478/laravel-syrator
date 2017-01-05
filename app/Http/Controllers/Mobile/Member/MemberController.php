<?php

namespace App\Http\Controllers\Mobile\Member;

use App\Http\Controllers\Mobile\MobileController;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class MemberController extends MobileController
{
    public function login(Request $request)
    {
        // 获取参数
        $param = [
            'code' => $request->input('code'),
            'state' => $request->input('state'),
        ];
        
        // code为空，则跳转到登陆页面
        if (empty(e($param['code']))) {
            return $this->view('member.login');
        }
        
        $options = [
            'debug'     => true,
            'app_id'    => 'wx13b647618165d0c6',
            'secret'    => '7385e8edde0b99bb5684b70790e0e688',
            'token'     => 'laravel-syrator',
        ];
        
        $app = new Application($options);        
        $oauth = $app->oauth;
        
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user(); 
        
        // 使用微信用户登陆
        session()->set('member', $user);
        return redirect()->to(site_path('', 'mobile'));
    }
    
    public function loginFast()
    {
        $options = [
            'debug'     => true,
            'app_id'    => 'wx13b647618165d0c6',
            'secret'    => '7385e8edde0b99bb5684b70790e0e688',
            'token'     => 'laravel-syrator',
            'oauth'     => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/mobile/member/login',
            ],
        ];
        
        $app = new Application($options);
        $oauth = $app->oauth;
        
        return $oauth->redirect();
    }
    
    public function logout()
    {
        session()->remove('member');
        return redirect()->to(site_path('member/login', 'mobile'));
    }
    
    public function register()
    {
        return $this->view('member.register');
    }
    
    public function resetPassword()
    {
        return $this->view('member.resetpassword');
    }
}
