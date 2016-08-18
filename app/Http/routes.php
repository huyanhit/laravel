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
	Route::get('/', 'HomeController@index');

	Route::get('/trang-chu', 'HomeController@index');


	Route::get('/ajaxjobs', 'HomeController@ajaxjobs');

	Route::post('/viec-lam', 'PostjobsController@index');
	Route::get('/viec-lam', 'PostjobsController@index');

	Route::get('/viec-lam/delete', 'PostjobsController@deleteJobs');

	Route::get('/noi-dung/{id}', 'ContentController@content');

	Route::get('/postface/{id}', 'PostjobsController@postface');

	Route::post('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::get('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');

	Route::post('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
	Route::get('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
});