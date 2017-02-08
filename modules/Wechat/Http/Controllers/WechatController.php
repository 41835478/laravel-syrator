<?php namespace Modules\Wechat\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use App\Http\Requests\MemberRequest;
use Modules\Wechat\Model\WechatParamModel;

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
	    // 获取微信接口参数
	    $options = WechatParamModel::all();;
	    foreach ($options as $so) {
	        $data[$so['name']] = $so['value'];
	    }
	    
	    return view('wechat::params',compact('data'));
	}
}