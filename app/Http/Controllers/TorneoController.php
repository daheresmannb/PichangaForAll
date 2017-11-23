<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Response;
use App\Http\Requests;
use App\Models\Torneos;
use App\Models\ParticipanteTorneos;
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
                        $torneos->id_encargado   = $request->id_encargado;
                        $torneos->inicio         = $request->inicio;
                        $torneos->termino        = $request->termino;
                        $torneos->save();

                        $status            = trans('requests.success.code');
                        $data['errors']    = false;
                        $data['respuesta'] = $torneos;
            

    	}
      return Response::json($data, $status);
    }

    public function ReadTorneo(Request $request) {
        if ($request->has('id')) {
            $torneos = torneos::find($request->id);
            if (isset($torneos->id)) {
                $status           = trans('requests.success.code');
                $data['errors']   = false;
                $data['respuesta'] = $torneos;

                return Response::json($data, $status);   
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
                $data['respuesta'] = trans('registros.reg');
            }
        } else {
            $torneos = torneos::all();
            $status           = trans('requests.success.code');
            $data['errors'] = false;
            $data['respuesta']   = $torneos;

            return view('userjugador.creacampeonato')->with(
                'torneos',
                $data
            );
        } 
    }

    public function SumarseTorneo(Request $request) {

        if ($request->has('partido_id') && $request->has('jugador_id')) {
        $torneo = Partidos::find($request->torneo_id);
        $participante = User::find($request->jugador_id);


          if (isset($torneo->id) && isset($participante->id)) {
            $addpart = new ParticipantePartido();
            $addpart->torneo_id = $request->torneo_id;
            $addpart->jugador_id = $request->jugador_id;
            $addpart->save();

                $status           = trans('requests.success.code');
                $data['errors']   = false;
            $data['respuesta'] = $addpart;
            } else {
                $status           = trans('requests.failure.code.not_founded');
                $data['errors']   = true;
            $data['respuesta'] = trans('registros.reg');
            }
            
        } else {
            $status           = trans('requests.success.code');
            $data['errors'] = false;
        $data['respuesta']  = "Datos requeridos";
        }
        return Response::json($data, $status);
    }
    


}
