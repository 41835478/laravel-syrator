<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Loggers\SystemLogger;
use App\Repositories\UserRepository;

/**
 * 管理员(用户)资源控制器
 *
 */
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
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
        $roles = $this->user->role();
        return $this->view('permission.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
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
        $user = $this->user->edit($id);

        $roles = $this->user->role();

        // 一个用户可以拥有多个角色，但在本内容管理框架系统中，限定只能一个用户对应一个角色
        $own_role = $this->user->getRole($user);

        if (is_null($own_role)) {
            // 新建的管理员用户可能不存在关联role模型
            $own_role = $this->user->fakeRole();  // 伪造一个Role对象，以免报错
        }
        return $this->view('permission.user.edit', compact('user', 'roles', 'own_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
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
}
