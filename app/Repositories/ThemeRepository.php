<?php

namespace App\Repositories;

use App\Model\ThemeModel;

/**
 * 模板仓库ThemeRepository
 *
 */
class ThemeRepository extends BaseRepository
{    
    public function __construct(ThemeModel $theme)
    {
        $this->model = $theme;
    }
    
    public function all()
    {
        $themes = $this->model->all();
        return $themes;
    }
    
    private function saveTheme($theme, $inputs)
    {
        $theme->code = e($inputs['code']);
        $theme->name = e($inputs['name']);
        $theme->description = e($inputs['description']);
        $theme->author = e($inputs['author']);
        $theme->version = e($inputs['version']);
        $theme->is_current = e($inputs['is_current']);
    
        if ($theme->save()) {
        }
    
        return $theme;
    }

    #********
    #* 资源 REST 相关的接口函数 START
    #********
    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }

    public function store($inputs, $extra = '')
    {
        $theme = new $this->model;
        $theme = $this->saveTheme($theme, $inputs);
        return $theme;
    }

    public function edit($id, $extra = '')
    {
        $theme = $this->getById($id);
        return $theme;
    }

    public function update($id, $inputs, $extra = '')
    {
        $theme = $this->getById($id);
        $theme = $this->saveTheme($theme, $inputs);
    }
    #********
    #* 资源 REST 相关的接口函数 END
    #********
}
