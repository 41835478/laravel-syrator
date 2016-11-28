<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 角色模型
 *
 */
class RoleModel extends Model
{
    protected $table = 'roles';
    
    /**
     * 建立与 permission 关联关系
     */
    public function perms()
    {
        return $this->belongsToMany(PermissionModel::class, "permission_role", "permission_id", "role_id");
    }

    public function givePermissionTo($permission)
    {
        return $this->perms()->save($permission);
    }

}
