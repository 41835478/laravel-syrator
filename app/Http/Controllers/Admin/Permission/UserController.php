<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Loggers\SystemLogger;
use App\Repositories\UserRepository;
use App\Model\UserModel;

use Syrator\Data\SyratorModel;
use Syrator\Data\SyratorEditProperty;

class UserController extends BackController
{
    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
        
        if(!Entrust::can('admin.permission.user')) {
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
        if(!Entrust::can('admin.permission.user')) {
            return deny();
        }
        
        $data = [
            's_name' => $request->input('s_name'),
            's_phone' => $request->input('s_phone'),
            's_role' => $request->input('s_role'),
        ];
        $users = $this->user->index($data);
        
        $roles = $this->user->role();

        return $this->view('permission.user.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!Entrust::can('admin.permission.user.create')) {
            return deny();
        }
        
        $roles = $this->user->role();
        
        $model = new UserModel();
        $editStruct = array();
        $editStructTemp = SyratorModel::getEditStructsTools($model);
        if (isset($editStructTemp['username'])) {
            $editStructTemp['username']->is_request = true;
            $editStruct['username'] = $editStructTemp['username'];
        }
        if (isset($editStructTemp['email'])) {
            $editStructTemp['email']->is_request = true;
            $editStruct['email'] = $editStructTemp['email'];
        }
        if (isset($editStructTemp['password'])) {
            $editStructTemp['password']->type = "password";
            $editStructTemp['password']->autocomplete = "off";
            $editStructTemp['password']->is_request = true;
            $editStruct['password'] = $editStructTemp['password'];
        }
        if (isset($editStructTemp['password_confirmation'])) {
            $editStructTemp['password_confirmation']->is_request = true;
            $editStruct['password_confirmation'] = $editStructTemp['password_confirmation'];
        } else {
            $editProperty = new SyratorEditProperty();
            $editProperty->name = 'password_confirmation';
            $editProperty->alias = '确认密码';
            $editProperty->type = "password";
            $editProperty->autocomplete = "off";
            $editProperty->is_request = true;
            $editStruct['password_confirmation'] = $editProperty;
        }                
        if (isset($editStructTemp['role'])) {
            $editStructTemp['role']->is_request = true;
            $editStruct['role'] = $editStructTemp['role'];
        } else {
            $editProperty = new SyratorEditProperty();
            $editProperty->name = 'role';
            $editProperty->alias = '角色';
            $editProperty->type = "select";
            $editProperty->is_request = true;
            $editProperty->dictionary = array();            
            foreach ($roles as $k => $value) {
                $editProperty->dictionary[$value->id] = $value->name.'('.$value->display_name.')';
            }
            
            $editStruct['role'] = $editProperty;
        }
        
        if (isset($editStructTemp['realname'])) {
            $editStructTemp['realname']->is_request = true;
            $editStruct['realname'] = $editStructTemp['realname'];
        }
        if (isset($editStructTemp['nickname'])) {
            $editStructTemp['nickname']->is_request = true;
            $editStruct['nickname'] = $editStructTemp['nickname'];
        }
        if (isset($editStructTemp['phone'])) {
            $editStructTemp['phone']->is_request = true;
            $editStruct['phone'] = $editStructTemp['phone'];
        }
        if (isset($editStructTemp['is_locked'])) {
            $editStructTemp['is_locked']->type = "radio";
            $editStructTemp['is_locked']->alias = '是否锁定';
            $editStructTemp['is_locked']->dictionary['0'] = '否';
            $editStructTemp['is_locked']->dictionary['1'] = '是';
            $editStructTemp['is_locked']->value = 0;
            $editStruct['is_locked'] = $editStructTemp['is_locked'];
        }
        
        if (isset($editStruct['remember_token'])) {
            $editStruct['remember_token']->is_editable = false;
        }
        return $this->view('permission.user.create', compact('roles', 'editStruct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        if(!Entrust::can('admin.permission.user.create')) {
            return deny();
        }
        
        $data = $request->all();
        $manager = $this->user->store($data);
        if ($manager->id) {  
            // 添加成功
            // 记录系统日志，这里并未使用事件监听来记录日志
            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增一名管理用户'.$manager->username.'<'.$manager->email.'>。',
            ];
            SystemLogger::write($log);

            return redirect()->to(site_path('permission/user', 'admin'))->with('message', '成功新增管理员！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!Entrust::can('admin.permission.user.edit')) {
            return deny();
        }
        
        $user = $this->user->edit($id);

        $roles = $this->user->role();

        // 一个用户可以拥有多个角色，但在本内容管理框架系统中，限定只能一个用户对应一个角色
        $own_role = $this->user->getRole($user);

        if (is_null($own_role)) {
            // 新建的管理员用户可能不存在关联role模型
            $own_role = $this->user->fakeRole();  // 伪造一个Role对象，以免报错
        }
        
        $editStruct = array();
        $editStructTemp = SyratorModel::getEditStructsTools($user);
        if (isset($editStructTemp['username'])) {
            $editStructTemp['username']->is_request = true;
            $editStructTemp['username']->is_editable = false;
            $editStructTemp['username']->show_type = "readonly";
            $editStructTemp['username']->help = "（账号创建后无法修改）";
            $editStruct['username'] = $editStructTemp['username'];
        }
        if (isset($editStructTemp['email'])) {
            $editStructTemp['email']->is_request = true;
            $editStruct['email'] = $editStructTemp['email'];
        }
        if (isset($editStructTemp['password'])) {
            $editStructTemp['password']->type = "password";
            $editStructTemp['password']->autocomplete = "off";
            $editStructTemp['password']->is_request = true;
            $editStructTemp['password']->value = "";
            $editStruct['password'] = $editStructTemp['password'];
        }
        if (isset($editStructTemp['password_confirmation'])) {
            $editStructTemp['password_confirmation']->is_request = true;
            $editStruct['password_confirmation'] = $editStructTemp['password_confirmation'];
        } else {
            $editProperty = new SyratorEditProperty();
            $editProperty->name = 'password_confirmation';
            $editProperty->alias = '确认密码';
            $editProperty->type = "password";
            $editProperty->autocomplete = "off";
            $editProperty->is_request = true;
            $editStruct['password_confirmation'] = $editProperty;
        }
        if (isset($editStructTemp['role'])) {
            $editStructTemp['role']->is_request = true;
            $editStruct['role'] = $editStructTemp['role'];
        } else {
            $editProperty = new SyratorEditProperty();
            $editProperty->name = 'role';
            $editProperty->alias = '角色';
            $editProperty->type = "select";
            $editProperty->is_request = true;
            $editProperty->value = $own_role->id;
            $editProperty->dictionary = array();
            foreach ($roles as $k => $value) {
                $editProperty->dictionary[$value->id] = $value->name.'('.$value->display_name.')';
            }
        
            $editStruct['role'] = $editProperty;
        }
        
        if (isset($editStructTemp['realname'])) {
            $editStructTemp['realname']->is_request = true;
            $editStruct['realname'] = $editStructTemp['realname'];
        }
        if (isset($editStructTemp['nickname'])) {
            $editStructTemp['nickname']->is_request = true;
            $editStruct['nickname'] = $editStructTemp['nickname'];
        }
        if (isset($editStructTemp['phone'])) {
            $editStructTemp['phone']->is_request = true;
            $editStruct['phone'] = $editStructTemp['phone'];
        }
        if (isset($editStructTemp['is_locked'])) {
            $editStructTemp['is_locked']->type = "radio";
            $editStructTemp['is_locked']->alias = '是否锁定';
            $editStructTemp['is_locked']->dictionary['0'] = '否';
            $editStructTemp['is_locked']->dictionary['1'] = '是';
            $editStruct['is_locked'] = $editStructTemp['is_locked'];
        }
        
        if (isset($editStruct['remember_token'])) {
            $editStruct['remember_token']->is_editable = false;
        }
        
        return $this->view('permission.user.edit', compact('user', 'roles', 'own_role', 'editStruct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        if(!Entrust::can('admin.permission.user.edit')) {
            return deny();
        }
        
        $data = $request->all();
        $this->user->update($id, $data);

        /*
        $log = [
            'user_id' => auth()->user()->id,
            'url'     => _route('admin:user.edit', $id),
            'type'    => 'manager',
            'content' => '管理员：超级管理员修改了id为'.$id.'的管理用户资料。',
        ];

        SystemLogger::write($log);
        */
        return redirect()->to(site_path('permission/user', 'admin'))->with('message', '修改管理员成功！');
    }
    
    public function show($id)
    {
        if(!Entrust::can('admin.permission.user.show')) {
            return deny();
        }
        
        $user = $this->user->edit($id);
        $own_role = $this->user->getRole($user);
        if (is_null($own_role)) {
            // 新建的管理员用户可能不存在关联role模型
            $own_role = $this->user->fakeRole();  // 伪造一个Role对象，以免报错
        }
        return $this->view('permission.user.show', compact('user', 'own_role'));
    }
    
    public function remove(Request $request)
    {
        if(!Entrust::can('admin.permission.user.remove')) {
            return deny();
        }
        
        $delId = $request->input('delId');
    
        $user = $this->user->edit($delId);
        if (!empty($user)) {
            if (strcasecmp($user->username,'admin') == 0) {
                $rth['code'] = "401";
                $rth['message'] = "Admin是系统用户，您无权删除！";
                return $rth;
            }
            
            if ($user->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该用户不存在，或已经被删除了！";
        }
    
        return $rth;
    }
    
    public function removeBatch(Request $request)
    {      
        if(!Entrust::can('admin.permission.user.remove')) {
            return deny();
        }
    
        $idsstr = $request->input('delId');
        $ids = explode(",",$idsstr);
        if (UserModel::whereIn('id', $ids)->delete()) {
            $rth['code'] = "200";
            $rth['message'] = "删除成功";
        } else {
            $rth['code'] = "500";
            $rth['message'] = "删除失败";
        }
    
        return $rth;
    }
}
