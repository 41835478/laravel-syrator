<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Repositories\SystemRepository;
use Syrator\Cache\DataCache;

/**
 * 系统配置控制器
 *
 */
class OptionController extends BackController
{
    /**
     * The SystemRepository instance.
     *
     * @var App\Repositories\SystemRepository
     */
    protected $system;

    public function __construct(SystemRepository $system)
    {
        parent::__construct();
        $this->system = $system;
        
        if(!Entrust::can('admin.system.option')) {
            $this->middleware('deny');
        }
    }

    public function getOption()
    {
        if(!Entrust::can('admin.system.option')) {
            return deny();
        }
        
        $system_options = $this->system->getAllOptions();
        foreach ($system_options as $so) {
            $data[$so['name']] = $so['value'];
        }

        return $this->view('system.option.index', compact('data'));
    }

    public function putOption(Request $request)
    {
        if(!Entrust::can('admin.system.option')) {
            return deny();
        }
        
        $data = $request->input('data');
        if ($data && is_array($data)) {
            $this->system->updateOptions($data);
            //更新系统静态缓存
            DataCache::cacheStatic();
            return redirect()->back()->with('message', '成功更新系统配置！');
        } else {
            return redirect()->back()->with('fail', '提交过来的数据异常！');
        }
    }
}
