<?php namespace Modules\Cms\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;

class CmsAdminController extends Controller {
	
	public function index()
	{
		return view('cms::admin.index');
	}
	
}