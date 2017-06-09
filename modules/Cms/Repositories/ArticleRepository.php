<?php

namespace App\Repositories;

use App\Model\ArticleModel;
use App\Model\ArticleCatalogModel;

class ArticleRepository extends BaseRepository
{
    public function __construct()
    {
    }
    
    public function all()
    {
        $articles = $this->model->all();
        return $articles;
    }

    public function catalogs()
    {
        $catalogs = $this->catalogs->all();
        return $catalogs;
    }
    
    private function saveArticle($article, $inputs)
    {
        $article->content = e($inputs['content']);
    
        if ($article->save()) {
        }
    
        return $article;
    }

    #********
    #* 资源 REST 相关的接口函数 START
    #********
    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }
    
    public function indexCat($data = [], $extra = '', $size = null)
    {
        return $this->catalogs->all();
    }

    public function store($inputs, $extra = '')
    {
        $article = new $this->model;
        $article = $this->saveArticle($article, $inputs);
        return $article;
    }

    public function edit($id, $extra = '')
    {
        $article = $this->getById($id);
        return $article;
    }

    public function update($id, $inputs, $extra = '')
    {
        $article = $this->getById($id);
        $article = $this->saveArticle($article, $inputs);
    }
    #********
    #* 资源 REST 相关的接口函数 END
    #********
}
