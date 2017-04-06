<?php namespace Modules\Cms\Http\Controllers\Admin\Article;

use Modules\Cms\Http\Controllers\Admin\AdminController;

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
	    $editStruct = array(
	        'title' => [
	            'name' => 'title',
	            'type' => 'text',
	            'alias' => '标题',
	            'placeholder' => '请输入标题',
	            'autocomplete' => 'on',
	            'value' => '',
	            'help' => '',
	            'is_request' => true,
	        ],
	        'cat_id' => [
	            'name' => 'cat_id',
	            'type' => 'select_tree',
	            'alias' => '所属分类',
	            'placeholder' => '请选择分类',
	            'autocomplete' => 'on',
	            'value' => '',
	            'help' => '',
	            'is_request' => false,
	        ],
	        'content' => [
	            'name' => 'content',
	            'type' => 'textarea',
	            'alias' => '内容',
	            'placeholder' => '',
	            'autocomplete' => 'on',
	            'value' => '',
	            'help' => '',
	            'is_request' => false,
	        ],
	    );
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