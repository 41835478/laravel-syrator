<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use App\Model\RoleModel;
use Gate;

/**
 * 角色控制器
 *
 */
class RoleController extends BackController
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

        if (Gate::denies('@role')) {
            $this->middleware('deny403');
        }
    }

    public function index()
    {
        $roles = $this->role->index();
        return view('admin.back.permission.role.index', compact('roles'));
    }

    public function create()
    {
        if (Gate::denies('role-write')) {
            return deny();
        }
        $permissions = $this->role->permissions();  //获取所有权限许可
        return view('admin.back.permission.role.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        //
        if (Gate::denies('role-write')) {
            return deny();
        }
        $data = $request->all();
        $role = $this->role->store($data);
        if ($role->id) {  
            //添加成功
            return redirect()->to(site_path('permission/role', 'admin'))->with('message', '成功新增角色！');
        } else {  
            //添加失败
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        //
        if (Gate::denies('role-write')) {
            return deny();
        }
        $role = $this->role->edit($id);
        $permissions = $this->role->permissions();
        $cans = $this->role->getRoleCans($role);

        return view('admin.back.permission.role.edit', compact('role', 'permissions', 'cans'));
    }

    public function update(RoleRequest $request, $id)
    {
        if (Gate::denies('role-write')) {
            return deny();
        }
        $data = $request->all();
        $this->role->update($id, $data);
        return redirect()->to(site_path('permission/role', 'admin'))->with('message', '修改角色成功！');
    }
    
    public function show($id)
    {
        $role = $this->role->edit($id);
        $permissions = $this->role->permissions();
        $cans = $this->role->getRoleCans($role);
    
        return view('admin.back.permission.role.show', compact('role', 'permissions', 'cans'));
    }
    
    public function remove(Request $request)
    {        
        $delId = $request->input('delId');

        $objItem = RoleModel::find($delId);
        if (!empty($objItem)) {
            if ($objItem->delete()) {
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
