<?php

// API站点路由群组
Route::group(['prefix' => config('site.route.prefix.api', 'api'), 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {

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

// 管理后台站点路由群组
Route::group(['prefix' => config('site.route.prefix.admin', 'admin'), 'namespace' => 'Admin', 'middleware' => ['block:admin', 'web']], function () {

    // 蚂蚁公装 应用-后台
    Route::group(['prefix' => 'mygz', 'namespace' => 'Mygz', 'middleware' => ['multi-site.auth:admin']], function () {
        Route::get('/', 'MygzHomeController@getIndex');
        
        // 材料模块
        Route::group(['prefix' => 'material', 'namespace' => 'Material'], function () {
            Route::resource('/', 'MaterialController');
            Route::post('remove', 'MaterialController@remove');
            
            // 材料分类
            Route::resource('cat', 'MaterialCatController');
            Route::post('cat/remove', 'MaterialCatController@remove');
            Route::get('cat/show/{id}', 'MaterialCatController@show');
        });
    });    
});

// mobile前台站点路由群组
Route::group(['prefix' => config('site.route.prefix.mobile', 'mobile'), 'namespace' => 'Mobile', 'middleware' => ['block:mobile', 'web']], function () {

    // 首页
    Route::get('/', 'HomeController@getIndex');
    Route::get('index', 'HomeController@getIndex');

    // 会员
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::resource('login', 'MemberController@login');
        Route::resource('register', 'MemberController@register');
        Route::resource('resetpassword', 'MemberController@resetPassword');
    });

    // 案例
    Route::group(['prefix' => 'cases', 'namespace' => 'Cases'], function () {
        Route::resource('/', 'CasesController');
    });

    // 论坛
    Route::group(['prefix' => 'forum', 'namespace' => 'Forum'], function () {
        Route::resource('/', 'ForumController');
        Route::get('show/{id}', 'ForumController@show');
    });

    // 沟通
    Route::group(['prefix' => 'message', 'namespace' => 'Message'], function () {
        Route::resource('/', 'MessageController');
        Route::get('chat/{id}', 'MessageController@chat');
    });

    // 我的
    Route::group(['prefix' => 'mine', 'namespace' => 'Mine'], function () {
        Route::resource('/', 'MineController');
    });

    // 施工材料
    Route::group(['prefix' => 'material', 'namespace' => 'Material'], function () {
        Route::resource('/', 'MaterialController@getList');
        Route::get('show/{id}', 'MaterialController@show');
    });

    // 设备租赁
    Route::group(['prefix' => 'device', 'namespace' => 'Device'], function () {
        Route::get('/', 'DeviceController@getList');
        Route::get('show/{id}', 'DeviceController@show');
    });

    // 服务商
    Route::group(['prefix' => 'servicer', 'namespace' => 'Servicer'], function () {
        // 专业工程师
        Route::resource('jianli', 'JianliController@getList');
        Route::get('jianli/show/{id}', 'JianliController@show');
        // 专业施工队
        Route::resource('shigong', 'ShigongController@getList');
        Route::get('shigong/show/{id}', 'ShigongController@show');
        // 专业工程师
        Route::resource('fenbao', 'FenbaoController@getList');
        Route::get('fenbao/show/{id}', 'FenbaoController@show');
    });

    // 保险金融
    Route::group(['prefix' => 'finance', 'namespace' => 'Finance'], function () {
        Route::resource('/', 'FinanceController@getList');
        Route::get('show/{id}', 'FinanceController@show');
    });

    // 工程信息
    Route::group(['prefix' => 'project', 'namespace' => 'Project'], function () {
        Route::resource('/', 'ProjectController@getList');
        Route::get('show/{id}', 'ProjectController@show');
    });

    // 货运
    Route::group(['prefix' => 'freight', 'namespace' => 'Freight'], function () {
        Route::resource('/', 'FreightController@getList');
        Route::get('show/{id}', 'FreightController@show');
    });

    // 需求
    Route::group(['prefix' => 'task', 'namespace' => 'Task'], function () {
        Route::resource('/', 'TaskController');
        Route::get('list', 'TaskController@showTaskList');
        Route::get('show/{id}', 'TaskController@show');
    });

    // 系统设置
    Route::group(['prefix' => 'setting', 'namespace' => 'Setting'], function () {
        Route::resource('city', 'CityController');
    });
});
