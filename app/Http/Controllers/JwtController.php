<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Event;
use App\Events\AmigosConectadosEvent;
use Response;
use Illuminate\Support\Facades\Session;
use Activity;

class JwtController extends Controller {
	public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if (isset($user->id)) {
        	if (!$token = Auth::attempt($credentials)) {
        		$data['msg'] = trans('auth.failed');
                return redirect('/login')->with(
                    'respuesta', 
                    $data
                );
        	} else {
                $data['errors'] = Auth::user();
        		$data['token']	 = $token;

                Event::fire(
                    new AmigosConectadosEvent(
                        Auth::user()->id
                    )
                );

                
                
                return redirect('/home')->with(
                    'data', 
                    $data
                );
        	}
        } else {
        	$data['msg'] = trans('validation.required');
        	
            return redirect('/login')->with(
                'respuesta', 
                $data
            );
        }
    }

    public function logout(Request $request) {
       Auth::logout();
       return redirect('/');
	}    
}