<?php

// PC前台站点路由群组
Route::group(['middleware' => ['block:desktop', 'web'], 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function () {
    
    Route::group(['prefix' => '', 'namespace' => 'Desktop'], function () {
        
        // 文章
        Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
            Route::get('/', 'ArticleController@index');
            Route::get('show/{id}', 'ArticleController@show');
        });
    });
});