<?php 

namespace App\Loggers;

use Illuminate\Http\Request;
use App\Model\MemberLogModel;

/**
 * Class
 * 会员日志记录器
 *
 * @package App\Loggers
 * 
 */
class MemberLogger
{
    public static function write($data)
    {
        if (is_array($data)) {
            if (array_key_exists('content', $data)) {
                $data = array_add($data, 'member_id', 0);
                $data = array_add($data, 'entity_id', 0);
                $data = array_add($data, 'type', 'member');
                $data = array_add($data, 'url', app('request')->url());
                $data = array_add($data, 'operator_ip', app('request')->ip());  //操作者ip
                $sys_log = new MemberLogModel;
                $sys_log->fill($data);
                return $sys_log->save($data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
