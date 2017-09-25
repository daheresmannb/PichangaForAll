<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Response;
use App\Models\InfoUser;
use DB;


class UserController extends Controller
{
 	public function CreateInfoUser(Request $request) {
    	$infouser = new InfoUser();
    	$val = $infouser->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val;
    	} else {
    		$infouser->id_user  = $request->id_user;
    		$infouser->nombre   = $request->nombre;
    		$infouser->apellido = $request->apellido;
    		$infouser->email    = $request->email;
    		$infouser->telefono = $request->telefono;
            $infouser->save();

    		$status			   = trans('requests.success.code');
    		$data['errors']    = false;
        	$data['respuesta'] = $infouser;
    	}
    	return Response::json($data, $status);
    }
}
