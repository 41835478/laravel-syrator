<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Repositories\ThemeRepository;
use App\Http\Requests\ThemeRequest;
use App\Loggers\SystemLogger;

/**
 * 前台模板控制器
 *
 */
class ThemeController extends BackController
{
    protected $repository;
    
    public function __construct(ThemeRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $themes = $this->repository->index();

        return $this->view('system.theme.index', compact('themes'));
    }
    
    public function create()
    {
        return $this->view('system.theme.create');
    }
    
    public function store(ThemeRequest $request)
    {
        $data = $request->all();
        $theme = $this->repository->store($data);        
        if ($theme->id) {
            // 添加成功
            // 记录系统日志，这里并未使用事件监听来记录日志
            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增模板'.$theme->code.'<'.$theme->name.'>。',
            ];
            SystemLogger::write($log);
            
            return redirect()->to(site_path('system/theme', 'admin'))->with('message', '成功新增模板！');            
        }
        
        return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
    }
    
    public function edit($id)
    {
        $theme = $this->repository->edit($id);
        return $this->view('system.theme.edit', compact('theme'));
    }
    
    public function update(ThemeRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($id, $data);
    
        return redirect()->to(site_path('system/theme', 'admin'))->with('message', '修改模板成功！');
    }
    
    public function show($id)
    {
        $theme = $this->repository->edit($id);
        return $this->view('system.theme.show', compact('theme'));
    }
    
    public function remove(Request $request)
    {
        $delId = $request->input('delId');
    
        $theme = $this->repository->edit($delId);
        if (!empty($theme)) {    
            if ($theme->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该模板不存在，或已经被删除了！";
        }
    
        return $rth;
    }
}
