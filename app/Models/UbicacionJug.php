<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class UbicacionJug extends Model {
    protected $table = 'ubicacion_jugador';

    protected $fillable = [
        'id',
        'jugador_id'
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

    public function jugador() {
        return $this->hasOne('App\Models\Jugador');
    }

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

    public function Validar2($array){
        $validator = Validator::make(
            $array, [
                'latitud'  => 'required',
                'longitud' => 'required',
                'radio'    => 'required',
            ]
        );
        return $validator;
    }
}
