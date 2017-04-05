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
	
}