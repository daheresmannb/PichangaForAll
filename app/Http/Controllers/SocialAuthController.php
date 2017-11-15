<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Events\AmigosConectadosEvent;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\SocialLogin;

class SocialAuthController extends Controller {

    public function getSocialRedirect($provider) {

        $providerKey = Config::get('services.' . $provider);
        if (empty($providerKey)) {
            return view('pages.status')
                ->with('error','No such provider');
        }
        return Socialite::driver($provider)->redirect();

    }
//Recibe el login exitoso del proveedor, crea el usuario si no existe y si existe actualiza valores, también guarda el id de usuario del proveedor.
    public function getSocialHandle($provider) {
        if (Input::get('denied') != '')
            abort(
                500,
                "No le diste permiso a nuestra aplicación para acceder a tu cuenta."
            );

        //Datos de usuario retornados por el proveedor de servicio libreria socialite
        $socialUser = Socialite::driver($provider)->user();

        //Verifica si el email ya lo tiene un usuario
        $user = User::where(
            'email',
            $socialUser->email
        )->first();

        if(empty($user)) {//Si no lo tiene crea el usuario
            $user = new User;
            $user->password = bcrypt(str_random(16));
            $user->token = str_random(64);
            $user->email = $socialUser->email;
        }
        $user->name = $socialUser->name; //Actualiza el name
        $user->save();
        //Guarda el id 0auth del proveedor de Oauth
        $sameSocialId = SocialLogin::where(
            'social_id', $socialUser->id
            )->where(
                'provider',
                $provider
        )->first();

        if (empty($sameSocialId)) {
            $socialData = new SocialLogin;
            $socialData->social_id = $socialUser->id;
            $socialData->provider= $provider;
            $user->social()->save($socialData);
        }

        auth()->login($user, true);//Autentica al usuario
        Event::fire(
					new AmigosConectadosEvent(
						Auth::user()
					)
				);
        return redirect('/index');//Redirecciona al home
    }
}
