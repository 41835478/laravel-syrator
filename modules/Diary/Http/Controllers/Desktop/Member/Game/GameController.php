<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

use Modules\Diary\Http\Controllers\BaseController;

class GameController extends BaseController {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->theme = "diary::desktop.member.game.";
    }
}