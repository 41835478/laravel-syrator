<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 材料模型
 *
 */
class MaterialModel extends Model
{
    protected $table = 'material';
    
    public function getCatName() {
        if (empty($this->cat_id)) {
            return $this->cat_id;
        }
    
        if ($this->cat_id==-1) {
            return "保留";
        }
    
        $cat = MaterialCatModel::find($this->cat_id);
        if (empty($cat)) {
            return $this->cat_id;
        }
    
        return $cat->name;
    }
    
    public function getType() {
        if ($this->article_type==1) {
            return "置顶";
        } else if ($this->article_type==0) {
            return "普通";
        } else {
            return "";
        }
    }
    
    public function getIsOpen() {
        if ($this->is_open==1) {
            return "是";
        } else if ($this->is_open==0) {
            return "否";
        } else {
            return "";
        }
    }
}
