<?php

namespace App\Http\Controllers\Mobile\Member;

use App\Http\Controllers\Mobile\MobileController;

use EasyWeChat\Foundation\Application;

class MemberController extends MobileController
{
    public function login()
    {
        return $this->view('member.login');   
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
