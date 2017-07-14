<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Illuminate\Http\Request;

class HomeController extends GameController
{
    public function index(Request $request)
    {
        return $this->view('index');
    }
}
