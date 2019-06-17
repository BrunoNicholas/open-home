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

	// route closures

	Route::get('profile', [
		'as'	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('profile/password', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});
