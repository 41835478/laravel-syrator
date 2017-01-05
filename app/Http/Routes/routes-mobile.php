<?php

// mobile前台站点路由群组
Route::group(['prefix' => config('site.route.prefix.mobile', 'mobile'), 'namespace' => 'Mobile', 'middleware' => ['block:mobile', 'web']], function () {

    // 首页
    Route::get('/', 'HomeController@getIndex');
    Route::get('index', 'HomeController@getIndex');

    // 会员
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::resource('login', 'MemberController@login');
        Route::resource('loginfast', 'MemberController@loginFast');
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