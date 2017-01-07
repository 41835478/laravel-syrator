<?php

namespace App\Http\Controllers\Desktop\Member;

use App\Http\Controllers\Desktop\FrontController;

use Illuminate\Http\Request;
use SaeTOAuthV2;
use QC;

class MemberController extends FrontController
{
    public function getIndex(Request $request)
    {
        $member = $request->session()->get('member');
        if ($member==null || empty($member)) {
            return redirect()->to(site_path('member/login', 'desktop'));
        }
    
        return $this->view('index');
    }
    
    public function login(Request $request)
    {
        $o = new SaeTOAuthV2('2036997088', 'aa9cab2ea753b0c193d9a448d0d5bce7');
        $code_url = $o->getAuthorizeURL(URL(site_path('member/login', 'desktop')));
        
        return $this->view('member.login', compact('code_url'));
    }
    
    public function logout()
    {
        session()->remove('member');
        return redirect()->to(site_path('member/login', 'mobile'));
    }
    
    public function loginqq(Request $request)
    {            
        return $this->view('member.loginqq');
    }
    
    public function loginqqfast(Request $request)
    {
        $qc = new QC();
        $login_url = $qc->qq_login();
        
        return redirect()->to($login_url);
    }
}
