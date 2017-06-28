<?php

Route::group(['middleware' => 'web', 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function()
{
	Route::get('/', 'CmsController@index');
	
	// 管理后台
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['multi-site.auth:admin']], function () {
	
	    Route::get('/', 'CmsAdminController@index');
	   
	    // 文章管理
	    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
	        Route::any('/', function () {
	            return redirect('cms/admin/article/article');
	        });
	        
            Route::post('article/remove', 'ArticleController@remove');
            Route::post('article/removebatch', 'ArticleController@removeBatch');
            
            Route::get('article/import', 'ArticleController@getImport');
            Route::post('article/import', 'ArticleController@postImport');
            Route::any('article/export', 'ArticleController@export');
            
	        Route::resource('article', 'ArticleController',['except' => ['destroy']]);
	        
	        Route::post('catalog/remove', 'ArticleCatalogController@remove');
	        Route::resource('catalog', 'ArticleCatalogController',['except' => ['destroy']]);
	    });
	});
});