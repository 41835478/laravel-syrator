<?php

namespace Modules\Cms\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
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
