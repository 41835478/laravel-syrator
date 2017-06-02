<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberSignModel extends Model
{
    protected $table = 'member_sign';
    
    public function getMember() {      
        return MemberModel::find($this->member_id);
    }
}
