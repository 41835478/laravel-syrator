<?php

namespace App\Http\Controllers\Mobile\Servicer;

use App\Http\Controllers\Mobile\MobileController;

class FenbaoController extends MobileController
{
    public function getList()
    {
        return $this->view('servicer.fenbao.index');
    }
    
    public function show($id)
    {
    	return $this->view('servicer.fenbao.show');
    }
}
