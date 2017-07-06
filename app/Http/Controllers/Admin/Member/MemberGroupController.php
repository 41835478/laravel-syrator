<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use App\Loggers\SystemLogger;

use Illuminate\Http\Request;
use App\Http\Requests\MemberGroupRequest;
use App\Model\MemberRankModel;
use App\Repositories\MemberRepository;

class MemberGroupController extends BackController
{
    protected $member;

    public function __construct(MemberRepository $member)
    {
        parent::__construct();
        $this->member = $member;
        
        if(!Entrust::can('admin.member.group')) {
            $this->middleware('deny');
        }
    }

    public function index(Request $request)
    {        
        if(!Entrust::can('admin.member.group')) {
            return deny();
        }
        
        $groups = $this->member->indexRank();
        return $this->view('member.group.index', compact('groups'));
    }

    public function create()
    {        
        if(!Entrust::can('admin.member.group.create')) {
            return deny();
        }
        
        $model = new MemberRankModel();
        $editStruct = $model->getEditStructs();
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        return $this->view('member.group.create', compact('editStruct'));
    }

    public function store(MemberGroupRequest $request)
    {  
        if(!Entrust::can('admin.member.group.create')) {
            return deny();
        }
        
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
        if(!Entrust::can('admin.member.group.edit')) {
            return deny();
        }
        
        $group = $this->member->editRank($id);
        return $this->view('member.group.edit', compact('group'));
    }

    public function update(MemberGroupRequest $request, $id)
    {
        if(!Entrust::can('admin.member.group.edit')) {
            return deny();
        }
        
        $data = $request->all();
        $this->member->updateRank($id, $data);        
        return redirect()->to(site_path('member/group', 'admin'))->with('message', '修改会员分组成功！');
    }
    
    public function show($id)
    {
        if(!Entrust::can('admin.member.group.show')) {
            return deny();
        }
        
        $group = $this->member->editRank($id);
        return $this->view('member.group.show', compact('group'));
    }
    
    public function remove(Request $request)
    {
        if(!Entrust::can('admin.member.group.remove')) {
            return deny();
        }
        
        $delId = $request->input('delId');    
        $group = $this->member->editRank($delId);
        if ($group->hasMembers()) {
            $rth['code'] = "202";
            $rth['message'] = "该会员分组下尚有会员，无法删除！";
            return $rth;
        }
        
        if (!empty($group)) {            
            if ($group->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该会员分组不存在，或已经被删除了！";
        }
    
        return $rth;
    }
    
    public function removeBatch(Request $request)
    {
        if(!Entrust::can('admin.member.group.remove')) {
            return deny();
        }
    
        $idsstr = $request->input('delId');
        $ids = explode(",",$idsstr);
        if (MemberRankModel::whereIn('id', $ids)->delete()) {
            $rth['code'] = "200";
            $rth['message'] = "删除成功";
        } else {
            $rth['code'] = "500";
            $rth['message'] = "删除失败";
        }
    
        return $rth;
    }
}
