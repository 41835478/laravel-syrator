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
        
        // 先获取表结构
        $columns = $this->getConnection()->select('SHOW FULL COLUMNS FROM '.$this->getFullTableName());

        foreach ($columns as $key => $column) {
            if ($column->Field=="id" || $column->Field=="created_at" || $column->Field=="updated_at") {
                continue;
            }
            
            $editProperty = new EditProperty();
            
            // 字段名称与别名
            $editProperty->name = $column->Field;
            if (empty($column->Comment)) {
                $editProperty->alias = $column->Field;
            } else {
                $editProperty->alias = $column->Comment;
            }
            $editProperty->placeholder = '请输入'.$editProperty->alias;
            
            // 字段类型
            $fieldType = strstr($column->Type, '(', true);
            if (empty($fieldType)) {
                $fieldType = $column->Type;
            }
            if ($fieldType=="varchar") {
                $editProperty->type = "text";
            } else if ($fieldType=="text" 
                || $fieldType=="mediumtext" 
                || $fieldType=="longtext") {
                $editProperty->type = "textarea";
            } else if ($fieldType=="tinyint" 
                || $fieldType=="smallint" 
                || $fieldType=="int" 
                || $fieldType=="mediumint" 
                || $fieldType=="integer" 
                || $fieldType=="bigint") {
                $editProperty->type = "int";                
            } else if ($fieldType=="double" 
                || $fieldType=="float") {
                $editProperty->type = "double";                
            }
            
            // 添加到类表
            $editStruct[$editProperty->name] = $editProperty;
        }
        
        return $editStruct;
    }
}
