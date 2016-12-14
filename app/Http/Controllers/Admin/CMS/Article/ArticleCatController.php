<?php

namespace App\Http\Controllers\Admin\CMS\Article;

use App\Http\Controllers\Admin\CMS\AppCmsController;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Gate;

/**
 * 文章分类控制器
 *
 */
class ArticleCatController extends AppCmsController
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();
        $this->article = $article;
    }

    public function index()
    {
        $catalogs = $this->article->indexCat();
        return $this->view('article.cat.index', compact('catalogs'));
    }

    public function create()
    {
        $catalogs = $this->article->indexCat();
        return $this->view('article.cat.create', compact('catalogs'));
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        $role = $this->role->store($data);
        if ($role->id) {  
            //添加成功
            return redirect()->to(site_path('role', 'admin'))->with('message', '成功新增角色！');
        } else {  
            //添加失败
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        $role = $this->role->edit($id);
        $permissions = $this->role->permissions();
        $cans = $this->role->getRoleCans($role);

        return $this->view('article.cat.edit', compact('role', 'permissions', 'cans'));
    }

    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        $this->role->update($id, $data);
        return redirect()->to(site_path('role', 'admin'))->with('message', '修改角色成功！');
    }
    
    public function show($id)
    {
        $role = $this->role->edit($id);
        $permissions = $this->role->permissions();
        $cans = $this->role->getRoleCans($role);
    
        return $this->view('article.cat.show', compact('role', 'permissions', 'cans'));
    }
    
    public function remove(Request $request)
    {        
        $delId = $request->input('delId');

        $objItem = Role::find($delId);
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
            $rth['message'] = "该角色不存在，或已经被删除了！";
        }  
        
        return $rth;
    }
}
