<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberPointsModel extends Model
{
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
