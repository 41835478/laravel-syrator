<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

use Modules\Diary\Model\GameRoleModel;
use Modules\Diary\Repositories\RoleRepository;

class HomeController extends GameController
{
    public function index(Request $request)
    {
        $roles = GameRoleModel::all();
        return $this->view('index', compact('roles'));
    }
    
    public function postStat(Request $request)
    {
        $param = [
            'role_ids' => $request->input('role_ids'),
            'date_start' => e($request->input('date_start')),
            'date_end' => e($request->input('date_end')),
        ];
        
        // 参数检测
        if (empty($param['role_ids'])) {
            return self::responseFailed('301','角色不能为空');
        }
        
        if (empty($param['date_start'])) {
            return self::responseFailed('302','开始日期不能为空');
        }
        
        if (empty($param['date_end'])) {
            return self::responseFailed('303','结束日期不能为空');
        }
        
        $repository = new RoleRepository();
        $roles = $repository->doStat($param['role_ids'], $param['date_start'], $param['date_end']);
        return self::responseSuccess('成功',$roles);
    }
}
