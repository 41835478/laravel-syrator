<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;

class HomeController extends MobileController
{
    public function getIndex(Request $request)
    {
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/login', 'mobile'));
        }
        
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
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
        
        return $this->view('index');
    }
}
