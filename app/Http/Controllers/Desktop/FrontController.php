<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;

/**
 * 桌面站点前台共用控制器
 * FrontController
 *
 */
class FrontController extends Controller
{
    // 主题
    protected $theme = "";

    public function __construct()
    {
       $this->theme = config('site.theme','desktop').'.';
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
