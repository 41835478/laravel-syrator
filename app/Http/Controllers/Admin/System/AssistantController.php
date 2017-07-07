<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use Syrator\Cache\DataCache;

class AssistantController extends BackController
{
    /**
     * 重建系统缓存
     * 更新内容或者刚安装完本CMS之后，如果数据显示异常，请执行本方法
     *
     * @return Response
     */
    public function getRebuildCache(Request $request)
    {
        if(!Entrust::can('admin.system.cache')) {
            return deny();
        }
        
        $isCache = $request->input('isCache');
        
        if ($isCache=='on') {
            DataCache::cacheStatic();
            DataCache::cachePermission();
            return $this->view('system.cache.index')->with('message', '重建缓存成功！');            
        }
        
        return $this->view('system.cache.index');
    }
}
