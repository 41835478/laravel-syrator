<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

use Modules\Diary\Model\GameRoleModel;

class HomeController extends GameController
{
    public function index(Request $request)
    {
        $roles = GameRoleModel::all();
        echo json_encode($roles);
        exit();
        return $this->view('index');
    }
}
