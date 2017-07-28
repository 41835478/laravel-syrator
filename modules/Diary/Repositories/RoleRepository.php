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
    
    public function doStat($aryIds, $strBegin, $strEnd, $aryFields) {
        $rtn = array();        
        $diarys = array();
        
        // 获取当前
        $date = strtotime($strBegin);
        $end = strtotime($strEnd);
        while ($date <= $end) {
            $strDate = date('Y-m-d', $date);
            $diarys[$strDate] = array();
            foreach ($aryIds as $key => $value) {
                $objDiary = $this->getRoleOfDay($value, $strDate);
                $diarys[$strDate][$value] = $objDiary;
            }
            
            $date = $date + 3600*24;
        }
        
        // 计算，合计
        $date = strtotime($strBegin);
        $end = strtotime($strEnd);
        $count = 0;
        while ($date <= $end) {
            $strDate = date('Y-m-d', $date);
            $rtn[$count] = array();
            $rtn[$count]['date'] = $strDate;
            foreach ($aryFields as $field) {
                $rtn[$count][$field] = 0;
            }
            
            foreach ($aryIds as $key => $value) {
                foreach ($aryFields as $field) {
                    if (!empty($diarys[$strDate][$value])) {
                        $rtn[$count][$field] += $diarys[$strDate][$value]->$field;                        
                    }
                }
            }
        
            $date = $date + 3600*24;
            $count++;
        }
        
        return $rtn;
    }
    
    public function getRoleOfDay($role_id, $date) {
        return GameRoleDiaryModel::whereRaw('role_id=? and date<=?', [$role_id,$date])->get()->first();
    }
}
