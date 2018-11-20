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
	Route::get('/categories/delete/{id}',[
	    'uses' => 'CategoriesController@destroy',
        'as' => 'categories.delete'
    ]);
    Route::get('/categories/kill/{id}',[
        'uses' => 'CategoriesController@kill',
        'as' => 'categories.kill'
    ]);
    Route::get('/categories/restore/{id}',[
        'uses' => 'CategoriesController@restore',
        'as' => 'categories.restore'
    ]);
    Route::get('/posts/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'
    ]);
    Route::get('/posts/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'
    ]);
    Route::get('/posts/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);
    Route::get('/catsTrash','CategoriesController@catsTrash');
    Route::get('/postsTrash','PostsController@postsTrash');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
