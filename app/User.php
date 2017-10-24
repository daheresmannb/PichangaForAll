<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $table = 'users';
    public $incrementing = false;

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'rol',
        'password2',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function Rol() {
        return $this->hasOne('App\Models\Rol');
    }

    public function social() {
        return $this->hasMany(SocialLogin::class); 
    }
 
    public function Validar($array) {
        $validator = Validator::make(
            $array, [
                'name'       => 'required',
                'email'      => 'required',
                'password'   => 'required',
                'password2' => 'required',
            ]
        );
        return $validator;
    }
}