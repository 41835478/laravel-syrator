<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * 管理后台共用控制器
 * CommonController
 *
 */
class BackController extends Controller
{    
    // UI主题
    protected $theme = "admin.";

    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
