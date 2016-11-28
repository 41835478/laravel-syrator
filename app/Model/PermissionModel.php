<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 权限模型
 *
 */
class PermissionModel extends Model
{
    protected $table = 'permissions';
    
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, "permission_role", "permission_id", "role_id");
    }
}
