<?php

namespace Paulvl\JWTGuard\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Paulvl\JWTGuard\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use ValidatesRequests, AuthenticatesUsers;

    /**
     * JSON Web Token Guard.
     *
     * @var string
     */
    protected $guard = 'jwt';
    
}
