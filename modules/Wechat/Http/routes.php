<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
	Route::get('/', 'WechatController@index');
});