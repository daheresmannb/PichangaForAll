<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use DB;

class Jugador extends Model {
	protected $table = 'jugadores';
    protected $fillable = [
        'id',
        'user_id',
        'apodo',
        'edad',
        'estatura',
        'peso',
        'posicion',
        'disponible'
    ];

    protected $postgisFields = [
        'location'
    ];
    
    protected $postgisTypes = [
        'location' => [
            'geomtype' => 'geography',
            'srid' => 4326
        ]
    ];

    public static function getJugadoresCercanos($latitud, $longitud, $radio) {
        return DB::select(
            'SELECT id, ST_X(location::geometry) as latitud, ST_Y(location::geometry) as longitud from jugadores_cercanos(?, ?, ?)', 
            array(
                $latitud,
                $longitud,
                $radio // KM ^ 2
            )
        );
    }

    public function Validar($array){
    	$validator = Validator::make(
    		$array, [
    			'user_id' 	 => 'required',
    			'apodo' 	 => 'required',
    			'edad' 		 => 'required',
    			'estatura' 	 => 'required',
    			'peso' 		 => 'required',
    			'posicion' 	 => 'required',
    			'disponible' => 'required',
    			'lat' 		 => 'required',
    			'lon'  		 => 'required',
			]
		);
		return $validator;
    }
}