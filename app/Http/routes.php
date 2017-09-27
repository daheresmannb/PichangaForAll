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

Route::get(
	'/perfil', 
	function () {
    	return view('userjugador.perfil');
	}
);

Route::post('/datosjugador', 'GmapsController@LatLngbyDirect')->name('datos.jug');

Route::post('/buscar', 'GmapsController@LatLngbyDirect')->name('buscar.jug');





//ejemplo
          //nombre_ruta  nombre_controller  nombre_funcion
Route::post('titodelivery','TitoController@ganjah');
//fin ejemplo

//#########################################################################

//prueba de funcionamineto operaciones crud info_user
Route::post('/infoUser','UserController@UpdateInfoUser');

//#########################################################################

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


////////////// rutas para el usuario logeado //////////////////////
Route::group(
	['middleware' => ['auth']], 
	function () {
		Route::get('/home', 
			function () {
    			return view('userjugador.indexuser');
			}
		);

		Route::get(
			'/jugadorescercanos', 
			function () {
    			return view('userjugador.gmaps');
			}
		);

		Route::get('/homeuser', 
			function () {
    			return view('landing.homeuser');
			}
		);
	}
);
/////////////// rutas para el usuario logeado /////////////////////////

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

//// usuarios /////////////////////////////////////////////////////////
Route::get(
	'/buscar', 
	function () {
    	return view('userjugador.buscarjug');
	}
);




Route::get(
	'/registro', 
	function () {
    	return view('userjugador.regusuarios');
	}
);

Route::post('usuario/crear','UserController@CreateUsers')->name(
	'usuario.crear'
);



////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD JUGADOR //////////////////////////////////	
Route::post('jugador/crear','JugadorController@CreateJugador')->name(
	'jugador.obtener'
);
Route::post('jugador/obtener','JugadorController@ReadJugador')->name(
	'jugador.obtener'
);
Route::post('jugador/actualizar','JugadorController@UpdateJugador')->name(
	'jugador.actualizar'
);
Route::post('jugador/eliminar','JugadorController@DeleteJugador')->name(
	'jugador.eliminar'
);
/////////////////////////////////////////////////////////////////////

////////////// RUTA JUGADORES CERCANOS //////////////////////////////
Route::post('jugadores/cercanos','JugadorController@getJugadoresCercanos')->name(
	'jugador.cercanos'
);
/////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD PARTIDOS //////////////////////////////////
Route::post('partido/obtener','JugadorController@CreatePartido')->name(
	'partido.obtener'
);
Route::post('partido/actualizar','JugadorController@ReadPartido')->name(
	'partido.actualizar'
);
Route::post('partido/eliminar','JugadorController@UpdatePartido')->name(
	'partido.eliminar'
);
Route::post('partido/cercanos','JugadorController@DeletePartido')->name(
	'partido.cercanos'
);
/////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD INFO_USER ////////////////////////////////
Route::post('infoUser/crear','UserController@CreateInfoUser')->name(
	'infoUser.crear'
);
Route::post('infoUser/obtener','UserController@ReadInfoUser')->name(
	'infoUser.obtener'
);
Route::post('infoUser/actualizar','UserController@UpdateInfoUser')->name(
	'infoUser.actualizar'
);
Route::post('infoUser/eliminar','UserController@DeleteInfoUser')->name(
	'infoUser.eliminar'
);
/////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD USER /////////////////////////////////////
Route::post('user/crear','UserController@CreateUsers')->name(
	'user.crear'
);
Route::post('user/obtener','UserController@ReadUser')->name(
	'user.obtener'
);
Route::post('user/actualizar','UserController@UpdateUser')->name(
	'user.actualizar'
);

Route::post('user/eliminar','UserController@DeleteUser')->name(
	'user.eliminar'
);
/////////////////////////////////////////////////////////////////////
