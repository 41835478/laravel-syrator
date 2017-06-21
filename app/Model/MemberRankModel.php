<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员等级/分组模型
 *
 */
class MemberRankModel extends Model
{
    use SoftDeletes;
    
    protected $table = 'member_rank';
    
    public function getMembers() {
        if (empty($this->id)) {
            return null;
        }
      
        return MemberModel::where('role', '=', $this->id)->get();
    }
    
    public function hasMembers() {
        $members = $this->getMembers();
        
        if (count($members)>0) {
            return true;
        }
    
        return false;
    }
}
