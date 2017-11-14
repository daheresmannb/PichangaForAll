<?php
namespace App\Http\Controllers;

use App\Events\AmigosConectadosEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

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
				$data['token'] = $token;

				Event::fire(
					new AmigosConectadosEvent(
						Auth::user()->id
					)
				);

				$data['respuesta'] = "Bienvenido!!!!!";

				return redirect('/index')->with(
					'respuesta',
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