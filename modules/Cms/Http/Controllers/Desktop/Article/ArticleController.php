<?php namespace Modules\Cms\Http\Controllers\Desktop\Article;

use Modules\Cms\Http\Controllers\Desktop\FrontController;

use Modules\Cms\Model\ArticleModel;
use Modules\Cms\Model\ArticleCatalogModel;

class ArticleController extends FrontController {
    
    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{        
	    $listEntity = ArticleModel::all();
	    $catalogs = ArticleCatalogModel::all();
		return $this->view('article.index', compact('listEntity','catalogs'));
	}
	
	public function show($id)
	{	
	    $entity = ArticleModel::find($id);
	    $entity->catalog_name = $entity->getCatalogName($entity->catalog_id);
	    
	    return $this->view('article.show', compact('entity'));
	}
}