<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{    
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
	    // 后台首页：控制台
	    Route::get('/', 'WechatController@index');
	    Route::get('params', 'WechatController@getParams');
	    Route::put('params', 'WechatController@putParams');
    });
});