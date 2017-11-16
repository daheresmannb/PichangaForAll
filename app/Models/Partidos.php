<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model {
	protected $table = 'partidos'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
        'id',
        'nombre',
        'inicio',
        'termino',
        'recinto_id',
        'numjugadores',
        'created_at',
        'updated_at'
    ];

		protected $casts = [
        'id' => 'string'
    ];

    public function Validar($array){
    	$validator = Validator::make(
    		$array, [
    			'nombre'     => 'required',
                'inicio'     => 'required',
                'termino'    => 'required',
                'recinto_id'    => 'required',
                'numjugadores'  => 'required'
			]
		);
		return $validator;
    }
}
