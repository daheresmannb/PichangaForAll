<?php

namespace App;

use Ghanem\Friendship\Contracts\Friendable;
use Ghanem\Friendship\Traits\Friendable as FriendableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable {
	use FriendableTrait;
	use Messagable;

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
