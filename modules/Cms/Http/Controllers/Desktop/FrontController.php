<?php namespace Modules\Cms\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;

/**
 * 桌面站点前台共用控制器
 * FrontController
 *
 */
class FrontController extends Controller
{
    // 主题
    protected $theme = "cms::desktop.";

    public function __construct()
    {
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
    
    public function toSuccess($url, $message)
    {
        return redirect()->to($url)->with('message', $message);
    }
}
