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
    	if ($request->has('id')) {
    		$rol = Rol::find($request->id);
    		if (isset($rol->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respuesta'] = $rol;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.registro');
    		}
    	} else {
    		$roles = Rol::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respuesta']	= $roles;
    	}
   		return Response::json($data, $status);
    }

    public function RolUpdate(Request $request) {
    	if ($request->has('id')) {
    		$rol = Rol::find($request->id);
    		if (isset($rol->id)) {
    			$val = $rol->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respuesta'] = $val;
    			} else {
    				$rol->nombre      = $request->nombre;
                    $rol->save();

    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respuesta'] = $rol;
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

    public function RolDelete(Request $request) {
    	if ($request->has('id')) {
    		$rol = Rol::find($request->id);
    		if (isset($rol->id)) {
    			$rol->delete();

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
