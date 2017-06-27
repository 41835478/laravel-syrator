<?php

namespace Modules\Cms\Model;

use Syrator\Data\SyratorModel;

use App\Model\MemberLogModel;

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
    
    public function getViewCount() {
        
        if ($this->id <= 0) {
            return 0;
        }
    
        $res = MemberLogModel::whereRaw('entity_id=? and type=?', 
            [$this->id,"view-article"])->count();
        return $res;
    }
}
