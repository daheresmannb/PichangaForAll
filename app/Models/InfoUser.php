<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model {

    protected $table = 'info_user';
    protected $fillable = [
        'id',
        'id_user',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'id_user' => 'string'
    ];

    public function Validar($array){
        $validator = Validator::make(
            $array, [
                'id_user'   => 'required',
                'nombre'    => 'required',
                'apellido'  => 'required',
                'email'     => 'required',
                'telefono'  => 'required',
            ]
        );
        return $validator;
    }
}