<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Jugador;

class JugadorController extends Controller {
    public function CreateJugador(Request $request) {
    	$jugador = new Jugador();
    	$val = $jugador->Validar($request->all());
    	if ($val->fails()) {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = true;
        	$data['respesta'] = $val;
    	} else {
    		$jugador->user_id    = $request->user_id;
    		$jugador->apodo      = $request->apodo;
    		$jugador->edad 	     = $request->edad;
    		$jugador->estatura 	 = $request->estatura;
    		$jugador->peso     	 = $request->peso;
    		$jugador->posicion 	 = $request->posicion;
    		$jugador->disponible = $request->disponible;
    		$jugador->location 	 = new Point(
    			$request->lat,
    			$request->lon
    		);

    		$data['errors']   = false;
        	$data['respesta'] = $jugador;
    	}
    	return Response::json($data, $status);
    }

    public function ReadJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$data['errors']   = false;
        		$data['respesta'] = $jugador;
    		} else {
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.registro');
    		}
    	} else {
    		$jugadores = Jugador::all();

    		$data['errors'] = false;
        	$data['respesta']	= $jugadores;
    	}
   		return Response::json($data);
    }

    public function UpdateJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$jugador->user_id    = $request->user_id;
    			$jugador->apodo      = $request->apodo;
    			$jugador->edad 	     = $request->edad;
    			$jugador->estatura 	 = $request->estatura;
    			$jugador->peso     	 = $request->peso;
    			$jugador->posicion 	 = $request->posicion;
    			$jugador->disponible = $request->disponible;
    			$jugador->location 	 = new Point(
    				$request->lat,
    				$request->lon
    			);

    			$data['errors']   = false;
        		$data['respesta'] = $jugador;
    		} else {
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.reg');
    		}
    	} else {
    		$data['errors'] = false;
        	$data['respesta']	= trans('validation.required');
    	}
   		return Response::json($data);
    }

    public function DeleteJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$jugador->delete();

    			$data['errors']   = false;
        		$data['respesta'] = trans('registros.del');
    		} else {
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.reg');
    		}
    	} else {
    		$data['errors'] = false;
        	$data['respesta']	= trans('validation.required');
    	}
   		return Response::json($data);
    }
}