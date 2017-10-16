<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Recintos;
use App\Models\UbicacionRec;
use DB;
use Phaza\LaravelPostgis\Geometries\Point;




class RecintosController extends Controller{

    public function CreateRecintos(Request $request) {
       
    	$recintos = new Recintos();
    	$val = $recintos->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val;
    	} else {
            $recintos->id_encargado    	= $request->id_encargado;
            $recintos->nombre         	= $request->nombre;
            $recintos->save();

            dd($recintos);
            
            $ubicacion_rec = new UbicacionRec();
            $ubicacion_rec->recintos_id =  $recintos->id;
            $ubicacion_rec->location = new Point(
                $request->lat,
                $request->lon
            );
            $ubicacion_rec->save();

    		$status			   = trans('requests.success.code');
    		$data['errors']    = false;
        	$data['respuesta'] = $recintos;
        	$data['respuestaub'] = $ubicacion_rec;
    	}
    	return Response::json($data, $status);
    }
}
