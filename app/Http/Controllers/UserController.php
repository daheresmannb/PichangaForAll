<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Response;
use App\Models\InfoUser;
use App\Models\User;
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

    public function CreateUsers(Request $request) {
        $user = new User();
        $val = $user->Validar($request->all());
        
        if ($val->fails()) {
            $status            = trans('requests.failure.code.bad_request');
            $data['errors']    = true;
            $data['respuesta'] = $val->messages();
        } else { 
            
            if (strcmp($request->password , $request->password2)== 0) {
                        $user->name     = $request->name;
                        $user->email    = $request->email;
                        $user->password = $request->password;
                    $user->save();

            $status            = trans('requests.success.code');
            $data['errors']    = false;
            $data['respuesta'] = 'ingreso';

            }else {
                $status            = trans('requests.success.code');
            $data['errors']    = true;
            $data['respuesta'] = 'error_v';
            }
        }
        return Response::json($data, $status);
    }
}
