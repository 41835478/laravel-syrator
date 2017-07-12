<?php

Route::group(['middleware' => 'web', 'prefix' => 'cms', 'namespace' => 'Modules\Cms\Http\Controllers'], function()
{
	Route::get('/', 'CmsController@index');
	
	// 管理后台
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
	
	    Route::get('/', 'CmsAdminController@index');
	   
	    // 文章管理
	    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
	        Route::any('/', function () {
	            return redirect('cms/admin/article/article');
	        });
	        
            Route::post('remove', 'ArticleController@remove');
            Route::post('removebatch', 'ArticleController@removeBatch');
            
            Route::get('import', 'ArticleController@getImport');
            Route::post('import', 'ArticleController@postImport');
            
            Route::any('export', 'ArticleController@export');
            
	        Route::resource('article', 'ArticleController',['except' => ['destroy', 'show']]);
	        
	        Route::post('catalog/remove', 'ArticleCatalogController@remove');
	        Route::resource('catalog', 'ArticleCatalogController',['except' => ['destroy']]);
	    });
	});
});