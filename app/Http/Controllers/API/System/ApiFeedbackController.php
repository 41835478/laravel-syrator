<?php

namespace App\Http\Controllers\API\System;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;
use App\Model\FeedbackModel;

class ApiFeedbackController extends ApiBaseController
{    
    /**
     * @SWG\Post(
     *   path="/system/dofeedback",
     *   summary="提交意见反馈",
     *   tags={"System"},
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
    public function doFeedback(Request $request)
    {
        // 获取参数
        $param = [
            'user_id' => $request->input('user_id'),
            'content' => $request->input('content'),
            'images_urls' => $request->input('images_urls'),
        ];
        
        // 参数检测
        if (empty(e($param['user_id']))) {
            return self::responseFailed('301','用户id不能为空');
        }
        
        $objFeedback = new FeedbackModel();
        $objFeedback->user_id = e($param['user_id']);
        $objFeedback->content = e($param['content']);
        $objFeedback->images_urls = e($param['images_urls']);
        if ($objFeedback->save()) {
            return self::responseSuccess('成功',$objFeedback);
        }

        return self::responseFailed('500','提交失败');
    }
}
