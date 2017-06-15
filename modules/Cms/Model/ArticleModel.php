<?php

namespace Modules\Cms\Model;

use Syrator\Data\SyratorModel;

class ArticleModel extends SyratorModel
{
    protected $table = 'article';
    
    public function getCatalogName() {    
        if ($this->catalog_id==0) {
            return "顶级分类";
        }
    
        $cat = ArticleCatalogModel::find($this->catalog_id);
        if (empty($cat)) {
            return $this->catalog_id;
        }
    
        return $cat->name;
    }
}
