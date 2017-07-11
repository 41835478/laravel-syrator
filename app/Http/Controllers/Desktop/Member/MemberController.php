<?php

namespace App\Http\Controllers\Desktop\Member;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    // 主题
    protected $theme = "desktop.member.";
    
    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
