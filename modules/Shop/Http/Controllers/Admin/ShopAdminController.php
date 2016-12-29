<?php namespace Modules\Shop\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;

class ShopAdminController extends Controller {
	
	public function index()
	{
		return view('shop::admin.index');
	}
	
}