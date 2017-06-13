<?php

namespace Modules\Cms\Model;

use Syrator\Data\SyratorModel;

class ArticleCatalogModel extends SyratorModel
{
    protected $table = 'article_catalog';
    
    // 递归获取所有分类
    public static function recCatalogs($pid)
    {
        $catalogs = ArticleCatalogModel::getCatalogByPid($pid);
        foreach ($catalogs as $catalog) {
            $sub_catalogs = ArticleCatalogModel::getCatalogByPid($catalog['id']);
            if (count($sub_catalogs) <= 0) {
                $catalog['sub_catalogs'] = $sub_catalogs;
                continue;
            } else {
                $catalog['sub_catalogs'] = ArticleCatalogModel::recCatalogs($catalog['id']);
            }
        }
        return $catalogs;
    }
    
    public static function getCatalogByName($name) {
        return self::where('name','=',$name)->get()->first();
    }
    
    public static function getCatalogIdByName($name) {        
        $objCatalog = self::where('name','=',$name)->get()->first();
        if ($objCatalog!=null && !empty($objCatalog)) {
            return $objCatalog->id;
        }
    
        return null;
    }
    
    public static function getCatalogNameById($id) {
        if ($id==0) {
            return "顶级分类";
        }
        
        $objCatalog = self::find($id);
        if ($objCatalog!=null && !empty($objCatalog)) {
            return $objCatalog->name;
        }
    
        return "";
    }
    
    public static function getCatalogByPid($pid)
    {
        return ArticleCatalogModel::where('pid','=',$pid)->get();
    }
    
    public function isHasChild() {
        $subCatalogs = $this->where('pid','=',$this->id)->get();
        if ($subCatalogs!=null && count($subCatalogs)>0) {
            return true;
        }
    
        return false;
    }
}
