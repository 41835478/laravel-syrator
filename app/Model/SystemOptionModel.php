<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Syrator\Data\SyratorModel;

/**
 * 系统配置模型
 *
 */
class SystemOptionModel extends SyratorModel
{
    use SoftDeletes;

    protected $table = 'system_options';

    public $timestamps = false;  //关闭自动更新时间戳
}
