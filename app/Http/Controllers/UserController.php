<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Response;
use App\Models\InfoUser;
use App\User;
use Activity;

class UserController extends Controller {

 	public function CreateInfoUser(Request $request) {
    	$infouser = new InfoUser();
    	$val = $infouser->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val->messages();
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
        		$data['respuesta'] = $infouser;
    		} else {
    			$status			  = trans('requests.failure.code.not_founded');
    			$data['errors']   = true;
        		$data['respuesta'] = trans('registros.reg');
    		}
    	} else {
    		$partidos = InfoUser::all();
    		$status			  = trans('requests.success.code');
    		$data['errors'] = false;
        	$data['respuesta']	= $partidos;
    	}
   		return Response::json($data, $status);
	}

    public function UpdateInfoUser(Request $request) {
    	if ($request->has('id_user')) {
    		$infouser = InfoUser::where('id_user',"".$request->id_user)->first();
    		if (isset($infouser->id)) {
    			$val = $infouser->Validar($request->all());
    			if ($val->fails()) {
    				$status			  = trans('requests.failure.code.bad_request');
    				$data['errors']   = true;
        			$data['respuesta'] = $val->messages();
    			} else {
		    		$infouser->nombre   = $request->nombre;
		    		$infouser->apellido = $request->apellido;
		    		$infouser->email    = $request->email;
		    		$infouser->telefono = $request->telefono;
		            $infouser->save();


    				$status			  = trans('requests.success.code');
    				$data['errors']   = false;
        			$data['respuesta'] = $infouser;
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
   		    return redirect('/home')->with(
                'respuesta',
                $data
            );
    }
    public function DeleteInfoUser(Request $request) {
    	if ($request->has('id')) {
    		$infouser = InfoUser::find($request->id);
    		if (isset($infouser->id)) {
    			$infouser->delete();

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
///////////////////////  CRUD USER //////////////////////////
    public function CreateUsers(Request $request) {
        $user = new User();
        $val = $user->Validar($request->all());
        if ($val->fails()) {
            $status            = trans('requests.failure.code.bad_request');
            $data['errors']    = true;
            $data['respuesta'] = $val->messages();
        } elseif (strcmp($request->password , $request->password2) == 0) {
            if(!isset(User::where('email', $request->email)->first()->id)) {
                $user->name     = $request->name;
                $user->email    = $request->email;
                $user->password = $request->password;
                $user->rol      = 1;
                $user->save();

                $status            = trans('requests.success.code');
                $data['errors']    = false;
                $data['respuesta'] = $user;
            } else {
                $status            = trans('requests.failure.code.bad_request');
                $data['errors']    = true;
                $data['respuesta'] = "El correo ya se encuentra en uso";
            }
        } else {
            $status            = trans('requests.success.code');
            $data['errors']    = true;
            $data['respuesta'] = 'La confimacion de contraseña no coincide';
        }
        return redirect('/registro')->with(
            'respuesta',
            $data
        );
    }

    public function ReadUser(Request $request) {
        if ($request->has('id')) {
            $user = User::find($request->id);
            if (isset($user->id)) {
                $status           = trans('requests.success.code');
                $data['errors']   = false;
                $data['respuesta'] = $user;
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $partidos = User::all();
            $status           = trans('requests.success.code');
            $data['errors'] = false;
            $data['respuesta']   = $partidos;
        }
        return Response::json($data, $status);
    }

    public function UpdateUser(Request $request) {

        if ($request->has('id')) {
            $user = User::find($request->id);
            if (isset($user->id)) {
                $val = $user->Validar($request->all());
                if ($val->fails()) {
                    $status           = trans('requests.failure.code.bad_request');
                    $data['errors']   = true;
                    $data['respuesta'] = $val;
                } else {
                    if (strcmp($request->password , $request->password2)== 0) {
                        $user->name     = $request->name;
                        $user->email    = $request->email;
                        $user->password = $request->password;
                        $user->rol = $request->rol;
                        $user->save();

                        $status           = trans('requests.success.code');
                        $data['errors']   = false;
                        $data['respuesta'] = $user;
                    }
                }
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $status           = trans('requests.failure.code.bad_request');
            $data['errors']   = false;
            $data['respuesta'] = trans('validation.required');
        }
        return Response::json($data, $status);
    }

    public function DeleteUser(Request $request) {
        if ($request->has('id')) {
            $user = User::find($request->id);
            if (isset($user->id)) {
                $user->delete();

                $status           = trans('requests.success.code');
                $data['errors']   = false;
                $data['respuesta'] = trans('registros.del');
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $status           = trans('requests.failure.code.bad_request');
            $data['errors']   = false;
            $data['respuesta'] = trans('validation.required');
        }
        return Response::json($data, $status);
    }

    public function getUsersOnline(Request $request) {
        $usuarios = Activity::users(10)->get();
        foreach ($usuarios as $usuario) {
            $inf = InfoUser::where(
                'id_user',
                $usuario->user_id
            )->first();
            $usuario->info = $inf;
        }
        $data['respuesta'] = $usuarios;
        return Response::json($data);
    }

    public function AddFriend(Request $request) {
      if ($request->has('id') && $request->has('amigo_id')) {
          $user = User::find($request->id);
          $amigo = User::find($request->amigo_id);

          if (isset($user->id) && isset($amigo->id)) {
              $status           = trans('requests.success.code');
              $data['errors']   = false;
              $data['respuesta'] = $user->befriend($amigo);
          } else {
              $status           = trans('requests.failure.code.not_founded');
              $data['errors']   = true;
              $data['respuesta'] = trans('registros.reg');
          }
      } else {
        $status           = trans('requests.failure.code.bad_request');
        $data['errors']   = false;
        $data['respuesta'] = trans('validation.required');
      }
      return Response::json($data, $status);
    }

    public function DeleteFriend(Request $request) {
      if ($request->has('id') && $request->has('amigo_id')) {
          $user = User::find($request->id);
          $amigo = User::find($request->amigo_id);

          if (isset($user->id) && isset($amigo->id)) {
              $status           = trans('requests.success.code');
              $data['errors']   = false;
              $data['respuesta'] = $user->unfriend($amigo);
          } else {
              $status           = trans('requests.failure.code.not_founded');
              $data['errors']   = true;
              $data['respuesta'] = trans('registros.reg');
          }
      } else {
        $status           = trans('requests.failure.code.bad_request');
        $data['errors']   = false;
        $data['respuesta'] = trans('validation.required');
      }
      return Response::json($data, $status);
    }

    public function DenySolFriend(Request $request) {
      if ($request->has('id') && $request->has('amigo_id')) {
          $user = User::find($request->id);
          $amigo = User::find($request->amigo_id);

          if (isset($user->id) && isset($amigo->id)) {
              $status           = trans('requests.success.code');
              $data['errors']   = false;
              $data['respuesta'] = $user->denyFriendRequest($amigo);
          } else {
              $status           = trans('requests.failure.code.not_founded');
              $data['errors']   = true;
              $data['respuesta'] = trans('registros.reg');
          }
      } else {
        $status           = trans('requests.failure.code.bad_request');
        $data['errors']   = false;
        $data['respuesta'] = trans('validation.required');
      }
      return Response::json($data, $status);
    }

    public function GetFriends(Request $request) {
      if ($request->has('id')) {
          $user = User::find($request->id);

          if (isset($user->id)) {
              $status           = trans('requests.success.code');
              $data['errors']   = false;
              $data['respuesta'] = $user->getAcceptedFriendships();
          } else {
              $status           = trans('requests.failure.code.not_founded');
              $data['errors']   = true;
              $data['respuesta'] = trans('registros.reg');
          }
      } else {
        $status           = trans('requests.failure.code.bad_request');
        $data['errors']   = false;
        $data['respuesta'] = trans('validation.required');
      }
      return Response::json($data, $status);
    }

    public function SolicitudesPendientes(Request $request) {
      if ($request->has('id')) {
          $user = User::find($request->id);

          if (isset($user->id)) {
              $sols = $user->getFriendRequests();

              foreach ($sols as $sol) {
                  $user = User::find($sol->sender_id);
                  $sol->user = $user;
              }

              $status           = trans('requests.success.code');
              $data['errors']   = false;
              $data['respuesta'] = $sols;
          } else {
              $status           = trans('requests.failure.code.not_founded');
              $data['errors']   = true;
              $data['respuesta'] = trans('registros.reg');
          }
      } else {
        $status           = trans('requests.failure.code.bad_request');
        $data['errors']   = false;
        $data['respuesta'] = trans('validation.required');
      }
      return Response::json($data, $status);
    }

    public function AceptarSolicitud(Request $request) {
        if ($request->has('id') && $request->has('amigo_id')) {
            $user = User::find($request->id);
            $amigo = User::find($request->amigo_id);

            if (isset($user->id) && isset($amigo->id)) {
                $status           = trans('requests.success.code');
                $data['errors']   = false;
                $data['respuesta'] = $user->acceptFriendRequest($amigo);
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $status           = trans('requests.failure.code.bad_request');
            $data['errors']   = false;
            $data['respuesta'] = trans('validation.required');
        }
        return Response::json($data, $status);
    }
}
