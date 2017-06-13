<?php namespace Modules\Cms\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;

class CmsAdminController extends Controller {
    
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