<?php

namespace App\Http\Controllers\Admin\System\AppInfo;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Loggers\SystemLogger;

use App\Http\Requests\System\AppGuideRequest;
use App\Repositories\System\AppGuideRepository;

class AppGuideController extends BackController
{
    protected $repository;

    public function __construct(AppGuideRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        
        if(!Entrust::can('admin.system.appinfo.guide')) {
            $this->middleware('deny');
        }
    }

    public function index(Request $request)
    {
        if(!Entrust::can('admin.system.appinfo.guide')) {
            return deny();
        }
        
        $entityList = $this->repository->index();
        $countList = count($entityList);
        return $this->view('system.appinfo.guide.index', compact('entityList','countList'));
    }
    
    public function create()
    {
        if(!Entrust::can('admin.system.appinfo.guide.create')) {
            return deny();
        }
        
        return $this->view('system.appinfo.guide.create');
    }

    public function store(AppGuideRequest $request)
    {
        if(!Entrust::can('admin.system.appinfo.guide.store')) {
            return deny();
        }
        
        $data = $request->all();
        $manager = $this->repository->store($data);
        if ($manager->id) {  
            // 添加成功
            // 记录系统日志，这里并未使用事件监听来记录日志
            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增一张APP欢迎页'.$manager->phone.'<'.$manager->email.'>。',
            ];
            SystemLogger::write($log);

            return redirect()->to(site_path('system/appinfo/guide', 'admin'))->with('message', '成功新增APP欢迎页！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }
    
    public function remove(Request $request)
    {
        if(!Entrust::can('admin.system.appinfo.guide.remove')) {
            return deny();
        }
        
        $delId = $request->input('delId');
    
        $entity = $this->repository->edit($delId);
        if (!empty($entity)) {            
            if ($entity->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该会员不存在，或已经被删除了！";
        }
    
        return $rth;
    }
}
