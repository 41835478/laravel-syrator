<?php

namespace App\Http\Controllers\Mobile\Freight;

use App\Http\Controllers\Mobile\MobileController;

class FreightController extends MobileController
{
    public function getList()
    {
        return $this->view('freight.index');
    }
    
    public function show($id)
    {
    	return $this->view('freight.show');
    }
}
