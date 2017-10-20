<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Rol;
use App\Models\RelUserRol;


class RolController extends Controller {
    public function RolCreate(Request $request) {
    	$rol = new Rol();
    	$val = $rol->Validar($request->all());
    	if ($val->fails()) {
    		$status			  = trans('requests.failure.code.bad_request');
    		$data['errors']   = true;
        	$data['respuesta'] = $val->messages();
    	} else {
    		$rol->nombre    = $request->nombre;
            $rol->save();

    		$status			  = trans('requests.success.code');
    		$data['errors']   = false;
        	$data['respuesta'] = $rol;
    	}
    	return Response::json($data, $status);
    }

    public function RolRead(Request $request) {
    	# code...
    }

    public function RolUpdate(Request $request) {
    	# code...
    }

    public function RolDelete(Request $request) {
    	# code...
    }
}
