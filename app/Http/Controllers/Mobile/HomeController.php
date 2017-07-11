<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;

class HomeController extends MobileController
{
    public function getIndex(Request $request)
    {
        $member = auth()->guard('member')->user();
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/auth/login', 'mobile'));
        }
        
        return $this->view('index');
    }
}
