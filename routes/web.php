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


Route::resource('/news', 'NewsController');

Route::resource('/post', 'PostController');








Route::prefix('/api')->namespace('api')->group(function() {

	Route::get('/', function() {
		return 'ok';
	});


	Route::post('/auth', 'AuthController@login');


  Route::group(['middleware' => 'APIToken'], function() {

    Route::post('/posts', 'PostController@store');

    Route::post('/posts/{id}', 'PostController@update');

    Route::delete('/posts/{id}', 'PostController@destroy');
  });






});







// Route::prefix('/api')->namespace('API')->group(function() {

// 	Route::get('/', function() {
// 		return 'ok';
// 	});


// 	Route::get('/check', function() {
// 		return 'ok';
// 	})->middleware('APIToken');


// 	Route::get('/auth', 'AuthController@login');
// 	Route::post('/auth', 'AuthController@login');

// });



// Route::get('/api/authForm', 'ApiController@authForm');

// Route::post('/api/auth', 'ApiController@auth')->name('apiAuth');



// // Route::get('/api/auth', function(Request $request) {
// // 	// return json_encode(['asd']);
// // 	return json_encode(['asd', $request]);
// // 	return json_encode($request);
// // });



// Route::post('/api/auth', function(Request $request) {
// 	// return $request;
// 	return json_encode($request);

// 	// return json_encode('asd');

// 	// $login = $request->input('login');
// 	// $pass = $request->input('password');

// 	// return json_encode($login . '-' . $pass);
// });





