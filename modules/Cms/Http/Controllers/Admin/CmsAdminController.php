<?php namespace Modules\Cms\Http\Controllers\Admin;

use Modules\Cms\Http\Controllers\BaseController;
use Zizaco\Entrust\EntrustFacade as Entrust;

class CmsAdminController extends BaseController {
    
    public function __construct()
    {
        parent::__construct();
    
        if(!Entrust::can('cms.admin')) {
            $this->middleware('deny');
        }
    }
	
	public function index()
	{
        if(!Entrust::can('admin.home')) {
            $this->middleware('deny');
        }
        
		return view('cms::admin.index');
	}
	
}