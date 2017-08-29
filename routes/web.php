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

use App\Post;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{id}', 'PostController@single');
Route::get('/posts/{id}/edit', 'PostController@edit');

Route::post('/posts', 'PostController@store');
Route::post('/posts/{id}/update', 'PostController@update');
Route::delete('/posts/{id}', 'PostController@delete');
