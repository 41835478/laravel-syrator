<?php

Route::group(['prefix' => 'mobile', 'namespace' => 'Mobile', 'middleware' => ['auth:web']], function () {

    Route::group(['prefix' => 'member/auth'], function () {
        // 登录
        Route::get('login', 'AuthorityController@getLogin');
        Route::post('login', 'AuthorityController@postLogin');
        // 注册
        Route::get('register', 'AuthorityController@register');
        // 退出
        Route::get('logout', 'AuthorityController@getLogout');
        // 忘记密码
        Route::get('resetpassword', 'AuthorityController@resetPassword');
        // 微信登陆
        Route::get('loginwechat', 'AuthorityController@loginWechat');
        // 错误提示页面
        Route::get('error', 'AuthorityController@resetPassword');
    });
    
});

// mobile前台站点路由群组
Route::group(['prefix' => 'mobile', 'namespace' => 'Mobile', 'middleware' => ['auth:mobile']], function () {

    Route::group(['prefix' => '', 'middleware' => ['multi-site.auth:mobile']], function () {
        // 首页
        Route::get('/', 'HomeController@getIndex');
        Route::get('index', 'HomeController@getIndex');
    });
    
});