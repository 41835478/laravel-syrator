<?php namespace Modules\Wechat\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class WechatController extends Controller {
    
    public function __construct()
    {
    }
	
	public function index()
	{
		return view('wechat::index');
	}
	
	public function params()
	{
	    return view('wechat::params');
	}
}