<?php

namespace Modules\Cms\Model;

use Illuminate\Database\Eloquent\Model;

use Modules\Cms\Libraries\EditProperty;

class BaseModel extends Model
{    
    public function getFullTableName() {
        return $this->getConnection()->getTablePrefix().$this->table;
    }
    
    public function getFullColumnsInfo() {
        return $this->getConnection()->select('SHOW FULL COLUMNS FROM '.$this->getFullTableName());
    }
    
    public function getEditStructs() {
        $editStruct = array();
         
        $editProperty = new EditProperty();
        $editProperty->name = 'title';
        $editProperty->type = 'text';
        $editProperty->alias = '标题';
        $editProperty->placeholder = '请输入标题';
        $editProperty->is_request = true;
        $editStruct[$editProperty->name] = $editProperty;
         
        $editProperty = new EditProperty();
        $editProperty->name = 'cat_id';
        $editProperty->type = 'select_tree';
        $editProperty->alias = '所属分类';
        $editProperty->placeholder = '请选择分类';
        $editStruct[$editProperty->name] = $editProperty;
         
        $editProperty = new EditProperty();
        $editProperty->name = 'content';
        $editProperty->type = 'textarea';
        $editProperty->alias = '内容';
        $editStruct[$editProperty->name] = $editProperty;
        
        return $editStruct;
        return $this->getConnection()->select('SHOW FULL COLUMNS FROM '.$this->getFullTableName());
    }
}
