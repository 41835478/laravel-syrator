<?php

// API站点路由群组
Route::group(['prefix' => config('site.route.prefix.api', 'api'), 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {
    
    // 会员模块
    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
        Route::any('app/get_guide_pages', 'ApiAppInfoController@getGuidePages');
    });
    
    // 会员模块
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::any('login', 'ApiMemberController@login');
        Route::any('register', 'ApiMemberController@register');
        
        Route::any('sendverifycode', 'ApiMemberController@sendVerifyCode');
        Route::any('validateverifycode', 'ApiMemberController@validateVerifyCode');
        
        Route::any('resetpassword', 'ApiMemberController@resetPassword');
    });
});