<?php

// API站点路由群组
Route::group(['middleware' => ['block:api', 'web'], 'prefix' => 'api', 'namespace' => 'Modules\Cms\Http\Controllers\API'], function () {

});