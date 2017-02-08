<?php

namespace Modules\Wechat\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * 微信接口配置模型
 *
 */
class WechatParamModel extends Model
{

    protected $table = 'wechat_params';

    public $timestamps = false;  //关闭自动更新时间戳
}
