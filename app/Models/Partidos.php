<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model {
    /*
    En el caso de los partidos hay que retornar 
    los campos created_at y updated_at, xq contienen
    los datos de hora y fecha en que se realizaran
    */
	protected $table = 'partido';
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