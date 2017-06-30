<?php namespace Modules\Cms\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;
use Zizaco\Entrust\EntrustFacade as Entrust;

class AdminController extends Controller {
    
    // 主题
    protected $theme = "cms::admin.";

    public function __construct()
    {
        if(!Entrust::can('cms.admin')) {
            return $this->deny();
        }
    }

	public function deny()
	{
	    return response()->view('cms::admin.errors.403');
	}
	
	public function view($view = null, $data = [], $mergeData = [])
	{
	    return view($this->theme.$view, $data, $mergeData);
	}
    
    public function backFail($request, $message)
    {
        return redirect()->back()->withInput($request->input())->with('fail', $message);
    }
    
    public function toSuccess($url, $message)
    {
        return redirect()->to($url)->with('message', $message);
    }
    
    public function responseSuccess($message,$data) {
        $rtn['code'] = '200';
        $rtn['description'] = $message;
        $rtn['data'] = $data;
        return response(json_encode($rtn), 200)->header('Content-Type', 'application/json');
    }
    
    public function responseFailed($code,$message) {
        $rtn['code'] = $code;
        $rtn['description'] = $message;
        $rtn['data'] = array();
        return response(json_encode($rtn), 299)->header('Content-Type', 'application/json');
    }
}