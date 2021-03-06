<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

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
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '名称不能为空');
        }
        
        $entity = new MemberRankModel();
        if (!$entity->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        return redirect()->to(site_path('member/group', 'admin'))->with('message', '成功新增会员分组！');
    }

    public function edit($id)
    {
        if(!Entrust::can('admin.member.group.edit')) {
            return deny();
        }
        
        $group = MemberRankModel::find($id);
        $editStruct = $group->getEditStructs();
        
        return $this->view('member.group.edit', compact('group', 'editStruct'));
    }

    public function update(MemberGroupRequest $request, $id)
    {
        if(!Entrust::can('admin.member.group.edit')) {
            return deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '标题不能为空');
        }
        
        $entity = MemberRankModel::find($id);
        if (!$entity->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
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
