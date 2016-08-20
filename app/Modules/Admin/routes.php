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
	
	Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
	Route::post('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);

	Route::get('/news/rss', ['as' => 'news.rss', 'uses' => 'NewsController@updateRss']);

	Route::post('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertNews']);
	Route::get('/news/insert', ['as' => 'news.insert', 'uses' => 'NewsController@insertNews']);

	Route::get('/news/delete', ['as' => 'news.delete', 'uses' => 'NewsController@deleteNews']);

	Route::get('/news/active', ['as' => 'news.active', 'uses' => 'NewsController@activeNews']);

	Route::get('/news/edit', ['as'   => 'news.edit', 'uses' => 'NewsController@editNews']);
	Route::post('/news/edit', ['as'  => 'news.edit', 'uses' => 'NewsController@editNews']);

	Route::get('/news/apply', ['as'  => 'news.apply','uses' => 'NewsController@applyNews']);
	Route::post('/news/apply', ['as' => 'news.apply','uses' => 'NewsController@applyNews']);

	Route::get('/jobs', ['as' => 'news.index', 'uses' => 'JobsController@index']);
	Route::post('/jobs', ['as' => 'news.index', 'uses' => 'JobsController@index']);

	Route::post('/jobs/insert', ['as' => 'jobs.insert', 'uses' => 'JobsController@insertJobs']);
	Route::get('/jobs/insert', ['as' => 'jobs.insert', 'uses' => 'JobsController@insertJobs']);

	Route::get('/jobs/delete', ['as' => 'jobs.delete', 'uses' => 'JobsController@deleteJobs']);

	Route::get('/jobs/active', ['as' => 'jobs.active', 'uses' => 'JobsController@activeJobs']);

	Route::get('/jobs/edit', ['as'   => 'jobs.edit', 'uses' => 'JobsController@editJobs']);
	Route::post('/jobs/edit', ['as'  => 'jobs.edit', 'uses' => 'JobsController@editJobs']);

	Route::get('/jobs/apply', ['as'  => 'jobs.apply','uses' => 'JobsController@applyJobs']);
	Route::post('/jobs/apply', ['as' => 'jobs.apply','uses' => 'JobsController@applyJobs']);


	Route::get('/ads', ['as' => 'news.index', 'uses' => 'AdsController@index']);
	Route::post('/ads', ['as' => 'news.index', 'uses' => 'AdsController@index']);

	Route::post('/ads/insert', ['as' => 'ads.insert', 'uses' => 'AdsController@insertAds']);
	Route::get('/ads/insert', ['as' => 'ads.insert', 'uses' => 'AdsController@insertAds']);

	Route::get('/ads/delete', ['as' => 'ads.delete', 'uses' => 'AdsController@deleteAds']);

	Route::get('/ads/active', ['as' => 'ads.active', 'uses' => 'AdsController@activeAds']);

	Route::get('/ads/edit', ['as'   => 'ads.edit', 'uses' => 'AdsController@editAds']);
	Route::post('/ads/edit', ['as'  => 'ads.edit', 'uses' => 'AdsController@editAds']);

	Route::get('/ads/apply', ['as'  => 'ads.apply','uses' => 'AdsController@applyAds']);
	Route::post('/ads/apply', ['as' => 'ads.apply','uses' => 'AdsController@applyAds']);
});