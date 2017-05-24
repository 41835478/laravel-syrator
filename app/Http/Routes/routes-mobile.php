<?php

// mobile前台站点路由群组
Route::group(['prefix' => 'mobile', 'namespace' => 'Mobile', 'middleware' => ['block:mobile', 'web']], function () {
    // 首页
    Route::get('/', 'HomeController@getIndex');
    Route::get('index', 'HomeController@getIndex');
    
    // 会员
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::resource('login', 'MemberController@login');
        Route::resource('loginfast', 'MemberController@loginFast');
        Route::resource('logout', 'MemberController@logout');
        Route::resource('register', 'MemberController@register');
        Route::resource('resetpassword', 'MemberController@resetPassword');
    });
});