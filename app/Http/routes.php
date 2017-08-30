<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

		Route::get('/', function () {
    return view('welcome');
});

// rutas vistas //////



/////////////////////////////7


////rutas controladores //////////////////

Route::post('obtener/ejemplo','EjemploController@ejemplo');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get(
	'obtener/ejemplo', [
		'middleware' => 'auth:api', 
		'uses' => 'EjemploController@ejemplo'
	]
);



Route::post('/signin', 'JwtController@login');
//Route::get('/signin', 'JwtController@signin');
Route::post('/signout', 'JwtController@signout');
Route::post('/getuser', 'JwtController@getAuthUser');

 
Route::group(
	['middleware' => ['auth']], 
	function () {
		Route::get('/home', 
			function () {
    			return view('home');
			}
		);
	}
);