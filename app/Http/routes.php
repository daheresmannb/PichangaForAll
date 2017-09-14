<?php

//Route::auth();
Route::get(
	'/', 
	function () {
    	return view('landing.index');
	}
);

Route::get(
	'/listaj', 
	function () {//nombre_carpeta .   nombre_vista
    	return view('userjugador.listaj');
	}
);
Route::get(
	'/formulariojugador', 
	function () {
    	return view('userjugador.formjugador');
	}
);

Route::post('/regjugador', 'GmapsController@LatLngbyDirect')->name('reg.jug');

Route::get(
	'/datosjugador', 
	function () {
    	return view('userjugador.datosjug');
	}
);

Route::post('/datosjugador', 'GmapsController@LatLngbyDirect')->name('datos.jug');
//buscar datos
Route::get(
	'/buscar', 
	function () {
    	return view('userjugador.buscarjug');
	}
);

Route::post('/buscar', 'GmapsController@LatLngbyDirect')->name('buscar.jug');


//ejemplo
          //nombre_ruta  nombre_controller  nombre_funcion
Route::post('titodelivery','TitoController@ganjah');
//fin ejemplo


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


Route::post('jugador/crear','JugadorController@CreateJugador');
Route::post('jugador/obtener','JugadorController@ReadJugador');
Route::post('jugador/actualizar','JugadorController@UpdateJugador');
Route::post('jugador/eliminar','JugadorController@DeleteJugador');