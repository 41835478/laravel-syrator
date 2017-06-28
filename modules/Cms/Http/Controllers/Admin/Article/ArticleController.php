<?php namespace Modules\Cms\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;

use Modules\Cms\Http\Controllers\Admin\AdminController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Modules\Cms\Model\ArticleModel;
use Modules\Cms\Model\ArticleCatalogModel;

class ArticleController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
    
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
    }
	
	public function index()
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
        
	    $listEntity = ArticleModel::all();
	    $catalogs = ArticleCatalogModel::all();
		return $this->view('article.index', compact('listEntity','catalogs'));
	}
	
	public function create()
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
	    
	    $article = new ArticleModel();
	    $editStruct = $article->getEditStructs();
	    
	    // 再修正
	    // 按照业务需求，该字段由系统赋值，前台无法编辑
        if (isset($editStruct['author_id'])) {
            $editStruct['author_id']->is_editable = false;
        }
        // 扩展插件，自定义类型
        if (isset($editStruct['catalog_id'])) {
            $editStruct['catalog_id']->type = "select_tree";
        }
        // 单选radio
        if (isset($editStruct['is_show'])) {
            $editStruct['is_show']->type = "radio";
            $editStruct['is_show']->value = 1; 
            $editStruct['is_show']->dictionary['0'] = '否'; 
            $editStruct['is_show']->dictionary['1'] = '是'; 
        }
        // 单选select
        if (isset($editStruct['type'])) {
            $editStruct['type']->type = "select";
            $editStruct['type']->value = 2; 
            $editStruct['type']->dictionary['1'] = '原创';
            $editStruct['type']->dictionary['2'] = '来自微博';
            $editStruct['type']->dictionary['3'] = '来自朋友圈';
            $editStruct['type']->dictionary['4'] = '来自门户';
        }

        $catalogs = ArticleCatalogModel::all();
	    return $this->view('article.create', compact('catalogs', 'editStruct'));
	}
	
	public function store(Request $request)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '标题不能为空');
        }
        
        if (e($inputs['catalog_id'])=='顶级分类') {
            $inputs['catalog_id'] = 0;
        } else {
            $inputs['catalog_id'] = ArticleCatalogModel::getCatalogIdByName(e($inputs['catalog_id']));
        }
        
        $entity = new ArticleModel();
        if (!$entity->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        //添加成功
        return $this->toSuccess(site_path('admin/article/article', 'cms'), '成功新增文章');
	}
	
	public function edit($id)
	{
        if(!Entrust::can('cms.admin.article')) {
           return $this->deny();
        }
        
        $entity = ArticleModel::find($id);
        $entity->catalog_id = $entity->getCatalogName();
        $editStruct = $entity->getEditStructs();
	    
	    // 再修正
	    // 按照业务需求，该字段由系统赋值，前台无法编辑
        if (isset($editStruct['author_id'])) {
            $editStruct['author_id']->is_editable = false;
        }
        // 扩展插件，自定义类型
        if (isset($editStruct['catalog_id'])) {
            $editStruct['catalog_id']->type = "select_tree";
        }
        // 单选radio
        if (isset($editStruct['is_show'])) {
            $editStruct['is_show']->type = "radio";
            $editStruct['is_show']->value = 1; 
            $editStruct['is_show']->dictionary['0'] = '否'; 
            $editStruct['is_show']->dictionary['1'] = '是'; 
        }
        // 单选select
        if (isset($editStruct['type'])) {
            $editStruct['type']->type = "select";
            $editStruct['type']->value = 2; 
            $editStruct['type']->dictionary['1'] = '原创';
            $editStruct['type']->dictionary['2'] = '来自微博';
            $editStruct['type']->dictionary['3'] = '来自朋友圈';
            $editStruct['type']->dictionary['4'] = '来自门户';
        }
	    
        $catalogs = ArticleCatalogModel::all();
	    return $this->view('article.edit', compact('entity', 'catalogs', 'editStruct'));
	}
	
	public function update(Request $request, $id)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '标题不能为空');
        }
        
        if (e($inputs['catalog_id'])=='顶级分类') {
            $inputs['catalog_id'] = 0;
        } else {
            $inputs['catalog_id'] = ArticleCatalogModel::getCatalogIdByName(e($inputs['catalog_id']));
        }
        
        $entity = ArticleModel::find($id);
        if (!$entity->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        //添加成功
        return $this->toSuccess(site_path('admin/article/article', 'cms'), '成功更新文章');
	}
	
	public function show($id)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
	
	    $entity = ArticleModel::find($id);
	    $entity->catalog_name = $entity->getCatalogName();
	    
	    return $this->view('article.show', compact('entity'));
	}
	
	public function remove(Request $request)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
	
	    $rth['code'] = "500";
	    $rth['message'] = "未知错误";
	
	    $id = $request->input('delId');
	    $objItem = ArticleModel::find($id);
	    if (!empty($objItem)) {	
	        if ($objItem->delete()) {
	            $rth['code'] = "200";
	            $rth['message'] = "删除成功";
	            return $rth;
	        }
	    } else {
	        $rth['code'] = "201";
	        $rth['message'] = "该文章不存在，或已经被删除了！";
	        return $rth;
	    }
	
	    return $rth;
	}
	
	public function removeBatch(Request $request)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
	     
	    $idsstr = $request->input('delId');
	    $ids = explode(",",$idsstr);
	    if (ArticleModel::whereIn('id', $ids)->delete()) {
	        $rth['code'] = "200";
	        $rth['message'] = "删除成功";
	    } else {
	        $rth['code'] = "500";
	        $rth['message'] = "删除失败";
	    }
	
	    return $rth;
	}
	
	public function getImport(Request $request)
	{
	    return $this->view('article.import');
	}
	
	public function postImport(Request $request)
	{
	    $this->validate($request, [
	        'file' => 'required',
	    ]);
	     
	    if ($file = $request->file('file')) {
	        Excel::load($file, function($reader) {
	            $results = $reader->all();
	             
	            $courseIds = array();
	            $objCourse = new Course;
	            $objClass = new GradeClass;
	            $objTeacher = new Teacher;
	             
	            foreach($results as $k=>$sheet) {
	                $rowCount = 0;
	                foreach($sheet as $k=>$row) {
	                    $rowCount++;
	                     
	                    if ($rowCount <= 2) {
	                        continue;
	                    }
	                     
	                    // 先处理科目
	                    if ($rowCount == 3) {
	                        foreach($row as $k=>$course) {
	                            if (empty($course)) {
	                                continue;
	                            }
	                             
	                            $curCourse = $objCourse->getStoreCourseByName($course);
	                             
	                            $courseIds[$k] = $curCourse['id'];
	                        }
	                    }
	                     
	                    // 获取班级id
	                    $curClass = $objClass->getClassByName($row[0]);
	                    if (empty($curClass) || count($curClass)<=0) {
	                        continue;
	                    }
	                     
	                    // 处理教师信息
	                    foreach($row as $k=>$course) {
	                        if ($k==0) {
	                            continue;
	                        }
	                         
	                        $curTeacher = $objTeacher->getStoreTeacherByName($course,$courseIds[$k]);
	                        if (empty($curTeacher) || count($curTeacher)<=0) {
	                            continue;
	                        }
	
	                        $teacherClass = new TeacherClass();
	                        $teacherClass->course_id = $courseIds[$k];
	                        $teacherClass->class_id = $curClass['id'];
	                        $teacherClass->teacher_id = $curTeacher['id'];
	                         
	                        $teacherClass->save();
	                    }
	                }
	            }
	        });
	    }
	     
	    return view('admin.import.teacher');
	}
	
	public function export(Request $request)
	{
	    $grades = Grade::all();
	    Excel::create('年级信息表', function($excel) use($grades) {
	        $excel->sheet('sheetName', function($sheet) use($grades) {
	            $sheet->fromArray($grades, null, 'A1', false, false);
	            $sheet->prependRow(1, array(
	                'ID', '名称'
	            ));
	            $sheet->setWidth([
	                'A' => 11,
	                'B' => 8,
	            ]);
	            $sheet->getDefaultStyle();
	        });
	    })->export('xls');
	}
}