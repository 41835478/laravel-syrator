<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

class MemberSignModel extends SyratorModel
{
    use SoftDeletes;
    
    protected $table = 'member_sign';
    
    public function getMember() {      
        return MemberModel::find($this->member_id);
    }
}
