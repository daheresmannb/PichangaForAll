<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model {
	protected $table = 'roles'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
        'id',
        'nombre',
        'created_at',
        'updated_at'
    ];

    public function Validar($array){
    	$validator = Validator::make(
    		$array, [
    			'nombre' => 'required',
			]
		);
		return $validator;
    }
}