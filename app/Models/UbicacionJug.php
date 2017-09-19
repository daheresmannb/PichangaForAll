<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Types\Point;

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
}
