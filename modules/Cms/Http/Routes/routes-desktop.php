<?php

// PC前台站点路由群组
Route::group(['middleware' => ['block:desktop', 'web'], 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function () {
    
});