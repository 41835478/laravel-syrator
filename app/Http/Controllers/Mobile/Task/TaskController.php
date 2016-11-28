<?php

namespace App\Http\Controllers\Mobile\Task;

use App\Http\Controllers\Mobile\MobileController;

class TaskController extends MobileController
{
    public function index()
    {
    }

    public function create()
    {
        return $this->view('task.create');
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
    
    public function remove(Request $request)
    {        
    }

    public function showTaskList()
    {
        return $this->view('task.tasklist');
    }
    
    public function show($id)
    {
    	return $this->view('task.show');
    }
}
