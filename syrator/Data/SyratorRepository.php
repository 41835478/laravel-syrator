<?php

namespace Syrator\Data;

use App\Interfaces\IRepository;

abstract class SyratorRepository implements IRepository
{
    protected $model;

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function index($data = [], $extra = '', $size = null)
    {
        return $this->model->all();
    }
    
    public function store($inputs, $extra = '')
    {
        $item = new $this->model;
        $item->saveFromInput($inputs);
        return $item;
    }
    
    public function edit($id, $extra = '')
    {
        $item = $this->getById($id);
        return $item;
    }
    
    public function update($id, $inputs, $extra = '')
    {
        $item = $this->getById($id);
        $item->saveFromInput($inputs);
        return $item;
    }
    
    public function destroy($id = 0, $extra = '')
    {
        return;
    }
}
