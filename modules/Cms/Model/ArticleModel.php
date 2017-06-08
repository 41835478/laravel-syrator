<?php

namespace Modules\Cms\Model;

use Syrator\Data\SyratorBaseModel;

class ArticleModel extends SyratorBaseModel
{
    protected $table = 'article';
    
    public function getCatName() {
        if (empty($this->cat_id)) {
            return $this->cat_id;
        }
    
        if ($this->cat_id==-1) {
            return "保留";
        }
    
        $cat = ArticleCatModel::find($this->cat_id);
        if (empty($cat)) {
            return $this->cat_id;
        }
    
        return $cat->name;
    }
}
