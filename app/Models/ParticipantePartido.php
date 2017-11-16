<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ParticipantePartido extends Model {

    protected $table = 'participantes_partidos'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
          'id',
          'partido_id',
          'jugador_id',
          'created_at',
          'updated_at'
      ];

      public function Validar($array){
      	$validator = Validator::make(
      		$array, [
      			'nombre'     => 'required',
                  'partido_id'     => 'required',
                  'jugador_id'    => 'required'
  			]
  		);
  		return $validator;
      }
}
