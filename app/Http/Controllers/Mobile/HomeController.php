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
        
        return $this->view('index');
    }
}
