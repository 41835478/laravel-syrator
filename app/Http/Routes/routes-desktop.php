<?php

// PC前台
Route::group(['prefix' => 'member', 'namespace' => 'Member', 'middleware' => ['block:member', 'web']], function () {

    Route::group(['prefix' => 'auth'], function () {
        $Authority = 'AuthorityController@';
        // 退出
        Route::get('logout', $Authority.'getLogout');
        // 登录
        Route::get('login', $Authority.'getLogin');
        Route::post('login', $Authority.'postLogin');
    });
    
    Route::group(['prefix' => '', 'middleware' => ['multi-site.auth:member']], function () {
       
        Route::get('/', 'HomeController@getIndex');
    });
});

// PC前台站点路由群组
Route::group(['prefix' => '', 'namespace' => 'Desktop', 'middleware' => ['block:desktop', 'web']], function () {

});