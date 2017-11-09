<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Torneos;
use DB;

class TorneoController extends Controller
{
    //
    public function CreateTorneo(Request $request) {
    	$torneos = new torneos();
    	$val = $torneos->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val->messages();
    	} else {

  
                        $torneos->id_recinto     = $request->id_recinto;
                        $torneos->id_encargado     = $request->id_encargado;
                        $torneos->fono_contacto    = $request->fono_contacto;
                        $torneos->save();

                        $status            = trans('requests.success.code');
                        $data['errors']    = false;
                        $data['respuesta'] = $torneos;
            

    	}
      return Response::json($data, $status);
    }
    


}
