<?php

// 管理后台站点路由群组
Route::group(['prefix' => config('site.route.prefix.admin', 'admin'), 'namespace' => 'Admin', 'middleware' => ['block:admin', 'web']], function () {
    // CMS 应用-后台
    Route::group(['prefix' => 'cms', 'namespace' => 'CMS', 'middleware' => ['multi-site.auth:admin']], function () {
        Route::get('/', 'HomeController@getIndex');
        
        // 文章管理
        // 文章分类管理
        Route::resource('article-cat', 'Article\ArticleCatController');
        Route::post('article-cat/remove', 'Article\ArticleCatController@remove');
        
        // 文章管理
        Route::resource('article', 'Article\ArticleController');
        Route::post('article/remove', 'Article\ArticleController@remove');
    });
    
    // 蚂蚁公装 应用-后台
    Route::group(['prefix' => 'mygz', 'namespace' => 'Mygz', 'middleware' => ['multi-site.auth:admin']], function () {
        Route::get('/', 'MygzHomeController@getIndex');
    
        // 材料模块
        Route::group(['prefix' => 'material', 'namespace' => 'Material'], function () {
            Route::resource('/', 'MaterialController');
            Route::post('remove', 'MaterialController@remove');
    
            // 材料分类
            Route::resource('cat', 'MaterialCatController');
            Route::post('cat/remove', 'MaterialCatController@remove');
            Route::get('cat/show/{id}', 'MaterialCatController@show');
        });
    });
});