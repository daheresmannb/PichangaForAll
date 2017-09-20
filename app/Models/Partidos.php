<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model {
	protected $table = 'partido';
    protected $fillable = [
        'id',
        'recinto_id'
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