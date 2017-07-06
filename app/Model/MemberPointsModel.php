<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

class MemberPointsModel extends SyratorModel
{
    use SoftDeletes;
    
    protected $table = 'member_points';
    
    public static function mergeData($data){
        if(!empty($data)){
            foreach($data as &$v){
                $v->date = date("Y-m-d",strtotime($v->created_at));
                $v->shCost = intval($v->cost);
                if ($v->cost >= 0) {
                    $v->shCost = '+'.intval($v->cost);
                }
            }
        }
        return $data;
    }
    
    public function getMember() {      
        return MemberModel::find($this->member_id);
    }
}
