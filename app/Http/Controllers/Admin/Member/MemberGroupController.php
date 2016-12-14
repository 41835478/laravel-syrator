<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Http\Requests\MemberGroupRequest;
use App\Loggers\SystemLogger;
use App\Repositories\MemberRepository;

/**
 * 会员控制器
 *
 */
class MemberGroupController extends BackController
{
    protected $member;

    public function __construct(MemberRepository $member)
    {
        parent::__construct();
        $this->member = $member;
    }

    public function index(Request $request)
    {
        $groups = $this->member->indexRank();
        return $this->view('member.group.index', compact('groups'));
    }

    public function create()
    {
        return $this->view('member.group.create');
    }

    public function store(MemberGroupRequest $request)
    {
        $data = $request->all();
        $manager = $this->member->storeRank($data);
        if ($manager->id) {  
            // 添加成功
            // 记录系统日志，这里并未使用事件监听来记录日志
            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增会员分组'.$manager->name.'<'.$manager->email.'>。',
            ];
            SystemLogger::write($log);

            return redirect()->to(site_path('member/group', 'admin'))->with('message', '成功新增会员分组！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        $group = $this->member->editRank($id);
        return $this->view('member.group.edit', compact('group'));
    }

    public function update(MemberGroupRequest $request, $id)
    {
        $data = $request->all();
        $this->member->updateRank($id, $data);        
        return redirect()->to(site_path('member/group', 'admin'))->with('message', '修改会员分组成功！');
    }
    
    public function show($id)
    {
        $user = $this->user->edit($id);
        $own_role = $this->user->getRole($user);
        if (is_null($own_role)) {
            // 新建的管理员用户可能不存在关联role模型
            $own_role = $this->user->fakeRole();  // 伪造一个Role对象，以免报错
        }
        return view('admin.back.user.show', compact('user', 'own_role'));
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
