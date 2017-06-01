<?php 

namespace Modules\Wechat\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;
use Zizaco\Entrust\EntrustFacade as Entrust;

class AdminController extends Controller {
    
    // 主题
    protected $theme = "wechat::admin.";

    public function __construct()
    {
        if(!Entrust::can('wechat.admin')) {
            return $this->deny();
        }
    }
    
    public function deny()
    {
        return response()->view('wechat::admin.errors.403');
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}