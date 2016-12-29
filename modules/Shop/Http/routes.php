<?php

Route::group(['middleware' => 'web', 'prefix' => 'shop', 'namespace' => 'Modules\Shop\Http\Controllers'], function()
{
	Route::get('/', 'ShopController@index');
	
	// 管理后台
	Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	
	    Route::get('/', 'ShopAdminController@index');
	     
	});
});