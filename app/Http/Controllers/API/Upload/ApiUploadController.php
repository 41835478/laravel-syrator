<?php

namespace App\Http\Controllers\API\Upload;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

class ApiUploadController extends ApiBaseController
{       
    /**
     * @SWG\Post(
     *   tags={"Upload"},
     *   path="/upload/single",
     *   summary="单文件上传",
     *   description="单个文件上传接口",
     *   @SWG\Parameter(name="file", in="query", required=true, type="string", description="文件二进制流"),
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
    public function uploadSingle(Request $request)
    {   
        if ($request->ajax()) {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $data = $request->all();
                $rules = [
                    'picture'    => 'max:5120',
                ];
                
                $realPath = $file->getRealPath();
                $destPath = 'uploads/content/';
                $savePath = $destPath.''.date('Ymd', time());
                is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();              
    
                $check_ext = in_array($ext, ['jpg', 'png', 'gif', 'bmp'], true);
    
//                 if ($check_ext) {
                if (1) {
                    $uniqid = uniqid().'_'.date('s');
                    $oFile = $uniqid.'o.'.$ext;
                    $rFile = $uniqid.'rw300.'.$ext;
    
                    $fullfilename = '/'.$savePath.'/'.$oFile;  //原始完整路径
                    if ($file->isValid()) {
                        $uploadSuccess = $file->move($savePath, $oFile);  //移动文件
    
                        $user = auth()->user();
                        $file = [
                            'original_file_name' => $name,  //添加文件操作信息，原始文件名
                            'uploaded_full_file_name' => $fullfilename,  //添加文件操作信息，上传之后存储在服务器上的原始完整路径
                        ];   
                        $oFilePath = $savePath.'/'.$oFile;
                        $rFilePath = $savePath.'/'.$rFile;
    
                        return self::responseSuccess('上传成功',$file);
                    } else {
                        return self::responseFailed('303','文件校验失败');
                    }
                } else {
                    return self::responseFailed('302','文件类型不允许,请上传常规的图片（bmp|gif|jpg|png）文件');
                }
            }

            return self::responseFailed('301','不存在待上传的文件');
        } else {
            //非ajax请求抛出异常
            return self::responseFailed('501','非法请求，不予处理！');
        }
    }
}
