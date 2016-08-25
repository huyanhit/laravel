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
	Route::get('/noi-dung/{id}', 'PostnewsController@content');
	
	/*JOBS*/
	Route::get('/postface/{id}', 'PostjobsController@postfaceJobs');
	Route::post('/viec-lam', 'PostjobsController@index');
	Route::get('/viec-lam', 'PostjobsController@index');
	Route::get('/viec-lam/delete', 'PostjobsController@deleteJobs');
	Route::get('/viec-lam/xem-tin-tuyen-dung', 'PostjobsController@viewJobs');
	Route::post('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::get('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::post('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
	Route::get('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');

	/*ADS*/
	Route::get('/postface/{id}', 'PostadsController@postfaceads');
	Route::post('/rao-vat', 'PostadsController@index');
	Route::get('/rao-vat', 'PostadsController@index');
	Route::get('/rao-vat/delete', 'PostadsController@deleteads');
	Route::get('/rao-vat/xem-tin-rao-vat', 'PostadsController@viewads');
	Route::post('/rao-vat/dang-tin-rao-vat', 'PostadsController@insertads');
	Route::get('/rao-vat/dang-tin-rao-vat', 'PostadsController@insertads');
	Route::post('/rao-vat/sua-tin-rao-vat', 'PostadsController@editads');
	Route::get('/rao-vat/sua-tin-rao-vat', 'PostadsController@editads');

	/*MUTI*/
	Route::get('/giai-tri', 'MutiController@index');
});