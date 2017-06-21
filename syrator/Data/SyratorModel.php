<?php

namespace Syrator\Data;

use Illuminate\Database\Eloquent\Model;

class SyratorModel extends Model
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
        $columns = $this->getFullColumnsInfo();
        foreach ($columns as $key => $column) {
            if ($column->Field=="id" || $column->Field=="created_at" || $column->Field=="updated_at" || $column->Field=="deleted_at") {
                continue;
            }
            
            $editProperty = new SyratorEditProperty();
            
            // 字段名称
            $fieldName = $column->Field;
            $editProperty->name = $fieldName;
            
            // 字段别名
            $fieldAlias = $column->Comment;
            if (empty($fieldAlias)) {
                $editProperty->alias = $fieldName;
            } else {
                $editProperty->alias = $fieldAlias;
            }
            
            // 提示语
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
            } else {
                $editProperty->type = $column->Type;
            }
            
            // 值
            $editProperty->value = $this->$fieldName;
            
            // 添加到类表
            $editStruct[$editProperty->name] = $editProperty;
        }
        
        return $editStruct;
    }
    
    public function saveFromInput($inputs) {
        $columns = $this->getFullColumnsInfo(); 
        foreach ($columns as $key => $column) {
            $key = $column->Field;
            if ($key=="id" || $key=="created_at" || $key=="updated_at" || $column->Field=="deleted_at") {
                continue;
            }
            
            if (isset($inputs[$key])) {
                $this->$key = $inputs[$key];                
            }
        }
    
        return $this->save();
    }
}
