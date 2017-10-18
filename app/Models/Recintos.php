<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use DB;


class Recintos extends Model{

    protected $table = 'recintos';
    protected $fillable = [
        'id',
        'id_encargado',
        'nombre',
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
        $validator = Validator::make(
            $array, [
                'id_encargado'  => 'required',
                'nombre'    	=> 'required',
                'lat'        	=> 'required',
                'lon'        	=> 'required',
            ]
        );
        return $validator;
    }
}