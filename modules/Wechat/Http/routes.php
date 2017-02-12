<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
    Route::group(['prefix' => 'access', 'namespace' => 'Access', 'middleware' => ['web']], function () {
        Route::any('/', 'AccessController@access');
    });
    
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['multi-site.auth:admin']], function () {
	    // 后台首页：控制台
	    Route::get('/', 'WechatController@index');
	    Route::get('index', 'WechatController@index');
	    Route::get('params', 'WechatController@getParams');
	    Route::put('params', 'WechatController@putParams');
    });
});