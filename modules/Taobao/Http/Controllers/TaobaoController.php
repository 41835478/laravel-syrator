<?php namespace Modules\Taobao\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TaobaoController extends Controller {
	
	public function index()
	{
		return view('taobao::index');
	}
	
}