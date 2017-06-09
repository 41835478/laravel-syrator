<?php

namespace App\Repositories\System;

use App\Repositories\BaseRepository;
use Syrator\Data\SyratorRepository;

use App\Model\System\AppGuideModel;

/**
 * 模板仓库ThemeRepository
 *
 */
class AppGuideRepository extends SyratorRepository
{    
    public function __construct(AppGuideModel $model)
    {
        $this->model = $model;
    }
    
    public function all()
    {
        $themes = $this->model->all();
        return $themes;
    }
    
    private function saveModel($model, $inputs)
    {
        $model->name = e($inputs['name']);
        $model->url = e($inputs['url']);
        $model->description = e($inputs['description']);
        $model->sort_num = e($inputs['sort_num']);
        $model->is_show = e($inputs['is_show']);
    
        if ($model->save()) {
        }
    
        return $model;
    }

    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }

    public function store($inputs, $extra = '')
    {
        $model = new $this->model;
        $model = $this->saveModel($model, $inputs);
        return $model;
    }

    public function edit($id, $extra = '')
    {
        $model = $this->getById($id);
        return $model;
    }

    public function update($id, $inputs, $extra = '')
    {
        $model = $this->getById($id);
        $model = $this->saveModel($model, $inputs);
    }
}
