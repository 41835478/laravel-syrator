<?php

// API站点路由群组
Route::group(['prefix' => config('site.route.prefix.api', 'api'), 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {
    
    // 会员模块
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::resource('login', 'ApiMemberController@login');
        Route::resource('register', 'ApiMemberController@register');
        
        Route::resource('sendverifycode', 'ApiMemberController@sendVerifyCode');
        Route::resource('validateverifycode', 'ApiMemberController@validateVerifyCode');
        
        Route::resource('resetpassword', 'ApiMemberController@resetPassword');
    });
    
    // 论坛模块
    Route::group(['prefix' => 'forum', 'namespace' => 'Forum'], function () {
    	Route::resource('list', 'ApiForumController@getList');
    });
    
    // 材料模块
    Route::group(['prefix' => 'material', 'namespace' => 'Material'], function () {
        Route::resource('list', 'ApiMaterialController@getList');
        Route::resource('getcatalogs', 'ApiMaterialController@getCatalogs');
    });
    
    // 设备租赁模块
    Route::group(['prefix' => 'device', 'namespace' => 'Device'], function () {
        Route::resource('list', 'ApiDeviceController@getList');
    });

    // 保险金融模块
    Route::group(['prefix' => 'finance', 'namespace' => 'Finance'], function () {
        Route::resource('list', 'ApiFinanceController@getList');
    });

    // 工程信息模块
    Route::group(['prefix' => 'project', 'namespace' => 'Project'], function () {
        Route::resource('list', 'ApiProjectController@getList');
    });

    // 货运模块
    Route::group(['prefix' => 'freight', 'namespace' => 'Freight'], function () {
        Route::resource('list', 'ApiFreightController@getList');
    });

    // 服务商模块
    Route::group(['prefix' => 'servicer', 'namespace' => 'Servicer'], function () {
        // 施工队
        Route::resource('shigong/list', 'ApiShigongController@getList');
        // 工程师
        Route::resource('jianli/list', 'ApiJianliController@getList');
        // 分包商
        Route::resource('fenbao/list', 'ApiFenbaoController@getList');
    });

    // 需求模块
    Route::group(['prefix' => 'task', 'namespace' => 'Task'], function () {
        Route::resource('list', 'ApiTaskController@getList');
    });
});