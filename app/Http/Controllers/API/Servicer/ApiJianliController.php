<?php

namespace App\Http\Controllers\API\Servicer;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use App\Repositories\JianliRepository;

class ApiJianliController extends ApiBaseController
{
    public function __construct(JianliRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * @SWG\Get(
     *   path="/servicer/jianli/list",
     *   summary="获取所有的工程师列表",
     *   tags={"Servicer"},
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
    public function getList(Request $request)
    {
        // 获取参数
        $param = [
            'sortby' => $request->input('sortby'),
            'orderby' => $request->input('orderby'),
        ];
        
        // 参数检测
        if (empty(e($param['sortby']))) {
            $param['sortby'] = "default";
        }
        
        if (empty(e($param['orderby']))) {
            $param['orderby'] = "desc";
        }
        
        $listJian = $this->repository->index();

        return self::responseSuccess('成功',$listJian);
    }
}
