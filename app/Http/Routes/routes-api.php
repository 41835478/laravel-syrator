<?php

// API站点路由群组
Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => ['block:api', 'web']], function () {
        
    // 会员模块
    Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
        Route::any('login', 'ApiMemberController@login');
        Route::any('register', 'ApiMemberController@register');
        
        Route::any('sendverifycode', 'ApiMemberController@sendVerifyCode');
        Route::any('validateverifycode', 'ApiMemberController@validateVerifyCode');
        
        Route::any('resetpassword', 'ApiMemberController@resetPassword');
        
        Route::any('bindwechat', 'ApiMemberController@bindWechat');
        
        Route::any('taobao_openim', 'ApiMemberController@getTaobaoOpenim');
        Route::any('taobao_openim_delete', 'ApiMemberController@deleteTaobaoOpenim');
    });
    
    // 文件上传模块
    Route::group(['prefix' => 'upload', 'namespace' => 'Upload'], function () {
        Route::any('single', 'ApiUploadController@uploadSingle');
    });

    // 系统模块
    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
        Route::any('dofeedback', 'ApiFeedbackController@doFeedback');
        Route::any('app/get_guide_pages', 'ApiAppInfoController@getGuidePages');
    });
});