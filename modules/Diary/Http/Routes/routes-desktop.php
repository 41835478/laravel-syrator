<?php

Route::group(['middleware' => 'web', 'prefix' => 'diary', 'namespace' => 'Modules\Diary\Http\Controllers'], function()
{
	Route::get('/', 'DiaryController@index');
});

Route::group(['middleware' => ['auth:web', 'web'], 'prefix' => '', 'namespace' => 'Modules\Diary\Http\Controllers\Desktop', ], function () {

    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        
        Route::group(['middleware' => ['auth:member'], 'prefix' => ''], function () {
            
            Route::group(['prefix' => 'game', 'namespace' => 'Game'], function () {
                Route::get('/', 'HomeController@index');
                Route::post('stat', 'HomeController@postStat');
                
                Route::post('role/remove', 'RoleController@remove');
                Route::post('role/removebatch', 'RoleController@removeBatch');
                Route::resource('role', 'RoleController',['except' => ['destroy']]);
                
                Route::post('diary/remove', 'RoleDiaryController@remove');
                Route::post('diary/removebatch', 'RoleDiaryController@removeBatch');
                Route::resource('diary', 'RoleDiaryController',['except' => ['destroy']]);
                
                Route::post('material/remove', 'MaterialDiaryController@remove');
                Route::post('material/removebatch', 'MaterialDiaryController@removeBatch');
                Route::resource('material', 'MaterialDiaryController',['except' => ['destroy']]);
            });
        });
    });

});