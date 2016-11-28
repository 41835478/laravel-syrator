<?php

namespace App\Http\Controllers\Desktop\Article;

use App\Http\Controllers\Desktop\FrontController;

use App\Repositories\ArticleRepository;

/**
 * 文章分类控制器
 *
 */
class ArticleController extends FrontController
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->index();
        return $this->view('article.article.index', compact('articles'));
    }
    
    public function show($id)
    {
        $article = $this->article->getById($id);    
        return $this->view('article.article.show', compact('article'));
    }
}
