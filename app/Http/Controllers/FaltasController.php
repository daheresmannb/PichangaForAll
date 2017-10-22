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
}