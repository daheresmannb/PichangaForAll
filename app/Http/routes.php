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
Route::get(
	'/crearpartido',
	function () {
    	return view('userjugador.crearpartido');
	}
);
Route::post('/datosjugador', 'GmapsController@LatLngbyDirect')->name('datos.jug');

Route::post('/buscar', 'GmapsController@LatLngbyDirect')->name('buscar.jug');

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

		Route::get(
			'/index',
			function () {
				return view('newadmin.index');
			}
		);

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

		Route::get('/usonline',
			function () {
    			return view('userjugador.jugonline');
			}
		);

		Route::get('/chat',
			function () {
    			return view('userjugador.chat');
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
Route::post('partido/crear','EventoController@CreatePartido')->name(
	'partido.crear'
);
Route::post('partido/actualizar','EventoController@UpdatePartido')->name(
	'partido.actualizar'
);
Route::post('partido/eliminar','EventoController@DeletePartido')->name(
	'partido.eliminar'
);
Route::post('partido/obtener','EventoController@ReadPartido')->name(
	'partido.obtener'
);
/////////////////////////////////////////////////////////////////////

//////////////// Rutas Torneos///////////////////////////////////////

Route::get(
	'/creacapeonato',
		function () {
			return view('userjugador.creacampeonato');
	}
);

/////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD INFO_USER ////////////////////////////////


//prueba de funcionamineto operaciones crud info_user
//Route::post('/infoUser','UserController@updateinfouser');

Route::get(
	'/infouser',
	function () {
    	return view('userjugador.infouser');
	}
);


Route::post('infouser/crear','UserController@CreateInfoUser')->name(
	'infouser.crear'
);
Route::post('infouser/obtener','UserController@ReadInfoUser')->name(
	'infouser.obtener'
);
Route::post('infouser/actualizar','UserController@UpdateInfoUser')->name(
	'infouser.actualizar'
);
Route::post('infouser/eliminar','UserController@DeleteInfoUser')->name(
	'infouser.eliminar'
);
/////////////////////////////////////////////////////////////////////

/////////////// RUTAS CRUD USER /////////////////////////////////////

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

Route::post('usuario/obtener','UserController@ReadUser')->name(
	'usuario.obtener'
);
Route::post('usuario/actualizar','UserController@UpdateUser')->name(
	'usuario.actualizar'
);

Route::post('usuario/eliminar','UserController@DeleteUser')->name(
	'usuario.eliminar'
);

///////////////////// CRUD ROLES ///////////////////////7

Route::post('rol/crear','RolController@RolCreate')->name(
	'rol.crear'
);
Route::post('rol/obtener','RolController@RolRead')->name(
	'rol.obtener'
);
Route::post('rol/actualizar','RolController@RolUpdate')->name(
	'rol.actualizar'
);
Route::post('rol/eliminar','RolController@RolDelete')->name(
	'rol.eliminar'
);
/////////////////////////////////////////////////////////
////////////////// CRUD RECINTO /////////////////////////
/////////////////////////////////////////////////////////////////////

Route::get(
    '/recintos',
    function () {
       return view('userjugador.recintos');
    }
);


Route::post('recinto/crear','RecintosController@RecintoCreate')->name(
	'recinto.crear'
);

Route::post('recinto/obtener','RecintosController@RecintoRead')->name(
	'recinto.obtener'
);

Route::post('recinto/actualizar','RecintosController@RecintoUpdate')->name(
	'recinto.actualizar'
);

Route::post('recinto/eliminar','RecintosController@RecintoDelete')->name(
	'recinto.eliminar'
);

/////////////////////////////////////////////////////////
////////////////// CRUD FALTAS /////////////////////////

Route::post('falta/crear','FaltasController@FaltaCreate')->name(
	'falta.crear'
);

Route::post('falta/obtener','FaltasController@FaltaRead')->name(
	'falta.obtener'
);

Route::post('falta/actualizar','FaltasController@FaltaUpdate')->name(
	'falta.actualizar'
);

Route::post('falta/eliminar','FaltasController@FaltaDelete')->name(
	'falta.eliminar'
);

/////////////////////////////////////////////////////////
////////////// FACEBOOK LOGIN ROUTES /////////////

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
/////////////////////////////////////////////////////////

Route::post('infoperfil','JugadorController@ReadInfoJugador')->name(
	'infoperfil'
);


Route::get(
	'/social/redirect/{provider}',
	'SocialAuthController@getSocialRedirect'
)->name('redirectSocialLite');

Route::get(
	'/social/handle/{provider}',
	'SocialAuthController@getSocialHandle'
)->name('handleSocialLite');

Route::post('usuarioenlinea/obtener','UserController@getUsersOnline');

///////////////////////////////////////////
/////////torneos rutas//

Route::post('torneos/crear','TorneoController@CreateTorneo')->name(
	'torneo.crear'
);

Route::post('torneos/obtener','TorneoController@ReadTorneo')->name(
	'torneo.obtener'
);


Route::post('amigo/solicitud/enviar','UserController@AddFriend');
Route::post('amigo/solicitud/rechazar','UserController@DenySolFriend');
Route::post('amigo/solicitud/aceptar','UserController@AceptarSolicitud');

Route::post('amigo/eliminar','UserController@DeleteFriend');
Route::post('amigo/obtener','UserController@GetFriends');

Route::post('amigo/solicitudes/pendientes','UserController@SolicitudesPendientes');

Route::group(
	['prefix' => 'messages'],
	function () {
		Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
	}
);

Route::post('partido/sumarse','EventoController@SumarsePartido');
