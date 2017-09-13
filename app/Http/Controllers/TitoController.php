<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests;

class TitoController extends Controller {
    public function ganjah() {
        	//$users = User::all();
     $users = User::where('rol',1)->get();

    	return \Response::json($users);
    }
}
