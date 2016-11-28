<?php

namespace App\Http\Controllers\Mobile\Project;

use App\Http\Controllers\Mobile\MobileController;

class ProjectController extends MobileController
{
    public function getList()
    {
        return $this->view('project.index');
    }
    
    public function show($id)
    {
    	return $this->view('project.show');
    }
}
