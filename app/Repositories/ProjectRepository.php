<?php

namespace App\Repositories;

use App\Model\ProjectModel;

/**
 * 工程信息仓库ProjectRepository
 * 主 Model 为 Project
 *
 */
class ProjectRepository extends BaseRepository
{
    public function __construct(ProjectModel $model)
    {
        $this->model = $model;
    }
    
    // 资源 REST 相关的接口函数
    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }

    public function store($inputs, $extra = '')
    {
        
    }

    public function edit($id, $extra = '')
    {
        
    }

    public function update($id, $inputs, $extra = '')
    {
        
    }
    
    // 公共函数
    public function all()
    {
        $results = $this->model->all();
        return $results;
    }
}
