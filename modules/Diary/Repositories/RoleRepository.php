<?php

namespace Modules\Diary\Repositories;

use Syrator\Data\SyratorRepository;

use Modules\Diary\Model\GameRoleModel;
use Modules\Diary\Model\GameRoleDiaryModel;

class RoleRepository extends SyratorRepository
{
    public function getAllRoles() {
        return GameRoleModel::all();
    }
    
    public function doStat($ids, $begin, $end) {
        $rtn = array();
        
        $date = strtotime($begin);
        $end = strtotime($end);
        while ($date <= $end) {
            $strDate = date('Y-m-d', $date);
            foreach ($ids as $key => $value) {
                $objDiary = $this->getStatRoleOfDay($value, $strDate);
                return $objDiary;
            }
            
            $date = $date + 3600*24;
        }
        
        $rtn = date('Y-m-d', $objDiary);
        
        return $rtn;
    }
    
    public function getStatRoleOfDay($role_id, $date) {
        return GameRoleDiaryModel::whereRaw('role_id=? and date<=?', [$role_id,$date])->get()->first();
    }
}
