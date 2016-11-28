<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Repositories\SystemRepository;
use Gate;

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
        if (Gate::denies('@log')) {
            $this->middleware('deny403');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $system_logs = $this->system->indexAll();

        return view('admin.back.system.log.index', compact('system_logs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        if (Gate::denies('log-show')) {
            return deny();
        }
        $sys_log = $this->system->getById($id);
        is_null($sys_log) && abort(404);
        return view('admin.back.system.log.show', compact('sys_log'));
    }
}
