<?php

namespace Modules\Diary\Model;

use Syrator\Data\SyratorModel;

class GameMaterialDiaryModel extends SyratorModel
{
    protected $connection = 'mysql_diary';    
    protected $table = 'diary_game_material_diary';
}
