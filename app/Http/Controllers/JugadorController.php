<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Jugador;
use App\Models\UbicacionJug;
use DB;

class JugadorController extends Controller {
    public function CreateJugador(Request $request) {
    	$jugador = new Jugador();
    	$val = $jugador->Validar($request->all());
    	if ($val->fails()) {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = true;
        	$data['respuesta'] = $val->messages();
    	} else {
    		$jugador->user_id    = $request->user_id;
    		$jugador->apodo      = $request->apodo;
    		$jugador->edad 	     = $request->edad;
    		$jugador->estatura 	 = $request->estatura;
    		$jugador->peso     	 = $request->peso;
    		$jugador->posicion 	 = $request->posicion;
    		$jugador->disponible = $request->disponible;
            $jugador->save();

            $ubicacion_jug = new UbicacionJug();
            $ubicacion_jug->jugador_id = $jugador->id;
    		$ubicacion_jug->location = new Point(
    			$request->lat,
    			$request->lon
    		);
            $ubicacion_jug->save();

    		$status			  = trans('requests.success.code');
    		$data['errors']   = false;
        	$data['respuesta'] = $jugador;
            $data['respuesta2'] = $ubicacion_jug;
    	}
    	return Response::json($data, $status);
    }

    public function ReadJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $jugador;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.registro');
    		}
    	} else {
    		$jugadores = Jugador::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respuesta']	= $jugadores;
    	}
   		return Response::json($data, $status);
    }

    public function UpdateJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$val = $jugador->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respuesta'] = $val;
    			} else {
    				$jugador->apodo      = $request->apodo;
    				$jugador->edad 	     = $request->edad;
    				$jugador->estatura 	 = $request->estatura;
    				$jugador->peso     	 = $request->peso;
    				$jugador->posicion 	 = $request->posicion;
    				$jugador->disponible = $request->disponible;
                    $jugador->save();

    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respuesta'] = $jugador;
    			}
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respuesta'] = trans('validation.required');
    	}
   		return Response::json($data, $status);
    }

    public function DeleteJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$jugador->delete();

    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = trans('registros.del');
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respuesta'] = trans('validation.required');
    	}
   		return Response::json($data, $status);
    }

//////////////////////////////////////////////////////////////////////////

    public function CreateUbicacionJugador(Request $request) {
        # code...
    }

    public function setEstadoJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$jugador->disponible = $request->disponible;
                $jugador->save();

    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $jugador;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respuesta'] = trans('validation.required');
    	}
   		return Response::json($data, $status);
    }

    public function setLocationJugador(Request $request) {
    	if ($request->has('id')) {
    		$jugador = Jugador::find($request->id);
    		if (isset($jugador->id)) {
    			$jugador->location 	 = new Point(
    				$request->lat,
    				$request->lon
    			);
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $jugador;
    		} else {
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respuesta'] = trans('validation.required');
    	}
   		return Response::json($data, $status);
    }

    public function getJugadoresCercanos(Request $request) {
        $jugadores = UbicacionJug::getJugadoresCercanos(
            $request->latitud,//-38.738806,
            $request->longitud,//-72.597354,
            $request->radio // radio en km^2
        );

        foreach ($jugadores as $jugador) {
            $ub = UbicacionJug::find($jugador->id);
            $jugador->jugador_id = $ub->jugador_id;
        }
      
        $data['errors']   = false;
        $data['respuesta'] = $jugadores;

        return Response::json($data);
    }
}