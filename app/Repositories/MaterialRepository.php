<?php

namespace App\Repositories;

use App\Model\MaterialModel;
use App\Model\MaterialCatModel;

/**
 * 施工材料仓库MaterialRepository
 * 主 Model 为 Material
 *
 */
class MaterialRepository extends BaseRepository
{
    protected $catalogs;
    
    public function __construct(MaterialModel $model, MaterialCatModel $catalogs)
    {
        $this->model = $model;
        $this->catalogs = $catalogs;
    }
    
    private function getCatalogById($id)
    {
        return $this->catalogs->findOrFail($id);
    }
    
    private function saveCatalog($catalog, $inputs)
    {        
        // 新增，需要判断名称的唯一性
        if (empty($catalog->id)) {
            $temp = $catalog->getCatalogIdByName(e($inputs['name']));
            if ($temp!=null && !empty($temp) && $temp>0) {
                return null;
            }
        }
        
        // 更新,且名称改变
        if ($catalog->name!=e($inputs['name'])) {
            $temp = $catalog->getCatalogIdByName(e($inputs['name']));
            if ($temp!=null && !empty($temp) && $temp>0) {
                return null;
            }
        }
        
        $catalog->name = e($inputs['name']);        
        if (e($inputs['parent'])=='顶级分类') {
            $catalog->pid = 0;
        } else {
            $catalog->pid = $catalog->getCatalogIdByName(e($inputs['parent']));            
        }
        $catalog->sort_num = e($inputs['sort_num']);
        $catalog->is_show = e($inputs['is_show']);
        $catalog->keywords = e($inputs['keywords']);
        $catalog->description = e($inputs['description']);
        
        if ($catalog->save()) {
            return $catalog;
        }
    
        return $catalog;
    }
    
    private function deleteCatalog($id)
    {
        $objItem = MaterialCatModel::find($id);
        if (!empty($objItem)) {
            if ($objItem->isHasChild()) {
                return 2;
            }
            
            if ($objItem->delete()) {
                return 1;
            }
            
            return 0;
        } else {
            return -1;
        }
        
        return -1;
    }
    
    // 资源 REST 相关的接口函数
    public function index($data = [], $extra = '', $size = null)
    {
        return $this->all();
    }

    public function store($inputs, $extra = '')
    {
        
    }

    public function edit($id, $extra = '')
    {
        
    }

    public function update($id, $inputs, $extra = '')
    {
        
    }
    
    public function storeCatalog($inputs)
    {
        $newCatalog = new $this->catalogs;
        $newCatalog = $this->saveCatalog($newCatalog, $inputs);
        return $newCatalog;
    }
    
    public function editCatalog($id, $extra = '')
    {
        $catalog = $this->getCatalogById($id);
        return $catalog;
    }
    
    public function updateCatalog($id, $inputs, $extra = '')
    {
        $catalog = $this->getCatalogById($id);
        $catalog = $this->saveCatalog($catalog, $inputs);
        return $catalog;
    }
    
    public function removeCatalog($id)
    {
        return $this->deleteCatalog($id);
    }
    
    // 公共函数
    public function all()
    {
        $results = $this->model->all();
        return $results;
    }
    
    // 分类相关
    public function catalogs()
    {
        $catalogs = $this->catalogs->all();
        return $catalogs;
    }
    
    // 获取所有的分类：0为根目录
    public function getCatalogs($param = null)
    {
        if ($param==null) {
            return $this->recCatalogs(0);
        }
        
        if (empty(e($param['format_type']))) {
            return $this->recCatalogs(0);
        }
        
        if ($param['format_type'] == "list") {
            return $this->catalogs->all();
        }
        
        return $this->recCatalogs(0);
    }
    
    // 递归获取所有分类
    public function recCatalogs($pid)
    {
        $catalogs = $this->getCatalogByPid($pid);
        foreach ($catalogs as $catalog) {
            $sub_catalogs = $this->getCatalogByPid($catalog['id']);
            if (count($sub_catalogs) <= 0) {
                $catalog['sub_catalogs'] = $sub_catalogs;
                continue;
            } else {
                $catalog['sub_catalogs'] = $this->recCatalogs($catalog['id']);
            }
        }
        return $catalogs;
    }
    
    // 根据父pid获取分类
    public function getCatalogByPid($pid)
    {
        return $this->catalogs->where('pid','=',$pid)->get();
    }
}
