<?php

// mobile前台站点路由群组
Route::group(['prefix' => 'mobile', 'namespace' => 'Mobile', 'middleware' => ['block:mobile', 'web']], function () {
    // 首页
    Route::get('/', 'HomeController@getIndex');
    Route::get('index', 'HomeController@getIndex');
});