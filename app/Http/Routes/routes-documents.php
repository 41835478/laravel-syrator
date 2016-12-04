<?php

// 文档站点路由群组
Route::group(['prefix' => config('site.route.prefix.document', 'documents'), 'namespace' => 'Documents',  'middleware' => ['block:document', 'web']], function () {

    Route::get('/', 'HomeController@getIndex');
    
    // 开发演示
    Route::get('demo/form', 'Demo\DemoController@getForm');
    Route::get('demo/icon', 'Demo\DemoController@getIcon');
});