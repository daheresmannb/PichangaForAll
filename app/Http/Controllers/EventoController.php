<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Partidos;
use DB;


class EventoController extends Controller {
    
    
    public function CreatePartido(Request $request) {
    	$partido = new Partidos();
    	$val = $partido->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val;
    	} else {
    		$partido->recinto_id    = $request->recinto_id;
            $partido->save();

    		$status			   = trans('requests.success.code');
    		$data['errors']    = false;
        	$data['respuesta'] = $partido;
    	}
    	return Response::json($data, $status);
    }

    
    public function GetPartido(Request $request) {
    	if ($request->has('id')) {
    		$partido = Partidos::find($request->id);
    		if (isset($partido->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respesta'] = $partido;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.registro');
    		}
    	} else {
    		$partidos = Partidos::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respesta']	= $partidos;
    	}
   		return Response::json($data, $status);    
	}
 
 	
 	public function SetPartido(Request $request) {
    	if ($request->has('id')) {
    		$partido = Partidos::find($request->id);
    		if (isset($partido->id)) {
    			$val = $partido->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respesta'] = $val;
    			} else {
    				$partido->recinto_id      = $request->recinto_id;
                    $partido->save();

    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respesta'] = $partido;
    			}
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respesta'] = trans('validation.required');
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
        		$data['respesta'] = trans('registros.del');
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.reg');
    		}
    	} else {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = false;
        	$data['respesta'] = trans('validation.required');
    	}
   		return Response::json($data, $status);
    }

}
