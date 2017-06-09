<?php

namespace Modules\Cms\Model;

use Syrator\Data\SyratorModel;

class ArticleModel extends SyratorModel
{
    protected $table = 'article';
    
    public function getCatName() {
        if (empty($this->cat_id)) {
            return $this->cat_id;
        }
    
        if ($this->cat_id==-1) {
            return "保留";
        }
    
        $cat = ArticleCatalogModel::find($this->cat_id);
        if (empty($cat)) {
            return $this->cat_id;
        }
    
        return $cat->name;
    }
}
