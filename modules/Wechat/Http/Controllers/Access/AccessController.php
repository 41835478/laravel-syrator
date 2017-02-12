<?php 

namespace Modules\Wechat\Http\Controllers\Access;

use Pingpong\Modules\Routing\Controller;

use Illuminate\Http\Request;
use Log;

class AccessController extends Controller {
    
    public function __construct()
    {
    }
	
	public function access(Request $request, $uniqid = null)
	{
	    if (!$request->has('signature') || !$request->has('timestamp') || !$request->has('nonce')) {
	        Log::info(trans('wechat::wechat.illegal_access'));
	        return;
	    }
	    
	    $signature = $request->input('signature');
	    $timestamp = $request->input('timestamp');
	    $nonce = $request->input('nonce');
	    $echostr = $request->input('echostr');
	    
	    Log::info($signature);
	    Log::info($timestamp);
	    Log::info($nonce);
	    Log::info($echostr);
	    
	   // 校验通过后直接返回请求中的echostr
       return $request->input('echostr');
	}
}