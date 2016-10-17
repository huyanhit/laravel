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
	Route::get('/ajaxjobs', 'HomeController@ajaxJobs');
	Route::get('/ajaxads', 'HomeController@ajaxAds');

	/*CONTENT*/
	Route::get('/tin-tuc', 'NewsController@index');
	Route::get('/tin-tuc/noi-dung/{id}', 'NewsController@contentNews');
	Route::get('/viec-lam/noi-dung/{id}', 'JobsController@contentJobs');
	Route::get('/rao-vat/noi-dung/{id}', 'AdsController@contentAds');
	Route::get('/audio/noi-dung/{id}', 'MutiController@muti');
	Route::get('/playlist/noi-dung/{id}', 'MutiController@playList');
	Route::get('/video/noi-dung/{id}', 'MutiController@video');

	/*COMMENT*/
	Route::get('/insertcomment', 'LibraryController@insertComment');
	Route::post('/insertcomment', 'LibraryController@insertComment');
	Route::get('/getcomment/{id}', 'LibraryController@getComment');

	/*JOBS*/
	Route::get('/viec-lam', 'JobsController@index');
	Route::get('/quan-li-viec-lam/postface/{id}', 'PostjobsController@postFaceJobs');
	Route::post('/quan-li-viec-lam', 'PostjobsController@index');
	Route::get('/quan-li-viec-lam', 'PostjobsController@index');
	Route::get('/quan-li-viec-lam/delete', 'PostjobsController@deleteJobs');
	Route::get('/quan-li-viec-lam/xem-tin-tuyen-dung', 'PostjobsController@viewJobs');
	Route::post('/quan-li-viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::get('/quan-li-viec-lam/dang-tin-tuyen-dung', 'PostjobsController@insertJobs');
	Route::post('/quan-li-viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');
	Route::get('/quan-li-viec-lam/sua-tin-tuyen-dung', 'PostjobsController@editJobs');

	/*ADS*/
	Route::get('/rao-vat', 'AdsController@index');
	Route::get('/quan-li-rao-vat/postface/{id}', 'PostadsController@postFaceAds');
	Route::post('/quan-li-rao-vat', 'PostadsController@index');
	Route::get('/quan-li-rao-vat', 'PostadsController@index');
	Route::get('/quan-li-rao-vat/delete', 'PostadsController@deleteAds');
	Route::get('/quan-li-rao-vat/xem-tin-rao-vat', 'PostadsController@viewAds');
	Route::post('/quan-li-rao-vat/dang-tin-rao-vat', 'PostadsController@insertAds');
	Route::get('/quan-li-rao-vat/dang-tin-rao-vat', 'PostadsController@insertAds');
	Route::post('/quan-li-rao-vat/sua-tin-rao-vat', 'PostadsController@editAds');
	Route::get('/quan-li-rao-vat/sua-tin-rao-vat', 'PostadsController@editAds');
});
Route::auth();

Route::get('/home', 'HomeController@index');
