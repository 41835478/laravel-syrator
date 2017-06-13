<?php

namespace Modules\Cms\Http\Controllers\API\Forum;

use Modules\Cms\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use Modules\Cms\Repositories\ForumTitleRepository;

class ApiArticleController extends ApiBaseController
{
    public function __construct(ForumTitleRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * @SWG\Post(
     *   path="/forum/list",
     *   summary="获取所有的论坛文章列表",
     *   tags={"Forum"},
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
        
        $listForumTitle= $this->repository->index();

        return self::responseSuccess('成功',$listForumTitle);
    }
    
    /**
     * @SWG\Post(
     *   path="/forum/getcatalogs",
     *   summary="获取所有的论坛模块列表",
     *   tags={"Forum"},
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
    
        $catalogs = $this->repository->getCatalogs($param);
    
        return self::responseSuccess('成功',$catalogs);
    }
}
