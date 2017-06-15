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
		return view('cms::admin.article.index', compact('listEntity','catalogs'));
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
	    return view('cms::admin.article.create', compact('catalogs', 'editStruct'));
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
        
        // 新增，则需要判断名称是否存在        
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
        return $this->toSuccess(site_path('admin/article/article', 'cms'), '成功新增分类');
	}
	
	public function edit($id)
	{
        if(!Entrust::can('cms.admin.article')) {
           return $this->deny();
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
            'fields' => array('catalog_id','type','content','is_show'),
        );
	    
	    return view('cms::admin.article.edit', compact('catalogs', 'editStruct', 'editStructGroup'));
	}
	
	public function update(Request $request, $id)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
        
	    return "Hello Update";
	}
	
	public function show($id)
	{
        if(!Entrust::can('cms.admin.article')) {
            return $this->deny();
        }
	
	    $entity = ArticleModel::find($id);
	    $entity->catalog_name = $catalog->getCatalogNameById($entity->catalog_id);
	    return $this->view('article.article.show', compact('article'));
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
}