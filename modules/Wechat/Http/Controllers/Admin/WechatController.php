<?php 

namespace Modules\Wechat\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Modules\Wechat\Model\WechatParamModel;

class WechatController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        
        if(!Entrust::can('wechat.admin')) {
            return $this->deny();
        }
    }
	
	public function index()
	{
	    if(!Entrust::can('wechat.admin')) {
	        return $this->deny();
	    }
	    
	    return $this->view('index');
	}
	
	public function getParams()
	{
	    if(!Entrust::can('wechat.admin.params')) {
	        return $this->deny();
	    }
	    
	    // 获取微信接口参数
	    $options = WechatParamModel::all();;
	    foreach ($options as $so) {
	        $data[$so['name']] = $so['value'];
	    }
	    
	    return $this->view('params',compact('data'));
	}
	
	public function putParams(Request $request)
	{
	    if(!Entrust::can('wechat.admin.params')) {
	        return $this->deny();
	    }
	    
	    $data = $request->input('data');
	    if ($data && is_array($data)) {
	        WechatParamModel::updateParams($data);
	        return redirect()->to(site_path('admin/params', 'wechat'))->with('message', '成功更新微信配置！');
	    } else {
	        return redirect()->back()->with('fail', '提交数据异常！');
	    }
	}
}