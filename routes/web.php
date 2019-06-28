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
	Route::get('/category/{slug}', 'CategoryController@slug');
	Route::get('/post/{id}', 'PostController@detail')->name('detail');
	Route::get('/contact', function(){
		return view('frontend.pages.contact');
	});
	Route::get('/about/a',function(){
		return view('frontend.pages.about');
	});
	Route::get('/category', function(){
		return view('frontend.pages.category');
	});
	Route::get('/detail', function(){
		return view('frontend.pages.detail');
	});
});
Route::prefix('/admints')->group(function(){
	Route::get('/', function(){
		return view('backend.pages.home');
	});
	// Route::get('/login',function(){
	// 	return view('backend.pages.login');
	// });
	// Route::get('/register', function(){
	// 	return view('backend.pages.register');
	// });
	// Route::prefix('/user')->group(function(){
	// 	Route::get('', function(){
	// 		return view('backend.user.index');
	// 	});
	// 	Route::get('/edit/{id}', function(){
	// 		return view('backend.user.edit');
	// 	});
	// 	Route::get('/create', function(){
	// 		return view('backend.user.create');
	// 	});
	// });
	// Route::group(['prefix' => 'category', 'namespace' => 'Api\V1'], function(){
	// 	Route::get('/', 'CategoryController@home');
	// 	Route::resource('/', 'CategoryController')->except([
	// 		'index', 'edit',
	// 	]);
	// });

	// Route::get('/categories', 'CategoryController@index');
	// Route::get('/users', 'UserController@index');
	// Route::prefix('/category')->group(function(){
	// 	Route::get('', function(){
			
	// 	});
	// 	Route::get('/edit/{id}', [
	// 		'uses'=> 'Admin\CategoryController@create'
	// 	]);
	// 	Route::get('/create', [
	// 		'uses'=> 'Admin\CategoryController@create'
	// 	]);
	// 	Route::post('/save',[
	// 		'uses' => 'Admin\CategoryController@save'
	// 	]);
	// });
	// Route::group(['prefix' => '/', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
	// 	
	// });
	
});
