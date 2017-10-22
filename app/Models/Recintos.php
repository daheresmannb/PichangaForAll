<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Recintos extends Model {

    protected $table = 'recintos';
    protected $fillable = [
        'id',
        'id_encargado',
        'nombre',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'id_encargado' => 'string'
    ];

    public function Validar($array){
        $validator = Validator::make(
            $array, [
                'id_encargado'  => 'required',
                'nombre'    	=> 'required',
                'lat'        	=> 'required',
                'lon'        	=> 'required',
            ]
        );
        return $validator;
    }
}