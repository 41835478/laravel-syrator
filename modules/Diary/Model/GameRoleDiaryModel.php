<?php

namespace Modules\Diary\Model;

use Syrator\Data\SyratorModel;

class GameRoleDiaryModel extends SyratorModel
{
    protected $connection = 'mysql_diary';    
    protected $table = 'diary_game_role_diary';
    
    public function getRoleName() {
        $role = GameRoleModel::find($this->role_id);
        if (!empty($role)) {
            return $role->name;
        }
    
        return "";
    }
    
    public function getStar() {
        if ($this->stone>=600) {
            return 7;            
        }
        
        if ($this->stone>=360) {
            return 6;
        }
        
        if ($this->stone>=200) {
            return 5;
        }
        
        if ($this->stone>=100) {
            return 4;
        }
        
        if ($this->stone>=50) {
            return 3;
        }
        
        if ($this->stone>=20) {
            return 2;
        }
        
        return 0;
    }
}
