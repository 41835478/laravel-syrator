<?php

namespace App\Http\Controllers\Mobile\Device;

use App\Http\Controllers\Mobile\MobileController;

class DeviceController extends MobileController
{
    public function getList()
    {
        return $this->view('device.index');
    }
    
    public function show($id)
    {    
        return $this->view('device.show');
    }
}
