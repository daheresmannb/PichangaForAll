<?php

//Route::auth();
Route::get(
	'/', 
	function () {
    	return view('landing.index');
	}
);

Route::get('/gmaps', 'GmapsController@index');
Route::post('/LatLngd', 'GmapsController@LatLngbyDirect')->name('latlng.dir');

////rutas controladores //////////////////
Route::post('obtener/ejemplo','EjemploController@ejemplo');

Route::post('/signin', 'JwtController@login');
Route::get('/signout', 'JwtController@logout');

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

		Route::get('/homeuser', 
			function () {
    			return view('landing.homeuser');
			}
		);
	}
);

		Route::get(
			'/indexj', 
			function () {
    			return view('userjugador.indexuser');
			}
		);

Route::group(
	['middleware' => ['admin']], 
	function () {

	}
);