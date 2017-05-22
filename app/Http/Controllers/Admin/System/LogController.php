<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Repositories\SystemRepository;

/**
 * 系统日志控制器
 *
 */
class LogController extends BackController
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
        
        if(!Entrust::can('admin.system.log')) {
            $this->middleware('deny');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can('admin.system.log')) {
            return deny();
        }
        
        $system_logs = $this->system->indexAll();
        return $this->view('system.log.index', compact('system_logs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if(!Entrust::can('admin.system.log.show')) {
            return deny();
        }
        
        $sys_log = $this->system->getById($id);
        is_null($sys_log) && abort(404);
        return $this->view('system.log.show', compact('sys_log'));
    }
}
