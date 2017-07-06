<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 会员模型
 *
 */
class MemberModel extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'member';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'email', 'password', 'phone',
    ];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function mergeData($data){
        if(!empty($data)){
            foreach($data as &$v){
                $v->role_name = $v->getRoleName();
            }
        }
        return $data;
    }
    
    public function getFullTableName() {
        return $this->getConnection()->getTablePrefix().$this->table;
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
    
    public function getPointsBill() {
        $bill = MemberPointsModel::where('member_id', '=', $this->id)->get();    
        return $bill;
    }
    
    public function getPoints() {
        $points = MemberPointsModel::where('member_id', '=', $this->id)->sum('cost');
        return intval($points);
    }
    
    public function expendPoints($id, $cost, $title) {
        $points = new MemberPointsModel();
        $points->member_id = $this->id;
        $points->product_id = $id;
        $points->cost = $cost * (-1);
        $points->title = $title;
        return $points->save();
    }
    
    public function isSign() {
        $curDate = date("Y-m-d");
        $signLog = MemberSignModel::whereRaw('member_id=? and date=?',[$this->id,$curDate])->get();
        if (empty($signLog) || count($signLog)<=0) {
            return false;
        }
        
        return true;
    }
}
