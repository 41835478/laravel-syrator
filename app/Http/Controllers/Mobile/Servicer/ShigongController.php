<?php

namespace App\Http\Controllers\Mobile\Servicer;

use App\Http\Controllers\Mobile\MobileController;

class ShigongController extends MobileController
{
    public function getList()
    {
        return $this->view('servicer.shigong.index');
    }
    
    public function show($id)
    {
    	return $this->view('servicer.shigong.show');
    }
}
