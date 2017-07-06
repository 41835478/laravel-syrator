<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use App\Loggers\SystemLogger;

use Syrator\Data\SyratorModel;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Model\MemberModel;
use App\Repositories\MemberRepository;

class MemberController extends BackController
{
    protected $member;

    public function __construct(MemberRepository $member)
    {
        parent::__construct();
        $this->member = $member;
        
        if(!Entrust::can('admin.member.member')) {
            $this->middleware('deny');
        }
    }

    public function index(Request $request)
    {        
        if(!Entrust::can('admin.member.member')) {
            return deny();
        }
        
        $data = [
            'm_group' => $request->input('m_group'),
        ];
        $members = $this->member->index($data);
        $groups = $this->member->indexRank();

        return $this->view('member.member.index', compact('members', 'groups'));
    }
    
    public function create()
    {        
        if(!Entrust::can('admin.member.member.create')) {
            return deny();
        }
        
        $model = new MemberModel();
        $editStruct = SyratorModel::getEditStructsTools($model);
       
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        
        $roles = $this->member->indexRank();
        return $this->view('member.member.create', compact('members', 'roles', 'editStruct'));
    }

    public function store(MemberRequest $request)
    {      
        if(!Entrust::can('admin.member.member.create')) {
            return deny();
        }
        
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

            return redirect()->to(site_path('member/member', 'admin'))->with('message', '成功新增会员！');

        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {      
        if(!Entrust::can('admin.member.member.edit')) {
            return deny();
        }
        
        $member = $this->member->edit($id);
        $roles = $this->member->indexRank();
        return $this->view('member.member.edit', compact('member', 'roles'));
    }

    public function update(MemberRequest $request, $id)
    {      
        if(!Entrust::can('admin.member.member.edit')) {
            return deny();
        }
        
        $data = $request->all();
        $this->member->update($id, $data);
        
        return redirect()->to(site_path('member/member', 'admin'))->with('message', '修改会员成功！');
    }
    
    public function show($id)
    {      
        if(!Entrust::can('admin.member.member.show')) {
            return deny();
        }
        
        $member = $this->member->edit($id);
        return $this->view('member.member.show', compact('member'));
    }
    
    public function remove(Request $request)
    {      
        if(!Entrust::can('admin.member.member.remove')) {
            return deny();
        }
        
        $delId = $request->input('delId');
    
        $member = $this->member->edit($delId);
        if (!empty($member)) {            
            if ($member->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该会员不存在，或已经被删除了！";
        }
    
        return $rth;
    }
    
    public function removeBatch(Request $request)
    {      
        if(!Entrust::can('admin.member.member.remove')) {
            return deny();
        }
    
        $idsstr = $request->input('delId');
        $ids = explode(",",$idsstr);
        if (MemberModel::whereIn('id', $ids)->delete()) {
            $rth['code'] = "200";
            $rth['message'] = "删除成功";
        } else {
            $rth['code'] = "500";
            $rth['message'] = "删除失败";
        }
    
        return $rth;
    }
}
