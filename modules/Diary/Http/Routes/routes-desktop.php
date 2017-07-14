<?php

Route::group(['middleware' => 'web', 'prefix' => 'diary', 'namespace' => 'Modules\Diary\Http\Controllers'], function()
{
	Route::get('/', 'DiaryController@index');
});

Route::group(['middleware' => ['auth:web', 'web'], 'prefix' => '', 'namespace' => 'Modules\Diary\Http\Controllers\Desktop', ], function () {

    // 会员中心
    Route::group(['prefix' => 'member', 'namespace' => 'Modules\Diary\Http\Controllers\Desktop\Member'], function () {
        
        Route::group(['middleware' => ['auth:member'], 'prefix' => ''], function () {
            
            Route::group(['prefix' => 'game', 'namespace' => 'Modules\Diary\Http\Controllers\Desktop\Member\Game'], function () {
                Route::get('/', 'HomeController@index');
            });
        });
    });

});