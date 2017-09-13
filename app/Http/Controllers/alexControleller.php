<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Response;
use App\Http\Requests;

class alex extends Controller {
    
    public function saluda(Request $request) {
    	$users = $request->nombre;
    	return Response::json($users);
    }
}

