<?php



namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Types\Point;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

protected $table = 'users';
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

    public $incrementing = false;


        public function Validar($array){
        $validator = Validator::make(
            $array, [
                'name'       => 'required',
                'email'      => 'required',
                'password'   => 'required',
                'rol'  => 'required',
                'password2' => 'required',
            ]
        );
        return $validator;
    }
}

