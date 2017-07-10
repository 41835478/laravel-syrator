<?php

namespace App\Model;

use Zizaco\Entrust\EntrustPermission;

/**
 * 权限模型
 *
 */
class PermissionModel extends EntrustPermission
{
    protected $table = 'permissions';
    
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, "permission_role", "permission_id", "role_id");
    }
    
    public function getFullTableName() {
        return $this->getConnection()->getTablePrefix().$this->table;
    }
}
