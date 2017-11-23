<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Partidos;
use App\User;
use App\Models\ParticipantePartido;
use Illuminate\Support\Facades\Event;
use App\Events\AmigosConectadosEvent;
use DB;
/*
Alex
Acotacion: Estandarizar nombres de cada funcion
asi como estan ahora las funciones

    Create
    Read
    Update
    Delete
*/

class EventoController extends Controller {
    public function CreatePartido(Request $request) {
    	$partido = new Partidos();
    	$val = $partido->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val->messages();
    	} else {
            if ($request->numjugadores <= 20) {
                $partido->nombre_partido =$request->nombre_partido;
                $partido->nombre     = $request->nombre;
                $partido->inicio     = $request->inicio;
                $partido->termino    = $request->termino;
                $partido->recinto_id = $request->recinto_id;
                $partido->numjugadores = $request->numjugadores;
                $partido->save();

                $status            = trans('requests.success.code');
                $data['errors']    = false;
                $data['respuesta'] = $partido;
            } else {
                $status            = trans('requests.success.code');
                $data['errors']    = true;
                $data['respuesta'] = "El partido contiene muchos jugadores";
            }
    	}
        return redirect('/index')->with(
            'respuesta',
            $data
        );
    	//return Response::json($data, $status);
    }

    public function ReadPartido(Request $request) {
    	if ($request->has('id')) {
    		$partido = Partidos::find($request->id);
    		if (isset($partido->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $partido;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$partidos = Partidos::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        $data['respuesta']	= $partidos;
    	}
   		return Response::json($data, $status);
	}

 	public function UpdatePartido(Request $request) {
    	if ($request->has('id')) {
    		$partido = Partidos::find($request->id);
    		if (isset($partido->id)) {
    			$val = $partido->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respuesta'] = $val;
    			} else {
                    $partido->recinto_id    = $request->recinto_id;
                    $partido->fecha         = $request->fecha;
                    $partido->hora_i        = $request->hora_i;
                    $partido->hora_t        = $request->hora_t;
                    $partido->save();

    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respuesta'] = $partido;
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

    public function DeletePartido(Request $request) {
    	if ($request->has('id')) {
    		$partido = Partidos::find($request->id);
    		if (isset($partido->id)) {
    			$partido->delete();

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

    public function SumarsePartido(Request $request) {

    	if ($request->has('partido_id') && $request->has('jugador_id')) {
        $partido = Partidos::find($request->partido_id);
        $participante = User::find($request->jugador_id);


          if (isset($partido->id) && isset($participante->id)) {
            $addpart = new ParticipantePartido();
            $addpart->partido_id = $request->partido_id;
            $addpart->jugador_id = $request->jugador_id;
            $addpart->save();

      			$status			  = trans('requests.success.code');
      			$data['errors']   = false;
            $data['respuesta'] = $addpart;
      		} else {
      			$status			  = trans('requests.failure.code.not_founded');
      			$data['errors']   = true;
          	$data['respuesta'] = trans('registros.reg');
      		}
    		
    	} else {
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        $data['respuesta']	= "Datos requeridos";
    	}
   		return Response::json($data, $status);
	}
}
