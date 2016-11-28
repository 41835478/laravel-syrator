<?php

namespace App\Http\Controllers\Admin\Mygz\Material;

use App\Http\Controllers\Admin\Mygz\AppMygzController;

use Illuminate\Http\Request;
use App\Repositories\MaterialRepository;
use App\Http\Requests\MaterialRequest;

/**
 * 装修材料管理控制器
 *
 */
class MaterialController extends AppMygzController
{
    protected $repository;

    public function __construct(MaterialRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {
        $materials = $this->repository->index();
        return $this->view('material.index', compact('materials'));
    }

    public function create()
    {
        $catalogs = $this->repository->indexCat();
        return $this->view('material.create', compact('catalogs'));
    }

    public function store(MaterialRequest $request)
    {
        $data = $request->all();
        $article = $this->repository->store($data);
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
        return $this->view('article.edit', compact('catalogs', 'article'));
    }

    public function update(MaterialRequest $request, $id)
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