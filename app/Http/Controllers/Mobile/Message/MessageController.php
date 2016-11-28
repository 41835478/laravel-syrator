<?php

namespace App\Http\Controllers\Mobile\Message;

use App\Http\Controllers\Mobile\MobileController;

use Illuminate\Http\Request;

class MessageController extends MobileController
{
    public function index(Request $request)
    {
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/login', 'mobile'));
        }
        
        return $this->view('message.index');
    }
    
    public function chat(Request $request)
    {
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/login', 'mobile'));
        }
    
        return $this->view('message.chat');
    }
}
