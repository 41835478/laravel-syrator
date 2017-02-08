<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
	Route::group(['prefix' => '', 'middleware' => ['multi-site.auth:admin']], function () {
	    // 后台首页：控制台
	    Route::get('/', 'WechatController@index');
    });
});