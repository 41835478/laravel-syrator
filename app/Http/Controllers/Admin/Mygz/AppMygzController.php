<?php

namespace App\Http\Controllers\Admin\Mygz;

use App\Http\Controllers\Admin\BackController;

/**
 * 蚂蚁公装应用后台控制器基类
 *
 */
class AppMygzController extends BackController
{
    // UI主题
    protected $theme = "mygz.";

    public function view($view = null, $data = [], $mergeData = [])
    {
        return view("admin.".$this->theme.$view, $data, $mergeData);
    }
}
