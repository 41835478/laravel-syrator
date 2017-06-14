<?php namespace Modules\Cms\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;

use Modules\Cms\Http\Controllers\Admin\AdminController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use Modules\Cms\Model\ArticleCatalogModel;

class ArticleCatalogController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
    
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
    }
	
	public function index()
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
		return view('cms::admin.article.catalog.index');
	}
	
	public function create()
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
	    $catalog = new ArticleCatalogModel();
	    $editStruct = $catalog->getEditStructs();
	    
	    // 再修正
	    if (isset($editStruct['name'])) {
	        $editStruct['name']->help = "*";
	    }
        // 扩展插件，自定义类型
        if (isset($editStruct['pid'])) {
            $editStruct['pid']->type = "select_tree";
        }
        // 单选radio
        if (isset($editStruct['sort_num'])) {
            $editStruct['sort_num']->value = 0;
        }
        // 单选radio
        if (isset($editStruct['is_show'])) {
            $editStruct['is_show']->type = "radio";
            $editStruct['is_show']->value = 1; 
            $editStruct['is_show']->dictionary['0'] = '否'; 
            $editStruct['is_show']->dictionary['1'] = '是'; 
        }
	    
        $catalogs = ArticleCatalogModel::all();
	    return view('cms::admin.article.catalog.create', compact('catalogs', 'editStruct'));
	}
	
	public function store(Request $request)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '分类名称不能为空');
        }
        
        // 新增，则需要判断名称是否存在
        $catalog = ArticleCatalogModel::getCatalogByName(e($inputs['name']));
        if ($catalog!=null && !empty($catalog) && $catalog->id>0) {
            return $this->backFail($request, '该名称的分类已经存在，请使用其他的名称');
        }
        
        if (e($inputs['pid'])=='顶级分类') {
            $inputs['pid'] = 0;
        } else {
            $inputs['pid'] = ArticleCatalogModel::getCatalogIdByName(e($inputs['pid']));
        }
        
        $catalog = new ArticleCatalogModel();
        if (!$catalog->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        //添加成功
        return $this->toSuccess(site_path('admin/article/catalog', 'cms'), '成功新增分类');
	}
	
	public function edit($id)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
        $catalog = ArticleCatalogModel::find($id);
        $catalog->pid = $catalog->getCatalogNameById($catalog->pid);
        
        $editStruct = $catalog->getEditStructs();
         
        // 再修正
        if (isset($editStruct['name'])) {
            $editStruct['name']->help = "*";
        }
        // 扩展插件，自定义类型
        if (isset($editStruct['pid'])) {
            $editStruct['pid']->type = "select_tree";
        }
        // 单选radio
        if (isset($editStruct['sort_num'])) {
            $editStruct['sort_num']->value = 0;
        }
        // 单选radio
        if (isset($editStruct['is_show'])) {
            $editStruct['is_show']->type = "radio";
            $editStruct['is_show']->dictionary['0'] = '否';
            $editStruct['is_show']->dictionary['1'] = '是';
        }
        
        $catalogs = ArticleCatalogModel::all();
	    return view('cms::admin.article.catalog.edit', compact('catalog', 'catalogs', 'editStruct'));
	}
	
	public function update(Request $request, $id)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '分类名称不能为空');
        }
        
        $catalog = ArticleCatalogModel::find($id);
        if ($catalog->name != e($inputs['name'])) {
            // 名称如果也改变,则需要判断新名称是否存在
            $catalogTemp = ArticleCatalogModel::getCatalogByName(e($inputs['name']));
            if ($catalogTemp!=null && !empty($catalogTemp) && $catalogTemp->id>0) {
                return $this->backFail($request, '该名称的分类已经存在，请使用其他的名称');
            }
        }        
        
        if (e($inputs['pid'])=='顶级分类') {
            $inputs['pid'] = 0;
        } else {
            $inputs['pid'] = ArticleCatalogModel::getCatalogIdByName(e($inputs['pid']));
        }
        
        if (!$catalog->saveFromInput($inputs)) {
            return $this->backFail($request, '数据库操作返回异常');
        }
        
        //添加成功
        return $this->toSuccess(site_path('admin/article/catalog', 'cms'), '更新成功');
	}
	
	public function show($id)
	{
	    if(!Entrust::can('cms.admin.article.catalog')) {
	        return $this->deny();
	    }
	     
	    $catalog = ArticleCatalogModel::find($id);
	    $catalog->pid_name = $catalog->getCatalogNameById($catalog->pid);
	    return $this->view('article.catalog.show', compact('catalog'));
	}
	
	public function remove(Request $request)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
	     
	    $rth['code'] = "500";
	    $rth['message'] = "未知错误";
	
	    $id = $request->input('delId');
	    $objItem = ArticleCatalogModel::find($id);
	    if (!empty($objItem)) {
	        if ($objItem->isHasChild()) {
	            $rth['code'] = "300";
	            $rth['message'] = "该分类下还有子分类，请先删除子类";
	            return $rth;
	        }
	
	        if ($objItem->delete()) {
	            $rth['code'] = "200";
	            $rth['message'] = "删除成功";
	            return $rth;
	        }
	    } else {
	        $rth['code'] = "201";
	        $rth['message'] = "该分类不存在，或已经被删除了！";
	        return $rth;
	    }
	
	    return $rth;
	}
}