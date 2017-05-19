<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Zizaco\Entrust\EntrustFacade as Entrust;

/**
 * 管理后台共用控制器
 * CommonController
 *
 */
class BackController extends Controller
{    
    // UI主题
    protected $theme = "admin.";

    public function __construct()
    {
        if(!Entrust::hasRole('Admin') && !Entrust::can('admin')) {
            $this->middleware('deny');
        }
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
