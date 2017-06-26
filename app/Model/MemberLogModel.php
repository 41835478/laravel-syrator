<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * 会员日志模型
 *
 */
class MemberLogModel extends Model
{
    use SoftDeletes;

    protected $table = 'system_logs';
    
    protected $fillable = ['user_id', 'member_id', 'type', 'url', 'content', 'operator_ip'];

     /**
     * 操作用户
     * 模型对象关系：日志对应的操作用户
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Model\MemberModel', 'member_id', 'id');
    }
}
