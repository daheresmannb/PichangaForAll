## JWT-Guard

JWT-Guard is a Laravel package that allow authentication and authorization as a guard driver using JWT tokens.

[![Latest Stable Version](https://poser.pugx.org/paulvl/jwt-guard/v/stable)](https://packagist.org/packages/paulvl/jwt-guard) [![Latest Unstable Version](https://poser.pugx.org/paulvl/jwt-guard/v/unstable)](https://packagist.org/packages/paulvl/jwt-guard) [![License](https://poser.pugx.org/paulvl/jwt-guard/license)](https://packagist.org/packages/paulvl/jwt-guard) [![Total Downloads](https://poser.pugx.org/paulvl/jwt-guard/downloads)](https://packagist.org/packages/paulvl/jwt-guard)

## **Quick Installation**

Begin by installing this package through Composer.

You can run:

    composer require paulvl/jwt-guard 1.*

Or edit your project's composer.json file to require paulvl/jwt-guard.
```
    "require": {
        "paulvl/jwt-guard": "1.*"
    }
```
Next, update Composer from the Terminal:

    composer update

Once the package's installation completes, the final step is to add the service provider. Open `config/app.php`, and add a new item to the providers array:

```
Paulvl\JWTGuard\Auth\AuthServiceProvider::class,
```

Finally publish package's configuration file:

    php artisan vendor:publish --provider="Paulvl\JWTGuard\Auth\AuthServiceProvider"

Then the file `config/jwt.php` will be created.

## **JWT Guard**

### **JWT driver setup!**

To start using JWT drive you need to create anew guard on `config/auth.php` file:
```
...
'guards' => [
        ...
        'jwt' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
        ...
    ],
...
```
You can use any `Eloquent` provider that you want.

### **Using JWT Guard**

####**attempt**

```
    // Assuming you retrieve your credentials from request
    $credentials = [
        'email' => 'test@example.com',
        'password' => 'password'
    ];
    //this will return a token array
    return Auth::guard('jwt')->attempt($credentials);
```


#### **blacklistToken**

```
    //this will blacklist current jwt-token and referenced refresh token if exists
    return Auth::guard('jwt')->blacklistToken();
```

### **Using Valid JWT Middleware**

if you need to validate Authentication using JWT token request just add `Paulvl\JWTGuard\Auth\Middleware\ValidJwt::class` to `routeMiddleware` on `Http/Kernel.php` file:

```
protected $routeMiddleware = [
    ...
    'valid-jwt' => \Paulvl\JWTGuard\Auth\Middleware\ValidJwt::class,
    ...
];
```

then if you need to verify a valid jwt-token

```
Route::middleware('valid-jwt:api_token')->get('/your-route', function (Request $request) {
    // any thing tha you need to protect
});
```

or if you need to verify a valid refresh-token

```
Route::middleware('valid-jwt:refresh_token')->get('/your-route', function (Request $request) {
    // your refresh action for example
});
```

### **Using Prebuild Controller**

JWT-Guard includes a prebuild controller that will handle Login, Token Refreshing and Blacklisting for you. Just add this to your routes file:

```
Route::post('/jwt/login', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@login')->name('jwt.login');

Route::post('/jwt/refresh', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@refresh')->name('jwt.refresh');

Route::post('/jwt/blacklist', '\Paulvl\JWTGuard\Http\Controllers\Auth\LoginController@blacklist')->name('jwt.blacklist');
```

## **Contribute and share ;-)**
If you like this little piece of code share it with you friends and feel free to contribute with any improvements.
