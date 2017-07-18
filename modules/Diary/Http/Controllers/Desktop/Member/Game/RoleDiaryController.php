<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

use Modules\Diary\Model\GameRoleDiaryModel;
use Modules\Diary\Model\GameRoleModel;

class RoleDiaryController extends GameController
{    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        $listEntity = GameRoleDiaryModel::where('id', '>', 0)->orderBy('date','desc')->get();
        return $this->view('diary.index', compact('listEntity'));
    }
    
    public function create()
    {
        $model = new GameRoleDiaryModel();
        $editStruct = $model->getEditStructs();
        
        if (isset($editStruct['role_id'])) {
            $editStruct['role_id']->is_request = true;
            $editStruct['role_id']->type = "select";            
            $roles = GameRoleModel::All();
            foreach ($roles as $key => $value ) {
                $editStruct['role_id']->dictionary[$value->id] = $value->name;
            }
        }
        
        if (isset($editStruct['date'])) {
            $editStruct['date']->data_format = "yyyy-mm-dd";
        }
        
        // 分组
        $editStructGroup = array();
        $editStructGroup[] = array(
            'id' => 'base_info',
            'name' => '基本信息',
            'fields' => array(
                'name',
                'base_sn',
                'base_version',
                'base_kind',
                'base_owner_type',
                'base_foreign_state',
                'base_catalog_id',
                'base_project_type'
            ),
        );
        $editStructGroup[] = array(
            'id' => 'expand_info',
            'name' => '项目详情',
            'fields' => array(
                'expand_description',
                'expand_devices',
                'expand_remark'
            ),
        );
        $editStructGroup[] = array(
            'id' => 'scope_info',
            'name' => '其他',
            'fields' => array(
                'scope_area',
                'scope_build_area',
                'scope_investment',
                'scope_costs',
                'project_structure',
                'project_decoration',
                'duration_start_date',
                'duration_end_date',
                'duration_state',
                'duration_state_expand',
                'duration_state_desc'
            ),
        );
        
        return $this->view('diary.create', compact('editStruct', 'editStructGroup'));
    }
    
    public function store(Request $request)
    {    
        $inputs = $request->all();
        if (empty(e($inputs['role_id']))) {
            return $this->backFail($request, '角色不能为空');
        }
        
        if (empty(e($inputs['date']))) {
            return $this->backFail($request, '日期不能为空');
        }
    
        $model = new GameRoleDiaryModel();
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        //添加成功
        return $this->backSuccess($request, '成功新增角色');
    }
    
    public function edit($id)
    {
        $entity = GameRoleDiaryModel::find($id);
        $editStruct = $entity->getEditStructs();
        
        if (isset($editStruct['role_id'])) {
            $editStruct['role_id']->is_editable = false;
            $editStruct['role_id']->show_type = "readonly";
            $editStruct['role_id']->value = $entity->getRoleName();
        }
        
        if (isset($editStruct['date'])) {
            $editStruct['date']->is_editable = false;
            $editStruct['date']->type = "text";
            $editStruct['date']->show_type = "readonly";
        }
        
        return $this->view('diary.edit', compact('entity','editStruct'));
    }
    
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        if (empty(e($inputs['role_id']))) {
            return $this->backFail($request, '角色不能为空');
        }
        
        if (empty(e($inputs['date']))) {
            return $this->backFail($request, '日期不能为空');
        }
        
        $model = GameRoleDiaryModel::find($id);
        $inputs['role_id'] = $model->role_id;
        $inputs['date'] = $model->date;
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        return $this->backSuccess($request, '更新成功');
    }
    
    public function show($id)
    {    
        $entity = GameRoleDiaryModel::find($id);
        $editStruct = $entity->getEditStructs();
        foreach ($editStruct as $key => $value ) {
            $editStruct[$key]->is_editable = false;
            $editStruct[$key]->type = "text";
            $editStruct[$key]->show_type = "readonly";
        }
        
        if (isset($editStruct['role_id'])) {
            $editStruct['role_id']->is_editable = false;
            $editStruct['role_id']->show_type = "readonly";
            $editStruct['role_id']->value = $entity->getRoleName();
        }
        
        return $this->view('diary.show', compact('entity','editStruct'));
    }
    
    public function remove(Request $request)
    {    
        $rth['code'] = "500";
        $rth['message'] = "未知错误";
    
        $id = $request->input('delId');
        $objItem = GameRoleDiaryModel::find($id);
        if (!empty($objItem)) {    
            if ($objItem->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
                return $rth;
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该角色不存在，或已经被删除了！";
            return $rth;
        }
    
        return $rth;
    }
	
	public function removeBatch(Request $request)
	{	     
	    $idsstr = $request->input('delId');
	    $ids = explode(",",$idsstr);
	    if (GameRoleDiaryModel::whereIn('id', $ids)->delete()) {
	        $rth['code'] = "200";
	        $rth['message'] = "删除成功";
	    } else {
	        $rth['code'] = "500";
	        $rth['message'] = "删除失败";
	    }
	
	    return $rth;
	}
}
