<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

use Modules\Diary\Model\GameMaterialDiaryModel;

class MaterialDiaryController extends GameController
{    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
        $listEntity = GameMaterialDiaryModel::where('id', '>', 0)->orderBy('date','desc')->get();
        return $this->view('material.index', compact('listEntity'));
    }
    
    public function create()
    {
        $model = new GameMaterialDiaryModel();
        $editStruct = $model->getEditStructs();
        
        if (isset($editStruct['date'])) {
            $editStruct['date']->data_format = "yyyy-mm-dd";
        }
        
        return $this->view('material.create', compact('editStruct'));
    }
    
    public function store(Request $request)
    {    
        $inputs = $request->all();
        
        if (empty(e($inputs['date']))) {
            return $this->backFail($request, '日期不能为空');
        }
    
        $model = new GameMaterialDiaryModel();
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        //添加成功
        return $this->backSuccess($request, '新增成功');
    }
    
    public function edit($id)
    {
        $entity = GameMaterialDiaryModel::find($id);
        $editStruct = $entity->getEditStructs();
        
        if (isset($editStruct['date'])) {
            $editStruct['date']->is_editable = false;
            $editStruct['date']->type = "text";
            $editStruct['date']->show_type = "readonly";
        }
        
        return $this->view('material.edit', compact('entity', 'editStruct'));
    }
    
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        
        if (empty(e($inputs['date']))) {
            return $this->backFail($request, '日期不能为空');
        }
        
        $model = GameMaterialDiaryModel::find($id);
        $inputs['date'] = $model->date;
        if (!$model->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
    
        return $this->backSuccess($request, '更新成功');
    }
    
    public function show($id)
    {    
        $entity = GameMaterialDiaryModel::find($id);
        $editStruct = $entity->getEditStructs();
        foreach ($editStruct as $key => $value ) {
            $editStruct[$key]->is_editable = false;
            $editStruct[$key]->type = "text";
            $editStruct[$key]->show_type = "readonly";
        }
        
        return $this->view('material.show', compact('entity','editStruct'));
    }
    
    public function remove(Request $request)
    {    
        $rth['code'] = "500";
        $rth['message'] = "未知错误";
    
        $id = $request->input('delId');
        $objItem = GameMaterialDiaryModel::find($id);
        if (!empty($objItem)) {    
            if ($objItem->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
                return $rth;
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该记录不存在，或已经被删除了！";
            return $rth;
        }
    
        return $rth;
    }
	
	public function removeBatch(Request $request)
	{	     
	    $idsstr = $request->input('delId');
	    $ids = explode(",",$idsstr);
	    if (GameMaterialDiaryModel::whereIn('id', $ids)->delete()) {
	        $rth['code'] = "200";
	        $rth['message'] = "删除成功";
	    } else {
	        $rth['code'] = "500";
	        $rth['message'] = "删除失败";
	    }
	
	    return $rth;
	}
}
