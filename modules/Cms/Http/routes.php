<?php

Route::group(['middleware' => 'web', 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function()
{
	Route::get('/', 'CmsController@index');
	
	// 管理后台站点路由群组
	Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	
	    Route::get('/', 'CmsAdminController@index');
	    
	});
});