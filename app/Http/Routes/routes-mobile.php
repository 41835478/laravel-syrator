<?php

// mobile前台站点路由群组
Route::group(['prefix' => 'mobile', 'namespace' => 'Mobile', 'middleware' => ['block:mobile', 'web']], function () {

});