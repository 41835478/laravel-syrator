<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 系统日志模型
 *
 */
class SystemLogModel extends SyratorModel
{
    use SoftDeletes;

    protected $table = 'system_logs';
    
    protected $fillable = ['user_id', 'type', 'url', 'content', 'operator_ip'];

     /**
     * 操作用户
     * 模型对象关系：系统日志对应的操作用户
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Model\UserModel', 'user_id', 'id');
    }
}
