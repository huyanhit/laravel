<?php 

/*
|--------------------------------------------------------------------------
| ModuleOne Module Routes
|--------------------------------------------------------------------------
|
| All the routes related to the ModuleOne module have to go in here. Make sure
| to change the namespace in case you decide to change the 
| namespace/structure of controllers.
|
*/
Route::group(['prefix' => 'admin', 'namespace' => 'App\Modules\Admin\Controllers'], function () {
	Route::get('/', ['as' => 'admin.index', 'uses' => 'NewsController@index']);
	Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
	Route::post('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
	Route::post('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertNews']);
	Route::get('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertNews']);
	Route::get('/news/delete', ['as' => 'news.delete', 'uses' => 'NewsController@deleteNews']);
	Route::get('/news/active', ['as' => 'news.active', 'uses' => 'NewsController@activeNews']);
	Route::get('/news/edit', ['as' => 'news.edit', 'uses' => 'NewsController@editNews']);
	Route::post('/news/edit', ['as' => 'news.edit', 'uses' => 'NewsController@editNews']);
});