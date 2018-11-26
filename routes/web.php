<?php
//Auth Routes
Auth::routes();
//Frontend Routes
Route::get('/', [
    'uses' => 'FrontendController@index',
    'as'   => 'index'
]);
Route::get('/post/{slug}','FrontendController@singlePost');
Route::get('/cats/{slug}','FrontendController@singleCat');
Route::get('/tag/{id}','FrontendController@singleTag');
Route::get('/home', function () {
    return view('home');
});
Route::get('/results/','FrontendController@search');
// Admin Panel Routes
Route::group(['prefix'=>'admin','middleware'=>['auth','web','admin']],function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::resource('/categories','CategoriesController');
	Route::resource('/tags','TagController');
	Route::resource('/posts','PostsController');
	Route::resource('/users','UsersController');
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
    Route::get('/tags/delete/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tags.delete'
    ]);
    Route::get('/tags/kill/{id}',[
        'uses' => 'TagController@kill',
        'as' => 'tags.kill'
    ]);
    Route::get('/tags/restore/{id}',[
        'uses' => 'TagController@restore',
        'as' => 'tags.restore'
    ]);
    Route::get('/users/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'users.delete'
    ]);
    Route::get('/catsTrash','CategoriesController@catsTrash');
    Route::get('/postsTrash','PostsController@postsTrash');
    Route::get('/tagsTrash','TagController@tagsTrash');
});
Route::group(['middleware'=>['auth','web']],function() {
    Route::resource('/profile','ProfilesController');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
