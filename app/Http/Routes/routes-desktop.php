<?php

Route::group(['prefix' => '', 'namespace' => 'Desktop', 'middleware' => ['auth:web', 'web']], function () {
    
    Route::get('/', 'HomeController@getIndex');
    
    // 会员中心
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
    
        Route::group(['prefix' => 'auth'], function () {
            $Authority = 'AuthorityController@';
            // 退出
            Route::get('logout', $Authority.'getLogout');
            // 登录
            Route::get('login', $Authority.'getLogin');
            Route::post('login', $Authority.'postLogin');
        });
    
        Route::group(['prefix' => '', 'middleware' => ['auth:member']], function () {

            Route::get('/', 'HomeController@getIndex');
        });
    });
    
});