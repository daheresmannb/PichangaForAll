<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Recintos;
use App\Models\UbicacionRec;
use Phaza\LaravelPostgis\Geometries\Point;

class RecintosController extends Controller {

    public function RecintoCreate(Request $request) {
    	$recintos = new Recintos();
    	$val = $recintos->Validar($request->all());
    	if ($val->fails()) {
    		$status			   = trans('requests.failure.code.bad_request');
    		$data['errors']    = true;
        	$data['respuesta'] = $val->messages();
    	} else {
            $recintos->id_encargado    	= $request->id_encargado;
            $recintos->nombre         	= $request->nombre;
            $recintos->save();
            
            $ubicacion_rec = new UbicacionRec();
            $ubicacion_rec->recintos_id =  $recintos->id;
            $ubicacion_rec->location = new Point(
                $request->lat,
                $request->lon
            );
            
            $ubicacion_rec->save();
            $recintos->localizacion = $ubicacion_rec;

    		$status			   = trans('requests.success.code');
    		$data['errors']    = false;
        	$data['respuesta'] = $recintos;
    	}
    	return Response::json($data, $status);
    }

    public function RecintoRead(Request $request) {
        if ($request->has('id')) {
            $recinto = Recintos::find($request->id);
            if (isset($recinto->id)) {
                $status           = trans('requests.success.code');
                $data['errors']   = false;
                $data['respuesta'] = $recinto;
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $recintos = Recintos::all();
            $status           = trans('requests.success.code');
            $data['errors'] = false;
            $data['respuesta']  = $recintos;
        }
        return Response::json($data, $status);
        //return view('prices.create', compact('id', 'items'));
    }

    public function RecintoUpdate(Request $request) {
        if ($request->has('id')) {
            $recinto = Recinto::find($request->id);
            if (isset($recinto->id)) {
                $val = $recinto->Validar($request->all());
                if ($val->fails()) {
                    $status           = trans('requests.failure.code.bad_request');
                    $data['errors']   = true;
                    $data['respuesta'] = $val;
                } else {
                    $recinto->nombre      = $request->nombre;
                    $recinto->save();

                    $status           = trans('requests.success.code');
                    $data['errors']   = false;
                    $data['respuesta'] = $recinto;
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

    public function RecintoDelete(Request $request) {
        if ($request->has('id')) {
            $recinto = Recinto::find($request->id);
            if (isset($recinto->id)) {
                $recinto->delete();

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
}
