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
            return $this->deny('deny');
        }
        
		return view('cms::admin.article.catalog.index');
	}
	
	public function create()
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny('deny');
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
            return $this->deny('deny');
        }
        
        $inputs = $request->all();
        if (empty(e($inputs['name']))) {
            return $this->backFail($request, '分类名称不能为空');
        }
        
        // 新增，则需要判断名称是否存在
        $catalog = ArticleCatalogModel::getCatalogByName(e($inputs['name']));
        if ($catalog!=null && !empty($catalog) && $catalog->id<=0) {
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
            return $this->deny('deny');
        }
        
	    $catalogs = ArticleCatalogModel::all();
	    
	    $article = new ArticleModel();
	    $editStruct = $article->getEditStructs();
	    
	    // 再修正
	    // 按照业务需求，该字段由系统赋值，前台无法编辑
        if (isset($editStruct['author_id'])) {
            $editStruct['author_id']->is_editable = false;
        }
        // 扩展插件，自定义类型
        if (isset($editStruct['cat_id'])) {
            $editStruct['cat_id']->type = "select_tree";
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
        
        // 分组
        $editStructGroup = array();
        $editStructGroup[] = array(
            'id' => 'base_info',
            'name' => '基本信息',
            'fields' => array('title','keywords','summary'),
        );
        $editStructGroup[] = array(
            'id' => 'expand_info',
            'name' => '扩展信息',
            'fields' => array('cat_id','type','content','is_show'),
        );
	    
	    return view('cms::admin.article.edit', compact('catalogs', 'editStruct', 'editStructGroup'));
	}
	
	public function update(Request $request, $id)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
	    return "Hello Update";
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
        
	    return "Hello Remove";
	}
	
	public function removeBatch(Request $request)
	{
        if(!Entrust::can('cms.admin.article.catalog')) {
            return $this->deny();
        }
        
	    return "Hello RemoveBatch";
	}
}