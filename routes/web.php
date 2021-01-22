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

// Route::resource('/','postBlogController');
// Route::get('/form','postBlogController@create');
// Route::post('/form/create','postBlogController@post');
// Route::get('/edit/{id}','postBlogController@edit')->name('edit');
// Route::post('/update/{id}','postBlogController@update');
// Route::get('/delete/{id}','postBlogController@destroy');

Route::resource('/','postBlogController'); // edit
Route::get('welcome','postBlogController@index')->name('welcome');
Route::get('/form','postBlogController@create')->name('form');
Route::get('/show/{id}','postBlogController@show')->name('show');
Route::post('/form/create','postBlogController@post')->name('create');
Route::get('/edit/{id}','postBlogController@edit')->name('edit');
Route::post('/update/{id}','postBlogController@update')->name('update');
Route::get('/delete/{id}','postBlogController@destroy')->name('delete');
