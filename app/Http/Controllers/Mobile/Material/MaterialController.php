<?php

namespace App\Http\Controllers\Mobile\Material;

use App\Http\Controllers\Mobile\MobileController;

use Illuminate\Http\Request;

class MaterialController extends MobileController
{    
    public function getList(Request $request)
    {
        $filtparams = [
            'sortby' => $request->input('sortby'), 
            'orderby' => $request->input('orderby'), 
        ];  
        
        return $this->view('material.index', compact('filtparams'));
    }
    
    public function show($id)
    {
    	return $this->view('material.show');
    }
}
