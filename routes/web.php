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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post/create','PostController@store')->name('post.store');

//edit post
Route::get('/post/{id}/edit','PostController@edit')->name('post.edit');
Route::put('/post/{id}/edit','PostController@update')->name('post.update');

//delete
Route::delete('/post/{id}/delete','PostController@destroy')->name('post.destroy');




