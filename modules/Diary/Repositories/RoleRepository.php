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
        return GameRoleDiaryModel::all();
    }
}
