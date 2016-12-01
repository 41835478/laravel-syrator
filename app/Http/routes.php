<?php

require __DIR__.'/routes/routes-mygz.php';

// 文档站点路由群组
Route::group(['prefix' => config('site.route.prefix.document', 'documents'), 'namespace' => 'Documents',  'middleware' => ['block:document', 'web']], function () {

    Route::get('/', 'HomeController@getIndex');
    
    // 开发演示
    Route::get('demo/form', 'Demo\DemoController@getForm');
    Route::get('demo/icon', 'Demo\DemoController@getIcon');
});

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
});

// PC前台站点路由群组
Route::group(['prefix' => config('site.route.prefix.desktop', ''), 'namespace' => 'Desktop', 'middleware' => ['block:desktop', 'web']], function () {

    // 桌面站主页
    Route::get('/', 'HomeController@getIndex');

    // 设置语言版本
    Route::get('lang', 'HomeController@getLang');
    
    // 文章查看
    Route::get('article', 'Article\ArticleController@index');
    Route::get('article/{id}', 'Article\ArticleController@show');
});

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
            Route::get('password', 'MeController@getMePassword');
            Route::put('password', 'MeController@putMePassword');
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
        
        // 会员管理
        Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
            Route::resource('/', 'MemberController');
            Route::resource('group', 'MemberGroupController');
        });
    });
    
    // CMS 应用-后台
    Route::group(['prefix' => 'cms', 'namespace' => 'CMS', 'middleware' => ['multi-site.auth:admin']], function () {
        Route::get('/', 'HomeController@getIndex');
        
        // 文章管理
        // 文章分类管理
        Route::resource('article-cat', 'Article\ArticleCatController');
        Route::post('article-cat/remove', 'Article\ArticleCatController@remove');
        
        // 文章管理
        Route::resource('article', 'Article\ArticleController');
        Route::post('article/remove', 'Article\ArticleController@remove');
    });    
});
