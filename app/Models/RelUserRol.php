<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelUserRol extends Model {
    protected $table = 'rel_user_rol'; // NOMBRE DE LA TABLA!!!!!!!
    protected $fillable = [
        'id',
        'user_id',
        'rol_id',
        'created_at',
        'updated_at'
    ];

	public function Rol() {
        return $this->hasOne('App\Rol', 'rol_id'); // Le indicamos que se va relacionar con el atributo id
    }

   	public function Rol() {
        return $this->hasOne('App\User', 'user_id'); // Le indicamos que se va relacionar con el atributo id
    }
}