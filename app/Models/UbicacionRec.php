<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UbicacionRec extends Model
{

    protected $table = 'ubicacion_recintos';
    protected $fillable = [
        'id',
        'recintos_id',
        'created_at',
        'updated_at'
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

    public function Validar($array){
        $validator = ValidatorUb::make(
            $array, [
                'recintos_id'  => 'required',
                'lat'        	=> 'required',
                'lon'        	=> 'required',
            ]
        );
        return $validator;
    }
}
