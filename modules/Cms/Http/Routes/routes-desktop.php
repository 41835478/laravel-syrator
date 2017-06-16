<?php

// PC前台站点路由群组
Route::group(['middleware' => ['block:desktop', 'web'], 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function () {
    
    Route::group(['prefix' => '', 'namespace' => 'Desktop'], function () {
        
        // 文章
        Route::resource('article', 'Article\ArticleController', ['only' => ['index', 'show']]);
    });
});