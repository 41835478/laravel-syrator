<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

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
        
        $entity = new MemberModel();
        $editStruct = SyratorModel::getEditStructsTools($entity);
        if (isset($editStruct['phone'])) {
            $editStruct['phone']->is_request = true;
            $editStruct['phone']->help = "（创建后手机号无法修改）";
        }
        if (isset($editStruct['account'])) {
            $editStruct['account']->is_request = true;
            $editStruct['account']->help = "（必须以英文字母开头并且是英文字母或数字的组合）";
        }
        if (isset($editStruct['password'])) {
            $editStruct['password']->type = "password";
            $editStruct['password']->autocomplete = "off";
            $editStruct['password']->is_request = true;
        }
        if (isset($editStruct['remember_token'])) {
            $editStruct['remember_token']->is_editable = false;
        }
        if (isset($editStruct['role'])) {
            $editStruct['role']->type = "select";
            $editStruct['role']->dictionary = array();

            $roles = $this->member->indexRank();
            foreach ($roles as $k => $value) {
                $editStruct['role']->dictionary[$value->id] = $value->name;
            }
        }
        if (isset($editStruct['gender'])) {
            $editStruct['gender']->type = "select";
            $editStruct['gender']->dictionary['0'] = '保密';
            $editStruct['gender']->dictionary['1'] = '男';
            $editStruct['gender']->dictionary['2'] = '女';
        }
        if (isset($editStruct['headimg'])) {
            $editStruct['headimg']->is_editable = false;
        }
        if (isset($editStruct['points'])) {
            $editStruct['points']->is_editable = false;
        }
        if (isset($editStruct['wechat_id'])) {
            $editStruct['wechat_id']->is_editable = false;
        }
        if (isset($editStruct['wechat_name'])) {
            $editStruct['wechat_name']->is_editable = false;
        }
        if (isset($editStruct['wechat_nickname'])) {
            $editStruct['wechat_nickname']->is_editable = false;
        }
        if (isset($editStruct['wechat_avatar'])) {
            $editStruct['wechat_avatar']->is_editable = false;
        }
        if (isset($editStruct['wechat_email'])) {
            $editStruct['wechat_email']->is_editable = false;
        }
        if (isset($editStruct['wechat_token'])) {
            $editStruct['wechat_token']->is_editable = false;
        }
        if (isset($editStruct['taobao_uid'])) {
            $editStruct['taobao_uid']->is_editable = false;
        }
        if (isset($editStruct['taobao_password'])) {
            $editStruct['taobao_password']->is_editable = false;
        }
        if (isset($editStruct['is_locked'])) {
            $editStruct['is_locked']->type = "radio";
            $editStruct['is_locked']->dictionary['0'] = '否';
            $editStruct['is_locked']->dictionary['1'] = '是';
            $editStruct['is_locked']->value = 0;
        }
        return $this->view('member.member.create', compact('editStruct'));
    }

    public function store(MemberRequest $request)
    {      
        if(!Entrust::can('admin.member.member.create')) {
            return deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['phone']))) {
            return $this->backFail($request, '手机号不能为空');
        }
        
        if (empty(e($inputs['account']))) {
            return $this->backFail($request, '账号不能为空');
        }
        
        if (empty(e($inputs['password']))) {
            return $this->backFail($request, '密码不能为空');
        }
        
        $inputs['password'] = bcrypt(e($inputs['password']));
        $entity = new MemberModel();
        if (!SyratorModel::saveFromInputTools($entity, $inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        return redirect()->to(site_path('member/member', 'admin'))->with('message', '成功新增会员！');
    }

    public function edit($id)
    {      
        if(!Entrust::can('admin.member.member.edit')) {
            return deny();
        }
        
        $entity = $this->member->edit($id);
        $editStruct = SyratorModel::getEditStructsTools($entity);
        if (isset($editStruct['phone'])) {
            $editStruct['phone']->is_request = true;
            $editStruct['phone']->is_editable = false;
            $editStruct['phone']->show_type = "readonly";
            $editStruct['phone']->help = "（创建后手机号无法修改）";
        }
        if (isset($editStruct['account'])) {
            $editStruct['account']->is_request = true;
            $editStruct['account']->help = "（必须以英文字母开头并且是英文字母或数字的组合）";
        }
        if (isset($editStruct['password'])) {
            $editStruct['password']->type = "password";
            $editStruct['password']->autocomplete = "off";
            $editStruct['password']->value = "";
        }
        if (isset($editStruct['remember_token'])) {
            $editStruct['remember_token']->is_editable = false;
        }
        if (isset($editStruct['role'])) {
            $editStruct['role']->type = "select";
            $editStruct['role']->dictionary = array();
        
            $roles = $this->member->indexRank();
            foreach ($roles as $k => $value) {
                $editStruct['role']->dictionary[$value->id] = $value->name;
            }
        }
        if (isset($editStruct['gender'])) {
            $editStruct['gender']->type = "select";
            $editStruct['gender']->dictionary['0'] = '保密';
            $editStruct['gender']->dictionary['1'] = '男';
            $editStruct['gender']->dictionary['2'] = '女';
        }
        if (isset($editStruct['headimg'])) {
            $editStruct['headimg']->is_editable = false;
        }
        if (isset($editStruct['points'])) {
            $editStruct['points']->is_editable = false;
        }
        if (isset($editStruct['wechat_id'])) {
            $editStruct['wechat_id']->is_editable = false;
        }
        if (isset($editStruct['wechat_name'])) {
            $editStruct['wechat_name']->is_editable = false;
        }
        if (isset($editStruct['wechat_nickname'])) {
            $editStruct['wechat_nickname']->is_editable = false;
        }
        if (isset($editStruct['wechat_avatar'])) {
            $editStruct['wechat_avatar']->is_editable = false;
        }
        if (isset($editStruct['wechat_email'])) {
            $editStruct['wechat_email']->is_editable = false;
        }
        if (isset($editStruct['wechat_token'])) {
            $editStruct['wechat_token']->is_editable = false;
        }
        if (isset($editStruct['taobao_uid'])) {
            $editStruct['taobao_uid']->is_editable = false;
        }
        if (isset($editStruct['taobao_password'])) {
            $editStruct['taobao_password']->is_editable = false;
        }
        if (isset($editStruct['is_locked'])) {
            $editStruct['is_locked']->type = "radio";
            $editStruct['is_locked']->dictionary['0'] = '否';
            $editStruct['is_locked']->dictionary['1'] = '是';
        }
        
        return $this->view('member.member.edit', compact('entity', 'editStruct'));
    }

    public function update(Request $request, $id)
    {      
        if(!Entrust::can('admin.member.member.edit')) {
            return deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['phone']))) {
            return $this->backFail($request, '手机号不能为空');
        }
        
        if (empty(e($inputs['account']))) {
            return $this->backFail($request, '账号不能为空');
        }
        
        $entity = $this->member->edit($id);
        if (empty(e($inputs['password']))) {
            $inputs['password'] = $entity->password;
        } else if ($entity->password!=$inputs['password']) {
            $inputs['password'] = bcrypt(e($inputs['password']));
        }
        if (!SyratorModel::saveFromInputTools($entity, $inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        return redirect()->to(site_path('member/member', 'admin'))->with('message', '修改会员成功！');
    }
    
    public function show($id)
    {      
        if(!Entrust::can('admin.member.member.show')) {
            return deny();
        }
        
        $entity = $this->member->edit($id);
        return $this->view('member.member.show', compact('entity'));
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
