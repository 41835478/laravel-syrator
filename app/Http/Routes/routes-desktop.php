<?php

// PC前台站点路由群组
Route::group(['prefix' => config('site.route.prefix.desktop', ''), 'namespace' => 'Desktop', 'middleware' => ['block:desktop', 'web']], function () {

    // 桌面站主页
    Route::get('/', 'HomeController@getIndex');

    // 设置语言版本
    Route::get('lang', 'HomeController@getLang');

    // 文章查看
    Route::get('article', 'Article\ArticleController@index');
    Route::get('article/{id}', 'Article\ArticleController@show');
    
    // 会员管理
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::get('/', 'MemberController@getIndex');
        
        Route::get('login', 'MemberController@login');
        Route::get('logout', 'MemberController@logout');
        
        Route::get('loginqq', 'MemberController@loginqq');
        Route::get('loginqqfast', 'MemberController@loginqqfast');
    });
});