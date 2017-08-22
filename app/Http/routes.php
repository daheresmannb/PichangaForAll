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


// rutas vistas //////
Route::get('/', function () {
    return view('welcome');
});


Route::get('mivista', function () {
    return view('prueba');
});
/////////////////////////////7


////rutas controladores //////////////////

Route::post('obtener/ejemplo','EjemploController@ejemplo');