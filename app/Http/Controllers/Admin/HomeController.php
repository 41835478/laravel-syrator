<?php

namespace App\Http\Controllers\Admin;

use Zizaco\Entrust\EntrustFacade as Entrust;

/**
 * 快捷控制面板
 *
 */
class HomeController extends BackController
{

    public function __construct()
    {
        parent::__construct();

        if(!Entrust::can('admin.home')) {
            $this->middleware('deny');
        }
    }

    public function getIndex()
    {
        if(!Entrust::can('admin.home')) {
            return deny();
        }
        
        return view('admin.home.index');
    }

}
