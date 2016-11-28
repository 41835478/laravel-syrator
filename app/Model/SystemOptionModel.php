<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置模型
 *
 */
class SystemOptionModel extends Model
{

    protected $table = 'system_options';

    public $timestamps = false;  //关闭自动更新时间戳
}
