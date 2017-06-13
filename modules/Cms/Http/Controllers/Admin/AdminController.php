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
}