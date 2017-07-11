<?php

namespace App\Http\Controllers\Desktop\Member;

class HomeController extends MemberController
{
    public function getIndex()
    {
        $member = auth()->guard('member')->user();
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/auth/login', 'desktop'));
        }
        
        return $this->view('index');
    }
}
