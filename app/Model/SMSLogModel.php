<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * 短信验证码日志模型
 *
 */
class SMSLogModel extends Model
{
    use SoftDeletes;

    protected $table = 'sms_logs';
    
    protected $fillable = ['phone', 'type', 'url', 'content', 'vcode', 'res', 'operator_ip'];
}
