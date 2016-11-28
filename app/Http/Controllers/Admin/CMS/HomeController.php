<?php

namespace App\Http\Controllers\Admin\CMS;

/**
 * 快捷控制面板
 *
 */
class HomeController extends AppCmsController
{
    public function getIndex()
    {
        return $this->view('home.index');
    }
}
