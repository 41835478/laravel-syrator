<?php

Route::group(['middleware' => 'web', 'prefix' => 'diary', 'namespace' => 'Modules\Diary\Http\Controllers'], function()
{
	Route::get('/', 'DiaryController@index');
});