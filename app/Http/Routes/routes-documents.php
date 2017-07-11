<?php

// 文档站点路由群组
Route::group(['prefix' => 'documents', 'namespace' => 'Documents',  'middleware' => ['auth:web', 'web']], function () {
    Route::get('/', function() {
        return redirect('documents/home');
    });
    Route::get('home', 'HomeController@getIndex');
});