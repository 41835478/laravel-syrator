<?php

namespace App\Http\Controllers\Admin\Mygz;

/**
 * 快捷控制面板
 *
 */
class MygzHomeController extends AppMygzController
{
    public function getIndex()
    {
        return $this->view('home.index');
    }
}
