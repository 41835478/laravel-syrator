<?php

// API站点路由群组
Route::group(['middleware' => ['auth:web'], 'prefix' => 'api', 'namespace' => 'Modules\Cms\Http\Controllers\API'], function () {
    
    // 论坛模块
    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::any('getcatalogs', 'ApiArticleController@getCatalogs');
    });
});