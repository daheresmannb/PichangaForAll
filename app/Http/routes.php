<?php

Route::auth();
Route::get(
	'/', 
	function () {
    	return view('index');
	}
);

////rutas controladores //////////////////
Route::post('obtener/ejemplo','EjemploController@ejemplo');

Route::post('/signin', 'JwtController@login');
Route::post('/signout', 'JwtController@signout');

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