<?php

namespace App\Http\Controllers\Admin;

/**
 * 快捷控制面板
 *
 */
class HomeController extends BackController
{
    public function getIndex()
    {
        return $this->view('home.index');
    }
}
