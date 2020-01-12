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

Route::get('/','PostController@index');
// Route::get('home','PagesController@home');
// Route::get('about','PagesController@about');
Route::resource('posts','PostController');


Route::post('posts/store','PostController@store');
Route::get('posts/delete/{id}','PostController@destroy');
Route::get('posts/edit/{id}','PostController@edit');
Route::post('posts/update/{id}','PostController@update');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
