<?php namespace Modules\Cms\Http\Controllers\Admin;

use Zizaco\Entrust\EntrustFacade as Entrust;

class CmsAdminController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
    
        if(!Entrust::can('cms.admin')) {
            return $this->deny();
        }
    }
	
	public function index()
	{
        if(!Entrust::can('cms.admin')) {
            return $this->deny();
        }
        
		return view('cms::admin.index');
	}
	
}