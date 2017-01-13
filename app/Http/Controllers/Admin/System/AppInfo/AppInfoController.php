<?php

namespace App\Http\Controllers\Admin\System\AppInfo;

use App\Http\Controllers\Admin\BackController;

class AppInfoController extends BackController
{
    public function index()
    {
        return redirect()->to(site_path('system/appinfo/guide', 'admin'));
    }
}
