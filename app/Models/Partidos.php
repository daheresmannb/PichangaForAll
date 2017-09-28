<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model {

	protected $table = 'partido'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
        'id',
        'recinto_id',
        'created_at',
        'updated_at'
    ];


    public function Validar($array){
    	$validator = Validator::make(
    		$array, [
    			'recinto_id'  => 'required',
			]
		);
		return $validator;
    }
}