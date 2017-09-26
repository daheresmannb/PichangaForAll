<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Response;
use App\Models\InfoUser;
use App\Models\User;
use DB;


<<<<<<< HEAD
class UserController extends Controller {
=======
	

class UserController extends Controller
{
>>>>>>> 445fe12deff8e3bd1ad92485245fe74e4197df02
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

    public function ReadInfoUser(Request $request) {
    	if ($request->has('id')) {
    		$infouser = InfoUser::find($request->id);
    		if (isset($infouser->id)) {
    			$status			  = trans('requests.success.code');
    			$data['errors']   = false;
        		$data['respesta'] = $infouser;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respesta'] = trans('registros.registro');
    		}
    	} else {
    		$partidos = InfoUser::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respesta']	= $partidos;
    	}
   		return Response::json($data, $status);    
	}

	public function UpdateInfoUser(Request $request) { 
    	
    	if ($request->has('id')) {
    		$infouser = InfoUser::find($request->id);
    		if (isset($infouser->id)) {
    			$val = $infouser->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respesta'] = $val;
    			} else {
    				$infouser->id_user  = $request->id_user;
		    		$infouser->nombre   = $request->nombre;
		    		$infouser->apellido = $request->apellido;
		    		$infouser->email    = $request->email;
		    		$infouser->telefono = $request->telefono;
		            $infouser->save();


    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respesta'] = $infouser;
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

    public function DeleteInfoUser(Request $request) {
    	if ($request->has('id')) {
    		$infouser = InfoUser::find($request->id);
    		if (isset($infouser->id)) {
    			$infouser->delete();

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
