<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
	'uses'=>'PostController@getIndex',
	'as'=> 'blog.index']);

route::get('/jake','mypostController@getIndex');

Route::get('post/{id?}',[
	'uses'=>'PostController@getPost',
	'as'=>'blog.post'
]);

Route::get('/about',function(){
return view('other.about');
})->name('about.index');

Route::group(['prefix'=>'admin'],function(){
Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);
});
