<?php

namespace App\Repositories;

use App\Model\FeedbackModel;

class FeedbackRepository extends BaseRepository
{    
    public function __construct(FeedbackModel $model)
    {
        $this->model = $model;
    }
    
    public function all()
    {
        return $this->model->all();
    }

    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }

    public function store($inputs, $extra = '')
    {
        $model = new $this->model;
        $model = $this->save($model, $inputs);
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
        $model = $this->save($model, $inputs);
    }
    
    private function save($model, $inputs)
    {
        $model->user_id = e($inputs['user_id']);
        $model->content = e($inputs['content']);
        $model->images_urls = e($inputs['images_urls']);
    
        if ($model->save()) {
            return $model;
        }
        
        return null;
    }
    
    public function reply($id, $inputs)
    {
        $model = $this->getById($id);
        if (empty($model)) {
            return null;
        }
        
        $model->reply_user_id = e($inputs['reply_user_id']);
        $model->reply_content = e($inputs['reply_content']);
        if ($model->save()) {
            return $model;
        }
        
        return null;
    }
}
