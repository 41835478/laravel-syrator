<?php 

namespace Modules\Wechat\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;

class AdminController extends Controller {
    
    // 主题
    protected $theme = "wechat::admin.";

    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}