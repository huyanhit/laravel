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
    // your routes here
Route::group(['prefix' => 'admin', 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers'], function () {
	
	Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
	Route::post('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);

	Route::get('/news/rss', ['as' => 'news.rss', 'uses' => 'NewsController@updateRss']);

	Route::post('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertData']);
	Route::get('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertData']);

	Route::get('/news/delete', ['as' => 'news.delete', 'uses' => 'NewsController@deleteData']);

	Route::get('/news/active', ['as' => 'news.active', 'uses' => 'NewsController@activeData']);

	Route::get('/news/edit', ['as'   => 'news.edit', 'uses' => 'NewsController@editData']);
	Route::post('/news/edit', ['as'  => 'news.edit', 'uses' => 'NewsController@editData']);

	Route::get('/news/apply', ['as'  => 'news.apply','uses' => 'NewsController@applyData']);
	Route::post('/news/apply', ['as' => 'news.apply','uses' => 'NewsController@applyData']);
	
	Route::post('/catnews', ['as' => 'catnews.index', 'uses' => 'CatnewsController@index']);
	Route::get('/catnews', ['as' => 'catnews.index', 'uses' => 'CatnewsController@index']);

	Route::post('/catnews/insert', ['as' => 'catnews.insert', 'uses' => 'CatnewsController@insertData']);
	Route::get('/catnews/insert', ['as' => 'catnews.insert', 'uses' => 'CatnewsController@insertData']);

	Route::post('/catnews/edit', ['as' => 'catnews.edit', 'uses' => 'CatnewsController@editData']);
	Route::get('/catnews/edit', ['as' => 'catnews.edit', 'uses' => 'CatnewsController@editData']);

	Route::get('/catnews/delete', ['as' => 'catnews.delete', 'uses' => 'CatnewsController@deleteData']);

	Route::get('/catnews/active', ['as' => 'catnews.active', 'uses' => 'CatnewsController@activeData']);


	Route::get('/jobs', ['as' => 'news.index', 'uses' => 'JobsController@index']);
	Route::post('/jobs', ['as' => 'news.index', 'uses' => 'JobsController@index']);

	Route::post('/jobs/insert', ['as' => 'jobs.insert', 'uses' => 'JobsController@insertData']);
	Route::get('/jobs/insert', ['as' => 'jobs.insert', 'uses' => 'JobsController@insertData']);

	Route::get('/jobs/delete', ['as' => 'jobs.delete', 'uses' => 'JobsController@deleteData']);

	Route::get('/jobs/active', ['as' => 'jobs.active', 'uses' => 'JobsController@activeData']);

	Route::get('/jobs/edit', ['as'   => 'jobs.edit', 'uses' => 'JobsController@editData']);
	Route::post('/jobs/edit', ['as'  => 'jobs.edit', 'uses' => 'JobsController@editData']);

	Route::get('/jobs/apply', ['as'  => 'jobs.apply','uses' => 'JobsController@applyData']);
	Route::post('/jobs/apply', ['as' => 'jobs.apply','uses' => 'JobsController@applyData']);


	Route::get('/ads', ['as' => 'news.index', 'uses' => 'AdsController@index']);
	Route::post('/ads', ['as' => 'news.index', 'uses' => 'AdsController@index']);

	Route::post('/ads/insert', ['as' => 'ads.insert', 'uses' => 'AdsController@insertData']);
	Route::get('/ads/insert', ['as' => 'ads.insert', 'uses' => 'AdsController@insertData']);

	Route::get('/ads/delete', ['as' => 'ads.delete', 'uses' => 'AdsController@deleteData']);

	Route::get('/ads/active', ['as' => 'ads.active', 'uses' => 'AdsController@activeData']);

	Route::get('/ads/edit', ['as'   => 'ads.edit', 'uses' => 'AdsController@editData']);
	Route::post('/ads/edit', ['as'  => 'ads.edit', 'uses' => 'AdsController@editData']);

	Route::get('/ads/apply', ['as'  => 'ads.apply','uses' => 'AdsController@applyData']);
	Route::post('/ads/apply', ['as' => 'ads.apply','uses' => 'AdsController@applyData']);


	Route::get('/muti', ['as' => 'news.index', 'uses' => 'MutiController@index']);
	Route::post('/muti', ['as' => 'news.index', 'uses' => 'MutiController@index']);

	Route::post('/muti/insert', ['as' => 'muti.insert', 'uses' => 'MutiController@insertData']);
	Route::get('/muti/insert', ['as' => 'muti.insert', 'uses' => 'MutiController@insertData']);

	Route::get('/muti/delete', ['as' => 'muti.delete', 'uses' => 'MutiController@deleteData']);

	Route::get('/muti/active', ['as' => 'muti.active', 'uses' => 'MutiController@activeData']);

	Route::get('/muti/edit', ['as'   => 'muti.edit', 'uses' => 'MutiController@editData']);
	Route::post('/muti/edit', ['as'  => 'muti.edit', 'uses' => 'MutiController@editData']);

	Route::get('/muti/apply', ['as'  => 'muti.apply','uses' => 'MutiController@applyData']);
	Route::post('/muti/apply', ['as' => 'muti.apply','uses' => 'MutiController@applyData']);

	Route::get('/playlist', ['as' => 'news.index', 'uses' => 'PlaylistController@index']);
	Route::post('/playlist', ['as' => 'news.index', 'uses' => 'PlaylistController@index']);

	Route::post('/playlist/insert', ['as' => 'playlist.insert', 'uses' => 'PlaylistController@insertData']);
	Route::get('/playlist/insert', ['as' => 'playlist.insert', 'uses' => 'PlaylistController@insertData']);

	Route::get('/playlist/delete', ['as' => 'playlist.delete', 'uses' => 'PlaylistController@deleteData']);

	Route::get('/playlist/active', ['as' => 'playlist.active', 'uses' => 'PlaylistController@activeData']);

	Route::get('/playlist/edit', ['as'   => 'playlist.edit', 'uses' => 'PlaylistController@editData']);
	Route::post('/playlist/edit', ['as'  => 'playlist.edit', 'uses' => 'PlaylistController@editData']);

	Route::get('/playlist/apply', ['as'  => 'playlist.apply','uses' => 'PlaylistController@applyData']);
	Route::post('/playlist/apply', ['as' => 'playlist.apply','uses' => 'PlaylistController@applyData']);

	Route::get('/muti/getfile', ['as' => 'muti.file', 'uses' => 'MutiController@completeData']);
	Route::get('/playlist/getfile', ['as' => 'muti.file', 'uses' => 'PlaylistController@completeData']);
});