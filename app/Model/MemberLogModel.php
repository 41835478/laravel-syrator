<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 会员日志模型
 *
 */
class MemberLogModel extends SyratorModel
{
    use SoftDeletes;

    protected $table = 'member_logs';
    
    protected $fillable = ['member_id', 'entity_id', 'type', 'url', 'content', 'operator_ip'];

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
