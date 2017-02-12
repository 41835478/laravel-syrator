<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
    Route::group(['prefix' => 'access', 'middleware' => ['web']], function () {
        Route::any('/', 'WechatController@access');
    });
    
	Route::group(['prefix' => 'admin', 'middleware' => ['multi-site.auth:admin']], function () {
	    // 后台首页：控制台
	    Route::get('/', 'WechatController@index');
	    Route::get('index', 'WechatController@index');
	    Route::get('params', 'WechatController@getParams');
	    Route::put('params', 'WechatController@putParams');
    });
});