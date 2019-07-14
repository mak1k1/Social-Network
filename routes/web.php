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
Route::post('/post/submit', 'PostController@submit')->name('post.submit');

//Users
Route::get('/user/{id}', 'UserController@show')->name('user.show');
Route::post('/home', 'UserController@sendFriendRequest')->name('user.sendFriendRequest');
Route::post('/home/respond-to-request/{id}', 'UserController@respondToFriendRequest')->name('user.respondToFriendRequest');
Route::post('/user/{id}', 'UserController@editProfile')->name('user.edit');
