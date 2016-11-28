<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Admin\BackController;

/**
 * CMS 应用后台控制器基类
 *
 */
class AppCmsController extends BackController
{
    // UI主题
    protected $theme = "cms.";

    public function view($view = null, $data = [], $mergeData = [])
    {
        return view("admin.".$this->theme.$view, $data, $mergeData);
    }
}
