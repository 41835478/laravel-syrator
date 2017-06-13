<?php

namespace Modules\Cms\Http\Controllers\API\Article;

use Modules\Cms\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use Modules\Cms\Model\ArticleCatalogModel;

class ApiArticleController extends ApiBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @SWG\Post(
     *   path="/article/getcatalogs",
     *   summary="获取所有的论坛模块列表",
     *   tags={"Article"},
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
        
        if ($param['format_type'] == "tree") {        
            $catalogs = ArticleCatalogModel::recCatalogs(0);    
            return self::responseSuccess('成功',$catalogs);
        }
        
        if ($param['format_type'] == "list") {
            $catalogs = ArticleCatalogModel::all();  
            return self::responseSuccess('成功',$catalogs);
        }
        
        $catalogs = ArticleCatalogModel::recCatalogs(0);    
        return self::responseSuccess('成功',$catalogs);
    }
}
