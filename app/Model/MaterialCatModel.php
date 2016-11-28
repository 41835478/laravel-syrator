<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 材料分类模型
 *
 */
class MaterialCatModel extends Model
{
    protected $table = 'material_cat';
    
    public function getCatalogByName($name) {
        return self::where('name','=',$name)->get()->first();
    }
    
    public function getCatalogIdByName($name) {        
        $objCatalog = self::where('name','=',$name)->get()->first();
        if ($objCatalog!=null && !empty($objCatalog)) {
            return $objCatalog->id;
        }
    
        return null;
    }
    
    public function getCatalogNameById($id) {
        if ($id==0) {
            return "顶级分类";
        }
        
        $objCatalog = self::find($id);
        if ($objCatalog!=null && !empty($objCatalog)) {
            return $objCatalog->name;
        }
    
        return "";
    }
    
    public function isHasChild() {
        $subCatalogs = $this->where('pid','=',$this->id)->get();
        if ($subCatalogs!=null && count($subCatalogs)>0) {
            return true;
        }
    
        return false;
    }
}
