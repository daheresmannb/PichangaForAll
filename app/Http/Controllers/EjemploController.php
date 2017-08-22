<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

use App\Http\Requests;

class EjemploController extends Controller {
    
    public function ejemplo(Request $request) {

    	$users = Users::all();

    	return \Response::json($users);
    }
}




