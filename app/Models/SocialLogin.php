<?php

namespace App\Models;

use App\Entities\BaseEntity;
use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialLogin{
    protected $table = 'social_logins';

    public function user() {
        return $this->belongsTo(User::class);
    }
}