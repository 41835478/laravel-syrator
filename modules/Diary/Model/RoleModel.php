<?php

namespace Modules\Diary\Model;

use Syrator\Data\SyratorModel;

class RoleModel extends SyratorModel
{
    protected $connection = 'mysql_game';
    
    protected $table = 'role';
}
