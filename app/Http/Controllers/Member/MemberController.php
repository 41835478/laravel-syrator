<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class MemberController extends Controller
{    
    // UI主题
    protected $theme = "member.";

    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
