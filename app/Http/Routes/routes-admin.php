<?php

// 管理后台站点路由群组
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['block:admin', 'web']], function () {

    Route::get('/', function() {
        return redirect('admin/auth/login');
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
    	    Route::post('theme/remove', 'ThemeController@remove');
            Route::resource('theme', 'ThemeController');
    	    
    	    // 意见反馈
    	    Route::post('feedback/reply', 'FeedbackController@reply');
    	    Route::resource('feedback', 'FeedbackController');
    	    
    	    // app管理
    	    Route::group(['prefix' => 'appinfo', 'namespace' => 'AppInfo'], function () {    	        
    	        // 首页
    	        Route::get('/', 'AppInfoController@index');
    	        
    	        // 引导页管理
    	        Route::resource('guide', 'AppGuideController');
                Route::post('guide/remove', 'AppGuideController@remove');
    	    });
        });
        
        // 用户中心   
        Route::group(['prefix' => 'mine', 'namespace' => 'Mine'], function () {
            Route::get('info/{type}', 'MineController@getInfo');
            Route::put('info', 'MineController@putInfo');
            Route::put('avatar', 'MineController@putMeAvatar');
            Route::put('password', 'MineController@putMePassword');
        });
        
        // 会员管理
        Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
    	    Route::post('member/remove', 'MemberController@remove');
    	    Route::post('member/removebatch', 'MemberController@removeBatch');
            Route::resource('member', 'MemberController');

            Route::post('group/remove', 'MemberGroupController@remove');
    	    Route::post('group/removebatch', 'MemberGroupController@removeBatch');
            Route::resource('group', 'MemberGroupController');
        });

        // 权限管理
        Route::group(['prefix' => 'permission', 'namespace' => 'Permission'], function () { 
            // 后台用户管理
    	    Route::post('user/remove', 'UserController@remove');
            Route::resource('user', 'UserController');

    	    // 角色管理
    	    Route::post('role/remove', 'RoleController@remove');
    	    Route::resource('role', 'RoleController');
    	    
    	    // 权限(项)管理
    	    Route::post('permission/remove', 'PermissionController@remove');
    	    Route::resource('permission', 'PermissionController');
        });
    });
});
