<?php namespace Modules\Cms\Http\Controllers\Admin\Article;

use Modules\Cms\Http\Controllers\Admin\AdminController;

use Modules\Cms\Libraries\EditProperty;

use Modules\Cms\Model\ArticleModel;
use Modules\Cms\Model\ArticleCatModel;

class ArticleController extends AdminController {
	
	public function index()
	{
	    $listEntity = ArticleModel::all();
	    $catalogs = ArticleCatModel::all();
		return view('cms::admin.article.index', compact('listEntity','catalogs'));
	}
	
	public function create()
	{
	    $catalogs = ArticleCatModel::all();

	    $editStruct = array();
	    
	    $editProperty = new EditProperty();
	    $editProperty->name = 'title';
	    $editProperty->type = 'text';
	    $editProperty->alias = '标题';
	    $editProperty->placeholder = '请输入标题';
	    $editProperty->is_request = true;
	    $editStruct[$editProperty->name] = $editProperty;
	    
	    $editProperty = new EditProperty();
	    $editProperty->name = 'cat_id';
	    $editProperty->type = 'select_tree';
	    $editProperty->alias = '所属分类';
	    $editProperty->placeholder = '请选择分类';
	    $editStruct[$editProperty->name] = $editProperty;
	    
	    $editProperty = new EditProperty();
	    $editProperty->name = 'content';
	    $editProperty->type = 'textarea';
	    $editProperty->alias = '内容';
	    $editStruct[$editProperty->name] = $editProperty;
	    
	    return view('cms::admin.article.create', compact('catalogs', 'editStruct'));
	}
	
	public function store(Request $request)
	{
	    return "Hello Store";	    
	}
	
	public function edit($id)
	{
	    return "Hello Edit";
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