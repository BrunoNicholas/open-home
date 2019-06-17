<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('layouts.site');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','verified','role:super-admin|admin']], function(){
	Route::resource('/roles', 'RoleController');
	/*
	 * closure pages
	 */
	Route::get('/', [
		'as' 	=> 'admin',
		'uses'	=> 'AdminPageController@index',
	]);
});
Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function(){
	Route::resource('messages', 'MessageController');
	Route::resource('/projects', 'ProjectController');
	Route::resource('/questions', 'QuestionController');
	Route::resource('projects/posts', 'PostController');
	Route::resource('structure/departments', 'DepartmentController');
	/**
	 * Route Closures
	 */
	Route::get('/user', [
		'as' 	=> 'home.user',
		'uses'	=> 'UserPageController@home',
	]);
	Route::get('/user/profile', [
		'as' 	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('/user/profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('/user/password/profile', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});
Route::group(['prefix' => 'web', 'middleware' => 'web'], function(){
	Route::get('/', [
		'as' 	=> 'welcome',
		'uses'  => function () {
		    return view('welcome');
		}
	]);

	Route::get('/help', [
		'as' 	=> 'help',
		'uses'  => function () {
		    return view('web.help');
		}
	]);

	Route::get('/terms-&-conditions', [
		'as' 	=> 'terms',
		'uses'  => function () {
		    return view('web.terms');
		}
	]);
});
