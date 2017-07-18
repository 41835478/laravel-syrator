<?php namespace Modules\Diary\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class BaseController extends Controller {
    
    // 主题
    protected $theme = "";
    protected $member;
    
    public function __construct()
    {
        $this->member = auth()->guard('member')->user();
    }
    
    public function deny()
    {
        return response()->view('cms::errors.403');
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
    
    public function backFail($request, $message)
    {
        return redirect()->back()->withInput($request->input())->with('fail', $message);
    }
    
    public function backSuccess($request, $message)
    {
        return redirect()->back()->withInput($request->input())->with('message', $message);
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