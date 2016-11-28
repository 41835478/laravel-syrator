<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;

/**
 * 桌面站点前台共用控制器
 * FrontController
 *
 */
class DocumentsController extends Controller
{
    // 主题
    protected $theme = "documents.";

    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
