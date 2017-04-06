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
	    return view('cms::admin.article.create', compact('catalogs'));
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