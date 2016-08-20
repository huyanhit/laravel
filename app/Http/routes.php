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
	Route::post('/viec-lam', 'PostjobsController@index');
	Route::get('/viec-lam', 'PostjobsController@index');
	Route::get('/ajaxjobs', 'HomeController@ajaxjobs');
	Route::get('/ajaxads', 'HomeController@ajaxads');

	/*CONTENT*/
	Route::get('/noi-dung-tin/{id}', 'ContentController@contentNews');
	Route::get('/noi-dung-viec-lam/{id}', 'ContentController@contentJobs');
	Route::get('/noi-dung-rao-vat/{id}', 'ContentController@contentAds');
	
	/*JOBS*/
	Route::get('/postface/{id}', 'PostjobsController@postfaceJobs');
	Route::get('/viec-lam/delete', 'PostjobsController@deleteJobs');
	Route::get('/viec-lam/Xem-thu-tin-tuyen-dung', 'PostjobsController@viewJobs');
	Route::post('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::get('/viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::post('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
	Route::get('/viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
});