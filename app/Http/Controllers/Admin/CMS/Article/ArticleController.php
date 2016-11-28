<?php

namespace App\Http\Controllers\Admin\CMS\Article;

use App\Http\Controllers\Admin\CMS\AppCmsController;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use Gate;

/**
 * 文章分类控制器
 *
 */
class ArticleController  extends AppCmsController
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();
        $this->article = $article;

        if (Gate::denies('@article')) {
            $this->middleware('deny403');
        }
    }

    public function index()
    {
        $articles = $this->article->index();
        return $this->view('article.article.index', compact('articles'));
    }

    public function create()
    {
        $catalogs = $this->article->indexCat();
        return $this->view('article.article.create', compact('catalogs'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        $article = $this->article->store($data);
        if ($article->id) {  
            //添加成功
            return redirect()->to(site_path('article', 'admin'))->with('message', '成功新增文章！');
        } else {  
            //添加失败
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        $catalogs = $this->article->indexCat();
        $article = $this->article->edit($id);
        return $this->view('article.article.edit', compact('catalogs', 'article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        $this->article->update($id, $data);
        return redirect()->to(site_path('article', 'admin'))->with('message', '修改文章成功！');
    }
    
    public function remove(Request $request)
    {        
        $id = $request->input('delId');

        $objItem = $this->article->edit($id);
        if (!empty($objItem)) {
            if ($objItem->delete()) {
                $rth['code'] = "200";
                $rth['message'] = "删除成功";
            } else {
                $rth['code'] = "500";
                $rth['message'] = "删除失败";
            }
        } else {
            $rth['code'] = "201";
            $rth['message'] = "该文章不存在，或已经被删除了！";
        }  
        
        return $rth;
    }
}
