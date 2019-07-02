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

Route::prefix('')->group(function(){
	Route::get('/', 'HomeController@index')->name('default');
	Route::get('/category/{slug}', 'CategoryController@slug')->name('category');
	Route::get('/post/{slug}', 'PostController@detail')->name('detail');
	Route::get('/most-view', 'HomeController@mostview')->name('mostview');
	Route::get('/contact', 'HomeController@contact');
	Route::get('/about', 'HomeController@about');
	Route::post('/like/{id}', 'PostController@like');
	Route::post('/dislike/{id}', 'PostController@dislike');	
});
Route::group(['prefix' => 'admints', 'namespace' => 'Admin\\'],function(){
	Route::get('/','HomeController@home')->name('admin');
	Route::get('/login', 'HomeController@index')->name('login');
	Route::get('/logout','HomeController@logout')->name('logout');
	Route::post('/postlogin', 'HomeController@login');
});
