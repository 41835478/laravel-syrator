<?php

namespace App\Http\Controllers\Admin\System\AppInfo;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

class AppInfoController extends BackController
{
    public function __construct()
    {
        parent::__construct();
    
        if(!Entrust::can('admin.system.appinfo')) {
            $this->middleware('deny');
        }
    }
    
    public function index()
    {
        if(!Entrust::can('admin.system.appinfo')) {
            return deny();
        }
        
        return redirect()->to(site_path('system/appinfo/guide', 'admin'));
    }
}
