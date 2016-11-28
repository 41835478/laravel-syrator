<?php

namespace App\Http\Controllers\Mobile\Cases;

use App\Http\Controllers\Mobile\MobileController;

class CasesController extends MobileController
{
    public function index()
    {
        return $this->view('cases.index');
    }
}
