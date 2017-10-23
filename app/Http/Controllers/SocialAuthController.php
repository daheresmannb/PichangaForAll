<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Http\Requests;

class SocialAuthController extends Controller {
    public static $redsocial = '';
    public function redirect($op) {

        switch ($op) {
        	case 'f':
        		self::$redsocial = 'facebook';
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
        	'facebook'
       	)->redirect();   
    }   

    public function callback() {
        $user = Socialite::driver('facebook')->user();
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
    }
}