<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;

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
		'id' => 'string',
	];

	public function Rol() {
		return $this->hasOne('App\Models\Rol');
	}

	public function social() {
		return $this->hasMany(SocialLogin::class);
	}

	public function setPasswordAttribute($value) {
		if (!empty($value)) {
			$this->attributes['password'] = bcrypt($value);
		}
	}
	public function Validar($array) {
		$validator = Validator::make(
			$array, [
				'name' => 'required',
				'email' => 'required',
				'password' => 'required',
				'password2' => 'required',
			]
		);
		return $validator;
	}
}