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
	Route::get('/tin-tuc/noi-dung/{id}', 'NewsController@contentnews');
	Route::get('/viec-lam/noi-dung/{id}', 'JobsController@contentjobs');
	Route::get('/rao-vat/noi-dung/{id}', 'AdsController@contentads');
	Route::get('/audio/noi-dung/{id}', 'MutiController@muti');
	Route::get('/playlist/noi-dung/{id}', 'MutiController@playlist');
	Route::get('/video/noi-dung/{id}', 'MutiController@video');

	/*COMMENT*/
	Route::get('/insertcomment', 'LibraryController@insertComment');
	Route::post('/insertcomment', 'LibraryController@insertComment');
	Route::get('/getcomment/{id}', 'LibraryController@getComment');

	/*JOBS*/
	Route::get('/quan-li-viec-lam/postface/{id}', 'PostjobsController@postfaceJobs');
	Route::post('/quan-li-viec-lam', 'PostjobsController@index');
	Route::get('/quan-li-viec-lam', 'PostjobsController@index');
	Route::get('/quan-li-viec-lam/delete', 'PostjobsController@deleteJobs');
	Route::get('/quan-li-viec-lam/xem-tin-tuyen-dung', 'PostjobsController@viewJobs');
	Route::post('/quan-li-viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::get('/quan-li-viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::post('/quan-li-viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
	Route::get('/quan-li-viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');

	/*ADS*/
	Route::get('/quan-li-rao-vat/postface/{id}', 'PostadsController@postfaceads');
	Route::post('/quan-li-rao-vat', 'PostadsController@index');
	Route::get('/quan-li-rao-vat', 'PostadsController@index');
	Route::get('/quan-li-rao-vat/delete', 'PostadsController@deleteads');
	Route::get('/quan-li-rao-vat/xem-tin-rao-vat', 'PostadsController@viewads');
	Route::post('/quan-li-rao-vat/dang-tin-rao-vat', 'PostadsController@insertads');
	Route::get('/quan-li-rao-vat/dang-tin-rao-vat', 'PostadsController@insertads');
	Route::post('/quan-li-rao-vat/sua-tin-rao-vat', 'PostadsController@editads');
	Route::get('/quan-li-rao-vat/sua-tin-rao-vat', 'PostadsController@editads');
});
Route::auth();

Route::get('/home', 'HomeController@index');
