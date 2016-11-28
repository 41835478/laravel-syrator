<?php

namespace App\Http\Controllers\Mobile\Forum;

use App\Http\Controllers\Mobile\MobileController;

class ForumController extends MobileController
{
    public function index()
    {
        return $this->view('forum.index');
    }
    
    public function show($id)
    {
        return $this->view('forum.show');
    }
}
