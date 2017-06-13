<?php namespace Modules\Cms\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;

use Modules\Cms\Http\Controllers\Admin\AdminController;

use Modules\Cms\Model\ArticleCatalogModel;

class ArticleCatalogController extends AdminController {
	
	public function index()
	{
	    $listEntity = ArticleCatalogModel::all();
		return view('cms::admin.article.catalog.index', compact('listEntity'));
	}
	
	public function create()
	{	    
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
	    if(!Entrust::can('mygz.admin.material.catalog')) {
	        return $this->deny();
	    }
	     
	    $data = $request->all();
	    $newData = $this->repository->storeCatalog($data);
	    
	    if ($newData==null) {
	        return redirect()->back()->withInput($request->input())->with('fail', '该名称的分类已经存在，请使用其他的名称！');
	    }
	    
	    if ($newData->id) {
	        //添加成功
	        return redirect()->to(site_path('admin/material/catalog', 'mygz'))->with('message', '成功新增分类！');
	    } else {
	        //添加失败
	        return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
	    }
	}
	
	public function edit($id)
	{
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
	    return "Hello Update";
	}
	
	public function remove(Request $request)
	{
	    return "Hello Remove";
	}
	
	public function removeBatch(Request $request)
	{
	    return "Hello RemoveBatch";
	}
}