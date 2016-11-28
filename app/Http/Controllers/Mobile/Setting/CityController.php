<?php

namespace App\Http\Controllers\Mobile\Setting;

use App\Http\Controllers\Mobile\MobileController;

class CityController extends MobileController
{
    public function index()
    {
        return $this->view('setting.city.index');
    }

    public function create()
    {
    }

    public function store(TaskRequest $request)
    {
    }

    public function edit($id)
    {
    }

    public function update(TaskRequest $request, $id)
    {
    }
    
    public function show($id)
    {
    }
    
    public function remove(Request $request)
    {        
    }
}
