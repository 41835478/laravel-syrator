<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Loggers\SystemLogger;
use App\Repositories\MemberRepository;

/**
 * 会员控制器
 *
 */
class MemberController extends BackController
{
    protected $member;

    public function __construct(MemberRepository $member)
    {
        parent::__construct();
        $this->member = $member;
    }

    public function index(Request $request)
    {
        $data = [
            'm_group' => $request->input('m_group'),
        ];
        $members = $this->member->index($data);
        $groups = $this->member->indexRank();

        return $this->view('member.index', compact('members', 'groups'));
    }
    
    public function create()
    {
        $roles = $this->member->indexRank();
        return $this->view('member.create', compact('members', 'roles'));
    }

    public function store(MemberRequest $request)
    {
        $data = $request->all();
        $manager = $this->member->store($data);
        if ($manager->id) {  
            // 添加成功
            // 记录系统日志，这里并未使用事件监听来记录日志
            $log = [
                'user_id' => auth()->user()->id,
                'type'    => 'management',
                'content' => '管理员：成功新增一名会员'.$manager->phone.'<'.$manager->email.'>。',
            ];
            SystemLogger::write($log);

            return redirect()->to(site_path('member', 'admin'))->with('message', '成功新增会员！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        $member = $this->member->edit($id);
        $roles = $this->member->indexRank();
        return $this->view('member.edit', compact('member', 'roles'));
    }

    public function update(MemberRequest $request, $id)
    {
        $data = $request->all();
        $this->member->update($id, $data);
        
        return redirect()->to(site_path('member', 'admin'))->with('message', '修改会员成功！');
    }
    
    public function show($id)
    {
        $member = $this->member->edit($id);
        return $this->view('member.show', compact('member'));
    }
    
    public function remove(Request $request)
    {
        $delId = $request->input('delId');
    
        $member = $this->member->edit($delId);
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
