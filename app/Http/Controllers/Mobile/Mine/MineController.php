<?php

namespace App\Http\Controllers\Mobile\Mine;

use App\Http\Controllers\Mobile\MobileController;

use Illuminate\Http\Request;

class MineController extends MobileController
{
    public function index(Request $request)
    {
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/login', 'mobile'));
        }
        
        return $this->view('mine.index');
    }
}
