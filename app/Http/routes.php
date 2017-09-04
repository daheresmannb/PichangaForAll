<?php

//Route::auth();
Route::get(
	'/', 
	function () {
    	return view('landing.index');
	}
);

////rutas controladores //////////////////
Route::post('obtener/ejemplo','EjemploController@ejemplo');

Route::post('/signin', 'JwtController@login');
Route::post('/signout', 'JwtController@signout');

Route::get('/login', 
	function () {
    	return view('landing.login');
	}
);

Route::group(
	['middleware' => ['auth']], 
	function () {
		Route::get('/home', 
			function () {
    			return view('landing.home');
			}
		);
	}
);