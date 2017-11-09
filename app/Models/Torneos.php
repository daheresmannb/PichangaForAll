<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class torneos extends Model {

    protected $table = 'torneos';
    protected $fillable = [
        'id',
        'id_recinto',
        'id_encargado',
        'fono_contacto'
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
                'fono_contacto'      => 'required',
            ]
        );
        return $validator;
    }

}