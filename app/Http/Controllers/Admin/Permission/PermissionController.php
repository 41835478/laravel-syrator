<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\PermissionRequest;
use App\Model\PermissionModel;
use Gate;

/**
 * 权限控制器
 *
 */
class PermissionController extends BackController
{

    /**
     * The RoleRepository instance.
     *
     * @var App\Repositories\RoleRepository
     */
    protected $role;

    public function __construct(RoleRepository $role)
    {
        parent::__construct();
        $this->role = $role;
    }

    public function index(Request $request)
    { 
        $permissions = $this->role->permissions();
        return view('admin.back.permission.permission.index', compact('permissions'));
    }
    
    public function create()
    {
        return view('admin.back.permission.permission.create');
    }
    
    public function store(PermissionRequest $request)
    {
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
        $permission = PermissionModel::findOrfail($id);
    
        return view('admin.back.permission.permission.edit', compact('permission'));
    }
    
    public function update(PermissionRequest $request, $id)
    {
        echo "HH";
        exit();
        
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
        $permission = PermissionModel::findOrfail($id);
    
        return view('admin.back.permission.permission.show', compact('permission'));
    }
    
    public function remove(Request $request)
    {    
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
}
