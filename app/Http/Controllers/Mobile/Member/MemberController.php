<?php

namespace App\Http\Controllers\Mobile\Member;

use App\Http\Controllers\Mobile\MobileController;

class MemberController extends MobileController
{
    public function login()
    {
        return $this->view('member.login');
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
