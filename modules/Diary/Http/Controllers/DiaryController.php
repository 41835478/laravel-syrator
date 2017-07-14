<?php namespace Modules\Diary\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class DiaryController extends Controller {
	
	public function index()
	{
		return view('diary::index');
	}
	
}