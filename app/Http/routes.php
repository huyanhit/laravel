<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function () {
	/*HOME*/
	Route::get('/', 'HomeController@index');
	Route::get('/trang-chu', 'HomeController@index');
	Route::get('/ajaxjobs', 'HomeController@ajaxjobs');
	Route::get('/ajaxads', 'HomeController@ajaxads');

	/*CONTENT*/
	Route::get('/tin-tuc/noi-dung/{id}', 'NewsController@content');
	Route::get('/viec-lam/noi-dung/{id}', 'JobsController@content');
	Route::get('/rao-vat/noi-dung/{id}', 'AdsController@content');

	Route::get('/insertcomment', 'LibraryController@insertComment');
	Route::post('/insertcomment', 'LibraryController@insertComment');
	Route::get('/getcomment/{id}', 'LibraryController@getComment');

	/*JOBS*/
	Route::get('/postface/{id}', 'PostjobsController@postfaceJobs');
	Route::post('/viec-lam', 'JobsController@index');
	Route::get('/viec-lam', 'JobsController@index');
	Route::get('/viec-lam/delete', 'JobsController@deleteJobs');
	Route::get('/viec-lam/xem-tin-tuyen-dung', 'JobsController@viewJobs');
	Route::post('/viec-lam/dang-tin-tuyen-dung', 'JobsController@insertJobs');
	Route::get('/viec-lam/dang-tin-tuyen-dung', 'JobsController@insertJobs');
	Route::post('/viec-lam/sua-tin-tuyen-dung', 'JobsController@editJobs');
	Route::get('/viec-lam/sua-tin-tuyen-dung', 'JobsController@editJobs');

	/*ADS*/
	Route::get('/postface/{id}', 'AdsController@postfaceads');
	Route::post('/rao-vat', 'AdsController@index');
	Route::get('/rao-vat', 'AdsController@index');
	Route::get('/rao-vat/delete', 'AdsController@deleteads');
	Route::get('/rao-vat/xem-tin-rao-vat', 'AdsController@viewads');
	Route::post('/rao-vat/dang-tin-rao-vat', 'AdsController@insertads');
	Route::get('/rao-vat/dang-tin-rao-vat', 'AdsController@insertads');
	Route::post('/rao-vat/sua-tin-rao-vat', 'AdsController@editads');
	Route::get('/rao-vat/sua-tin-rao-vat', 'AdsController@editads');

	/*MUTI*/
	Route::get('/audio/noi-dung/{id}', 'MutiController@muti');
	Route::get('/playlist/noi-dung/{id}', 'MutiController@playlist');
	Route::get('/video/noi-dung/{id}', 'MutiController@video');

});