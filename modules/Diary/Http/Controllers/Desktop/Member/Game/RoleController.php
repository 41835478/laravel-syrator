<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

use Modules\Diary\Model\GameRoleModel;

class RoleController extends GameController
{    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        $listEntity = GameRoleModel::all();
        return $this->view('role.index', compact('listEntity'));
    }
    
    public function create()
    {
        $model = new GameRoleModel();
        $editStruct = $model->getEditStructs();
        
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        if (isset($editStruct['position'])) {
            $editStruct['position']->is_request = true;
            $editStruct['position']->type = "select";
            $editStruct['position']->dictionary['前排'] = '前排';
            $editStruct['position']->dictionary['中排'] = '中排';
            $editStruct['position']->dictionary['后排'] = '后排';
        }
        if (isset($editStruct['quality'])) {
            $editStruct['quality']->is_request = true;
            $editStruct['quality']->type = "select";
            $editStruct['quality']->dictionary['12'] = '12';
            $editStruct['quality']->dictionary['13'] = '13';
            $editStruct['quality']->dictionary['14'] = '14';
        }
        if (isset($editStruct['type'])) {
            $editStruct['type']->is_request = true;
            $editStruct['type']->type = "select";
            $editStruct['type']->dictionary['输出'] = '输出';
            $editStruct['type']->dictionary['双系输出'] = '双系输出';
            $editStruct['type']->dictionary['物理输出'] = '物理输出';
            $editStruct['type']->dictionary['念力输出'] = '念力输出';
            $editStruct['type']->dictionary['物理防御'] = '物理防御';
            $editStruct['type']->dictionary['念力防御'] = '念力防御';
            $editStruct['type']->dictionary['治疗'] = '治疗';
            $editStruct['type']->dictionary['控制'] = '控制';
            $editStruct['type']->dictionary['辅助'] = '辅助';
        }
        if (isset($editStruct['catalog'])) {
            $editStruct['catalog']->is_request = true;
            $editStruct['catalog']->type = "select";
            $editStruct['catalog']->dictionary['1'] = '1';
            $editStruct['catalog']->dictionary['2'] = '2';
            $editStruct['catalog']->dictionary['3'] = '3';
            $editStruct['catalog']->dictionary['4'] = '4';
            $editStruct['catalog']->dictionary['5'] = '5';
        }
        if (isset($editStruct['group'])) {
            $editStruct['group']->is_request = true;
            $editStruct['group']->type = "select";
            $editStruct['group']->dictionary['圣斗士'] = '圣斗士';
            $editStruct['group']->dictionary['冥斗士'] = '冥斗士';
            $editStruct['group']->dictionary['海斗士'] = '海斗士';
        }
        
        return $this->view('role.create', compact('editStruct'));
    }
    
    public function store(Request $request)
    {    
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '名称不能为空');
        }
    
        $model = new GameRoleModel();
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        //添加成功
        return $this->backSuccess($request, '成功新增角色');
    }
    
    public function edit($id)
    {
        $entity = GameRoleModel::find($id);
        $editStruct = $entity->getEditStructs();
        
        if (isset($editStruct['name'])) {
            $editStruct['name']->is_request = true;
        }
        if (isset($editStruct['position'])) {
            $editStruct['position']->is_request = true;
            $editStruct['position']->type = "select";
            $editStruct['position']->dictionary['前排'] = '前排';
            $editStruct['position']->dictionary['中排'] = '中排';
            $editStruct['position']->dictionary['后排'] = '后排';
        }
        if (isset($editStruct['quality'])) {
            $editStruct['quality']->is_request = true;
            $editStruct['quality']->type = "select";
            $editStruct['quality']->dictionary['12'] = '12';
            $editStruct['quality']->dictionary['13'] = '13';
            $editStruct['quality']->dictionary['14'] = '14';
        }
        if (isset($editStruct['type'])) {
            $editStruct['type']->is_request = true;
            $editStruct['type']->type = "select";
            $editStruct['type']->dictionary['输出'] = '输出';
            $editStruct['type']->dictionary['双系输出'] = '双系输出';
            $editStruct['type']->dictionary['物理输出'] = '物理输出';
            $editStruct['type']->dictionary['念力输出'] = '念力输出';
            $editStruct['type']->dictionary['物理防御'] = '物理防御';
            $editStruct['type']->dictionary['念力防御'] = '念力防御';
            $editStruct['type']->dictionary['治疗'] = '治疗';
            $editStruct['type']->dictionary['控制'] = '控制';
            $editStruct['type']->dictionary['辅助'] = '辅助';
        }
        if (isset($editStruct['catalog'])) {
            $editStruct['catalog']->is_request = true;
            $editStruct['catalog']->type = "select";
            $editStruct['catalog']->dictionary['1'] = '1';
            $editStruct['catalog']->dictionary['2'] = '2';
            $editStruct['catalog']->dictionary['3'] = '3';
            $editStruct['catalog']->dictionary['4'] = '4';
            $editStruct['catalog']->dictionary['5'] = '5';
        }
        if (isset($editStruct['group'])) {
            $editStruct['group']->is_request = true;
            $editStruct['group']->type = "select";
            $editStruct['group']->dictionary['圣斗士'] = '圣斗士';
            $editStruct['group']->dictionary['冥斗士'] = '冥斗士';
            $editStruct['group']->dictionary['海斗士'] = '海斗士';
        }
        
        return $this->view('role.edit', compact('entity','editStruct'));
    }
    
    public function update(Request $request, $id)
    {    
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '名称不能为空');
        }
        
        $model = GameRoleModel::find($id);
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        return $this->backSuccess($request, '更新成功');
    }
    
    public function show($id)
    {    
        $entity = GameRoleModel::find($id);
        return $this->view('role.show', compact('entity'));
    }
    
    public function remove(Request $request)
    {    
        $rth['code'] = "500";
        $rth['message'] = "未知错误";
    
        $id = $request->input('delId');
        $objItem = GameRoleModel::find($id);
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
	    if (GameRoleModel::whereIn('id', $ids)->delete()) {
	        $rth['code'] = "200";
	        $rth['message'] = "删除成功";
	    } else {
	        $rth['code'] = "500";
	        $rth['message'] = "删除失败";
	    }
	
	    return $rth;
	}
}
