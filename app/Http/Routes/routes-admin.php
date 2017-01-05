<?php

// 管理后台站点路由群组
Route::group(['prefix' => config('site.route.prefix.admin', 'admin'), 'namespace' => 'Admin', 'middleware' => ['block:admin', 'web']], function () {

    Route::get('/', function() {
        return redirect(config('site.route.prefix.admin', 'admin').'/auth/login');
    });

    Route::group(['prefix' => 'auth'], function () {
        $Authority = 'AuthorityController@';
        // 退出
        Route::get('logout', $Authority.'getLogout');
        // 登录
        Route::get('login', $Authority.'getLogin');
        Route::post('login', $Authority.'postLogin');
    });

    Route::group(['prefix' => '', 'middleware' => ['multi-site.auth:admin']], function () {
        // 后台首页：控制台
        Route::get('home', 'HomeController@getIndex');

        // 文件上传
        Route::get('upload/picture', 'System\AssistantController@getUploadPicture');
        Route::get('upload/document', 'System\AssistantController@getUploadDocument');
        Route::post('upload/picture', 'System\AssistantController@postUploadPicture');
        Route::post('upload/document', 'System\AssistantController@postUploadDocument');
        
        // 系统管理
        Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
            // 重建缓存
            Route::any('cache', 'AssistantController@getRebuildCache');
        
            // 系统参数
            Route::get('option', 'OptionController@getOption');
            Route::put('option', 'OptionController@putOption');
            
            // 日志管理
            Route::resource('log', 'LogController');
            
            // 模板管理
            Route::resource('theme', 'ThemeController');
    	    Route::post('theme/remove', 'ThemeController@remove');
        });
        
        // 用户中心   
        Route::group(['prefix' => 'mine', 'namespace' => 'Mine'], function () {                 
            Route::get('inforation', 'MeController@getMeInforation');
            Route::put('inforation', 'MeController@putMeInforation');
            Route::put('avatar', 'MeController@putMeAvatar');
            Route::put('password', 'MeController@putMePassword');
        });
        
        // 会员管理
        Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
            Route::resource('member', 'MemberController');
    	    Route::post('member/remove', 'MemberController@remove');
    	    
            Route::resource('group', 'MemberGroupController');
    	    Route::post('group/remove', 'MemberGroupController@remove');
        });

        // 权限管理
        Route::group(['prefix' => 'permission', 'namespace' => 'Permission'], function () { 
            // 后台用户管理        
            Route::resource('user', 'UserController');
    	    Route::post('user/remove', 'UserController@remove');

    	    // 角色管理
    	    Route::resource('role', 'RoleController');
    	    Route::post('role/remove', 'RoleController@remove');
    	    
    	    // 权限(项)管理
    	    Route::resource('permission', 'PermissionController');
    	    Route::post('permission/remove', 'PermissionController@remove');
        });
    });
});
