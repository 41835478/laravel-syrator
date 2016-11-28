<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    // 主题
    protected $theme = "mobile.";

    public function __construct()
    {
//        $this->theme = config('site.theme','mobile').'.';
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
