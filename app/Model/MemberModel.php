<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 会员模型
 *
 */
class MemberModel extends Authenticatable
{
    protected $table = 'member';
    
    public static function mergeData($data){
        if(!empty($data)){
            foreach($data as &$v){
                $v->role_name = $v->getRoleName();
            }
        }
        return $data;
    }
    
    public function getRoleName() {
        if (empty($this->role)) {
            return $this->role;
        } 
    
        $rank = MemberRankModel::find($this->role);
        if (empty($rank)) {
            return $this->role;
        }
    
        return $rank->name;
    }
}
