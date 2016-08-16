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

	Route::get('/home', 'HomeController@index');

	Route::get('/postface', 'HomeController@postface');

	Route::get('/ajaxjobs', 'HomeController@ajaxjobs');

	Route::get('/postjobs', 'PostjobsController@index');


	Route::get('/content/{id}', 'ContentController@content');

	Route::get('/contact', 'ContactController@contact');

	Route::post('/postjobs/insert', 'PostjobsController@insertJobs');
	Route::get('/postjobs/insert', 'PostjobsController@insertJobs');

	Route::post('/postjobs/edit', 'PostjobsController@editJobs');
	Route::get('/postjobs/edit', 'PostjobsController@editJobs');
});