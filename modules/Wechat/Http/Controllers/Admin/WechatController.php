<?php 

namespace Modules\Wechat\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Modules\Wechat\Model\WechatParamModel;

class WechatController extends AdminController {
    
    public function __construct()
    {
    }
	
	public function index()
	{
	    return $this->view('index');
	}
	
	public function getParams()
	{
	    // 获取微信接口参数
	    $options = WechatParamModel::all();;
	    foreach ($options as $so) {
	        $data[$so['name']] = $so['value'];
	    }
	    
	    return $this->view('params',compact('data'));
	}
	
	public function putParams(Request $request)
	{
	    $data = $request->input('data');
	    if ($data && is_array($data)) {
	        WechatParamModel::updateParams($data);
	        return redirect()->back()->with('message', '成功更新微信配置！');
	    } else {
	        return redirect()->back()->with('fail', '提交数据异常！');
	    }
	}
}