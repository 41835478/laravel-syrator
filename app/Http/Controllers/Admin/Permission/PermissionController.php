<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\PermissionRequest;
use App\Model\PermissionModel;

use Syrator\Data\SyratorModel;

class PermissionController extends BackController
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        parent::__construct();
        $this->role = $role;
        
        if(!Entrust::can('admin.permission.permission')) {
            $this->middleware('deny');
        }
    }

    public function index(Request $request)
    { 
        if(!Entrust::can('admin.permission.permission')) {
            return deny();
        }
        
        $permissions = $this->role->permissions();
        return $this->view('permission.permission.index', compact('permissions'));
    }
    
    public function create()
    {
        if(!Entrust::can('admin.permission.permission.create')) {
            return deny();
        }
        
        $model = new PermissionModel();
        $editStruct = SyratorModel::getEditStructsTools($model);
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        if (isset($editStruct['pid'])) {
            $editStruct['pid']->is_editable = false;
        }
        
        return $this->view('permission.permission.create', compact('editStruct'));
    }
    
    public function store(PermissionRequest $request)
    {
        if(!Entrust::can('admin.permission.permission.create')) {
            return deny();
        }
        
        $data = $request->all();
        $permission = new PermissionModel();
        
        $permission->name = e($data['name']);
        $permission->display_name = e($data['display_name']);
        if (array_key_exists('description', $data)) {
            $permission->description = e($data['description']) ;
        }
        
        if ($permission->save()) {
            return redirect()->to(site_path('permission/permission', 'admin'))->with('message', '成功新增权限！');            
        }
        
        return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
    }
    
    public function edit($id)
    {
        if(!Entrust::can('admin.permission.permission.edit')) {
            return deny();
        }
        
        $permission = PermissionModel::findOrfail($id);

        $editStruct = SyratorModel::getEditStructsTools($permission);
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        if (isset($editStruct['pid'])) {
            $editStruct['pid']->is_editable = false;
        }
    
        return $this->view('permission.permission.edit', compact('permission', 'editStruct'));
    }
    
    public function update(PermissionRequest $request, $id)
    {
        if(!Entrust::can('admin.permission.permission.edit')) {
            return deny();
        }
        
        $data = $request->all();
        
        $permission = PermissionModel::findOrfail($id);
        
        $permission->name = e($data['name']);
        $permission->display_name = e($data['display_name']);
        if (array_key_exists('description', $data)) {
            $permission->description = e($data['description']) ;
        }
        
        if ($permission->save()) {
            return redirect()->to(site_path('permission/permission', 'admin'))->with('message', '修改权限成功！');            
        }
        
        return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
    }
    
    public function show($id)
    {
        if(!Entrust::can('admin.permission.permission.show')) {
            return deny();
        }
        
        $permission = PermissionModel::findOrfail($id);
    
        return $this->view('permission.permission.show', compact('permission'));
    }
    
    public function remove(Request $request)
    {    
        if(!Entrust::can('admin.permission.permission.remove')) {
            return deny();
        }
        
        $delId = $request->input('delId');
    
        $permission = PermissionModel::findOrfail($delId);
        if (!empty($permission)) {
            if ($permission->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该角色不存在，或已经被删除了！";
        }
    
        return $rth;
    }
    
    public function removeBatch(Request $request)
    {      
        if(!Entrust::can('admin.system.theme.remove')) {
            return deny();
        }
    
        $idsstr = $request->input('delId');
        $ids = explode(",",$idsstr);
        if (PermissionModel::whereIn('id', $ids)->delete()) {
            $rth['code'] = "200";
            $rth['message'] = "删除成功";
        } else {
            $rth['code'] = "500";
            $rth['message'] = "删除失败";
        }
    
        return $rth;
    }
}
