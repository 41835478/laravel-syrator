<?php namespace Modules\Shop\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ShopController extends Controller {
	
	public function index()
	{
		return view('shop::index');
	}
	
}