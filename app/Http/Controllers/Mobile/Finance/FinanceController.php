<?php

namespace App\Http\Controllers\Mobile\Finance;

use App\Http\Controllers\Mobile\MobileController;

class FinanceController extends MobileController
{
    public function getList()
    {
        return $this->view('finance.index');
    }
    
    public function show($id)
    {
    	return $this->view('finance.show');
    }
}
