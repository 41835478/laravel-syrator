<?php

namespace Modules\Diary\Model;

use Syrator\Data\SyratorModel;

class GameRoleDiaryModel extends SyratorModel
{
    protected $connection = 'mysql_diary';    
    protected $table = 'diary_game_role_diary';
}
