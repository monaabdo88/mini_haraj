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
Route::get('/home', function () {
    return view('home');
});
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth','web']],function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::resource('/categories','CategoriesController');
	Route::resource('/posts','PostsController');	
	Route::get('/settings','SettingsController@index');
	Route::match(['put', 'patch'],'/settings/edit','SettingsController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
