<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Socialite;

class SocialAuthController extends Controller {
    public function redirect(Requests $request) {
    	$redsocial = '';
        switch ($request->op) {
        	case 'f':
        		$redsocial = 'facebook';
        		break;

        	case 'g':
        		# code...
        		break;

        	case 't':
        		# code...
        		break;
        	
        	default:
        		# code...
        		break;
        }

        return Socialite::driver(
        	$redsocial
       	)->redirect();   
    }   

    public function callback() {
        // when facebook call us a with token   
    }
}