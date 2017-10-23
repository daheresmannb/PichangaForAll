<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model {
	protected $table = 'faltas'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
        'id',
        'jugador_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string',
        'jugador_id' => 'string'
    ];

    public function Validar($array){
    	$validator = Validator::make(
    		$array, [
    			'jugador_id' => 'required',
			]
		);
		return $validator;
    }
}