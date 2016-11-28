<?php

namespace App\Http\Controllers\API\Material;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use App\Repositories\MaterialRepository;

class ApiMaterialController extends ApiBaseController
{
    public function __construct(MaterialRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * @SWG\Get(
     *   path="/material/list",
     *   summary="获取所有的材料列表",
     *   tags={"Material"},
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
        
        $listMaterial = $this->repository->index();

        return self::responseSuccess('成功',$listMaterial);
    }
    
    /**
     * @SWG\Get(
     *   path="/material/getcatalogs",
     *   summary="获取所有的材料分类列表",
     *   tags={"Material"},
     *   @SWG\Parameter(name="format_type", in="query", required=false, type="string", description="返回数据格式  tree:树形结构的json list:单纯的列表结构"),
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
    public function getCatalogs(Request $request)
    {
        // 获取参数
        $param = [
            'format_type' => $request->input('format_type'),
        ];
        
        // 参数检测
        if (empty(e($param['format_type']))) {
            $param['format_type'] = 'tree';
        }
        
        $listMaterial = $this->repository->getCatalogs($param);
    
        return self::responseSuccess('成功',$listMaterial);
    }
}
