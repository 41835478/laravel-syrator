<?php

namespace App\Model;

use Zizaco\Entrust\EntrustRole;

/**
 * 角色模型
 *
 */
class RoleModel extends EntrustRole
{
    protected $table = 'roles';
    
    /**
     * 建立与 permission 关联关系
     */
    public function perms()
    {
        return $this->belongsToMany(PermissionModel::class, "permission_role", "role_id", "permission_id");
    }

    public function givePermissionTo($permission)
    {
        return $this->perms()->save($permission);
    }

}
