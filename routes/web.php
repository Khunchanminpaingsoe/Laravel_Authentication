<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomePageController@index');


Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::get('/users', 'UserController@index');
    Route::get('/users/edit/{id}', 'UserController@edit');
    Route::post('/users/edit/{id}', 'UserController@update');
    Route::get('/users/destroy/{id}', 'UserController@destroy');
});

/*Route::get('/register','Auth\RegisterController@index');
Route::post('/register','Auth\RegisterController@register');

Route::get('/login','Auth\LoginController@index');

Route::get('/logout','Auth\LoginController@logout');
//Route::post('/login','Auth\LoginController@create');*/

