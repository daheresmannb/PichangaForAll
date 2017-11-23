<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class torneos extends Model {

    protected $table = 'torneos';
    protected $fillable = [
        'id',
        'nombre_torneo',
        'id_recinto',
        'id_encargado',
        'inicio',
        'termino',
    ];

    protected $casts = [
        'id' => 'string',
        'id_recinto' => 'string',
        'id_encargado' => 'string'
    ];

    public function Validar($array){
        $validator = Validator::make(
            $array, [
                'id_encargado'       => 'required',
                'id_recinto'         => 'required',
                'nombre_torneo'    => 'required',
                'inicio'            =>'required',
                'termino'           =>'required',
            ]
        );
        return $validator;
    }

}