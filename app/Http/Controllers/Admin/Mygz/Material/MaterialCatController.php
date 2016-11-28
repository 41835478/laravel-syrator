<?php

namespace App\Http\Controllers\Admin\Mygz\Material;

use App\Http\Controllers\Admin\Mygz\AppMygzController;

use Illuminate\Http\Request;
use App\Http\Requests\MaterialCatRequest;
use App\Repositories\MaterialRepository;

/**
 * 施工材料分类控制器
 *
 */
class MaterialCatController extends AppMygzController
{
    protected $repository;

    public function __construct(MaterialRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->view('material.cat.index');
    }

    public function create()
    {
        return $this->view('material.cat.create');
    }

    public function store(MaterialCatRequest $request)
    {
        $data = $request->all();
        $newData = $this->repository->storeCatalog($data);
        
        if ($newData==null) {
            return redirect()->back()->withInput($request->input())->with('fail', '该名称的分类已经存在，请使用其他的名称！');
        }
        
        if ($newData->id) {  
            //添加成功
            return redirect()->to(site_path('mygz/material/cat', 'admin'))->with('message', '成功新增分类！');
        } else {  
            //添加失败
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        $catalog = $this->repository->editCatalog($id);
        $catalog->pid = $catalog->getCatalogNameById($catalog->pid);

        return $this->view('material.cat.edit', compact('catalog'));
    }

    public function update(MaterialCatRequest $request, $id)
    {
        $data = $request->all();
        $newData = $this->repository->updateCatalog($id, $data);
        if ($newData==null) {
            return redirect()->back()->withInput($request->input())->with('fail', '该名称的分类已经存在，请使用其他的名称！');
        }
        
        return redirect()->to(site_path('mygz/material/cat', 'admin'))->with('message', '修改成功！');
    }
    
    public function show($id)
    {
        $catalog = $this->repository->editCatalog($id);
        $catalog->pid_name = $catalog->getCatalogNameById($catalog->pid);
        return $this->view('material.cat.show', compact('catalog'));
    }
    
    public function remove(Request $request)
    {     
        $rth['code'] = "500";
        $rth['message'] = "未知错误";
        
        $delId = $request->input('delId');
        $flag = $this->repository->removeCatalog($delId);
        if ($flag == -1) {
            $rth['code'] = "201";
            $rth['message'] = "该角色不存在，或已经被删除了！";
        } else if ($flag == 0) {
            $rth['code'] = "500";
            $rth['message'] = "删除失败";
        } else if ($flag == 1) {
            $rth['code'] = "200";
            $rth['message'] = "删除成功";
        } else if ($flag == 2) {
            $rth['code'] = "300";
            $rth['message'] = "该分类下还有子分类，请先删除子类";
        } 
        
        return $rth;
    }
}
