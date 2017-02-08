<?php namespace Modules\Wechat\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class WechatController extends Controller {
	
	public function index()
	{
		return view('wechat::index');
	}
	
}