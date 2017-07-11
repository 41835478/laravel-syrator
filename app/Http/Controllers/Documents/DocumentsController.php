<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    // 主题
    protected $theme = "documents.";

    public function __construct()
    {
    }
    
    public function view($view = null, $data = [], $mergeData = [])
    {
        return view($this->theme.$view, $data, $mergeData);
    }
}
