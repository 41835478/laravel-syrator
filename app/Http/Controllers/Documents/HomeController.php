<?php

namespace App\Http\Controllers\Documents;

class HomeController extends DocumentsController
{    
    public function getIndex()
    {
        return $this->view('index');
    }

}
