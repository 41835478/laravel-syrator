<?php

namespace Modules\Diary\Model;

use Syrator\Data\SyratorModel;

class GameRoleModel extends SyratorModel
{
    protected $connection = 'mysql_diary';    
    protected $table = 'diary_game_role';
    
    public function getCurrentDiary() {
        return GameRoleDiaryModel::where('role_id','=',$this->id)->get()->first();
    }
}
