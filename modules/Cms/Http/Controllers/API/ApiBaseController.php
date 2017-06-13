<?php

namespace Modules\Cms\Http\Controllers\API;

use App\Http\Controllers\Controller;

/**
 * API通用控制器
 * ApiBaseController
 *
 */
class ApiBaseController extends Controller
{    
    public function __construct() {
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
