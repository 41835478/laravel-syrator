<?php

namespace App\Http\Controllers\Mobile\Member;

use App\Http\Controllers\Mobile\MobileController;

use EasyWeChat\Foundation\Application;

class MemberController extends MobileController
{
    public function login()
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
        if ($app==null || empty($app)) {
            return $this->view('member.login');
        }
        
        $oauth = $app->oauth;
        if ($oauth==null || empty($oauth)) {
            return $this->view('member.login');
        }
        
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        if ($user==null || empty($user)) {        
            return $this->view('member.login');            
        }

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
    
    public function register()
    {
        return $this->view('member.register');
    }
    
    public function resetPassword()
    {
        return $this->view('member.resetpassword');
    }
}
