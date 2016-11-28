<?php 

namespace App\Loggers;

use Illuminate\Http\Request;
use App\Model\SMSLogModel;

/**
 * 短信验证码日志记录器
 * 操作模型：SMSLogModel
 * 操作数据表：sms_log
 *
 * @package App\Loggers
 * 
 */
class SMSLogger
{
    public static function write($data)
    {
        if (is_array($data)) {
            if (array_key_exists('phone', $data)) {
                $data = array_add($data, 'type', '');
                $data = array_add($data, 'url', '');
                $data = array_add($data, 'content', '');
                $data = array_add($data, 'vcode', '');
                $data = array_add($data, 'res', '');
                $data = array_add($data, 'operator_ip', app('request')->ip());
                $sms_log = new SMSLogModel;
                $sms_log->fill($data);
                return $sms_log->save($data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function isValidate($phone, $vcode, $type)
    {
        if ($phone===null || empty($phone)) {
        	return 0;
        }
        
        if ($vcode===null || empty($vcode)) {
        	return 0;
        }
        
        $sms_log = SMSLogModel::whereRaw('phone=? and type=?', 
            [$phone,$type])->orderBy('updated_at', 'desc')->get()->first();
        
        // 是否存在短信
        if ($sms_log===null || empty($sms_log)) {
            return -1;
        }
        
        // 验证码是否相同
        if (strcmp($sms_log->vcode,$vcode)!=0) {
            return -1;
        }
        
        // 是否超时
        $tNow = time();
        $tSend = strtotime($sms_log->updated_at);
        $timediff = $tNow - $tSend;
        if ($timediff > 3600) {
            return -2;
        }
            
        return 1;
    }
}
