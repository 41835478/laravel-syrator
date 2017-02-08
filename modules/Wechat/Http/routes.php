<?php

Route::group(['middleware' => ['block:admin', 'web'], 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
	Route::get('/', 'WechatController@index');
});