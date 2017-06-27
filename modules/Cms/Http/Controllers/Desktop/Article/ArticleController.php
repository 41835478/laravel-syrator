<?php namespace Modules\Cms\Http\Controllers\Desktop\Article;

use Modules\Cms\Http\Controllers\Desktop\FrontController;

use App\Loggers\MemberLogger;

use Modules\Cms\Model\ArticleModel;
use Modules\Cms\Model\ArticleCatalogModel;

class ArticleController extends FrontController {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function log($article) {
        if (!empty($this->member)) {
            $log = [
                'member_id' => $this->member->id,
                'entity_id' => $article->id,
                'type'    => 'view-article',
                'content' => '浏览文章:'.$article->name.'<'.$article->id.'>。',
            ];
            MemberLogger::write($log);
        } else {
            $log = [
                'member_id' => 0,
                'entity_id' => $article->id,
                'type'    => 'view-article',
                'content' => '浏览文章:'.$article->name.'<'.$article->id.'>。',
            ];
            MemberLogger::write($log);            
        }
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
	    $this->log($entity);
	    
	    $view_count = $entity->getViewCount();
	    $catalogs = ArticleCatalogModel::recCatalogs(0);
	    return $this->view('article.show', compact('entity','view_count','catalogs'));
	}
}