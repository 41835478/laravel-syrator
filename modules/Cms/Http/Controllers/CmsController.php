<?php namespace Modules\Cms\Http\Controllers;

class CmsController extends BaseController {
	
	public function index()
	{
		return view('cms::index');
	}
	
}