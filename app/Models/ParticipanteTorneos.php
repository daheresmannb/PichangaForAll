<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ParticipanteTorneos extends Model {

    protected $table = 'participantes_torneos'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
          'id',
          'torneo_id',
          'jugador_id',
          'created_at',
          'updated_at'
      ];

      public function Validar($array){
      	$validator = Validator::make(
      		$array, [
      			      'nombre'     => 'required',
                  'torneo_id'     => 'required',
                  'jugador_id'    => 'required'
  			]
  		);
  		return $validator;
      }
}
