<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Falta;

class FaltasController extends Controller {
    public function FaltaCreate(Request $request) {
    	$falta = new Falta();
    	$val = $falta->Validar($request->all());
    	if ($val->fails()) {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = true;
        	$data['respuesta'] = $val->messages();
    	} else {
    		$falta->jugador_id    = $request->jugador_id;
            $falta->save();

    		$status			  = trans('requests.success.code');
    		$data['errors']   = false;
        	$data['respuesta'] = $falta;
    	}
    	return Response::json($data, $status);
    }

	public function FaltaRead(Request $request) {
    	if ($request->has('id')) {
    		$falta = Falta::find($request->id);
    		if (isset($falta->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $falta;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$roles = Falta::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respuesta']	= $roles;
    	}
   		return Response::json($data, $status);
    }

	public function FaltaUpdate(Request $request) {
    	if ($request->has('id') && $request->has('jugador_id')) {
    		$falta = Falta::find($request->id);
    		if (isset($falta->id)) {
    			$falta->jugador_id = $request->jugador_id;
                $falta->save();

    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $falta;
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

    public function FaltaDelete(Request $request) {
    	if ($request->has('id')) {
    		$falta = Falta::find($request->id);
    		if (isset($falta->id)) {
    			$falta->delete();

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
}