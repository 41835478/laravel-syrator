<?php

namespace App\Http\Controllers\API\System;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use App\Model\System\AppGuideModel;

class ApiAppInfoController extends ApiBaseController
{    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @SWG\Get(
     *   tags={"System"},
     *   path="/system/app/get_guide_pages",
     *   summary="获取APP引导页信息",
     *   description="获取APP引导页信息",
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function getGuidePages(Request $request)
    {
        $listPages = AppGuideModel::where('is_show', '=', '1')->get();

        return self::responseSuccess('成功',$listPages);
    }
}
