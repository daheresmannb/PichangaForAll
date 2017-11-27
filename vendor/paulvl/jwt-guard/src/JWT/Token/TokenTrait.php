<?php

namespace Paulvl\JWTGuard\JWT\Token;

use Carbon\Carbon;
use DomainException;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Support\Facades\Cache;

trait TokenTrait
{
    public $data;
    public $encoded;
    public $status;

    public function get()
    {
        return $this->data;
    }

    public function encode($data, $key, $duration)
    {
        $data = array_merge(
            $this->getMandatoryClaims($duration),
            $data
        );

        $this->data = (object) $data;
        $this->encoded = JWT::encode($data, $key);
        $this->status = self::VALID_TOKEN;
    }

    public function encoded()
    {
        return $this->encoded;
    }

    public function status()
    {
        return $this->status;
    }

    public function validate($encoded, $key)
    {
        if (!is_null($this->status)) {
            return $this->status;
        }

        try {
            $this->encoded = $encoded;
            $this->data = JWT::decode($this->encoded, $key, array('HS256'));
            $this->status = self::VALID_TOKEN;
            $this->isBlacklisted();
        } catch (Exception $e) {
            $this->status = self::getErrorType($e);
        }
    }

    public function getMandatoryClaims($duration)
    {
        $iat = Carbon::now()->timestamp;
        $jti = uniqid(str_random(random_int(8,33)), true);

        return array(
            "jti"   => $jti,
            "iat"   => $iat,
            "nbf"   => $iat,
            "exp"   => $iat + $duration,
            //"iss" => "http://example.org",
            //"aud" => "http://example.xyz",
        );
    }

    public function getClaim($key, $default = null)
    {
        if (isset($this->data->$key)) {
            return $this->data->$key;
        }
        return $default;
    }

    public function iat()
    {
        return $this->getClaim('iat');
    }

    public function nbf()
    {
        return $this->getClaim('nbf');
    }

    public function exp()
    {
        return $this->getClaim('exp');
    }

    public function jti()
    {
        return $this->getClaim('jti');
    }

    public static function getErrorType(Exception $e)
    {
        if ($e instanceof BeforeValidException) {
            return self::BEFORE_VALID_TOKEN;
        }
        elseif ($e instanceof ExpiredException) {
            return self::EXPIRED_TOKEN;
        }
        elseif ($e instanceof SignatureInvalidException) {
            return self::SIGNATURE_INVALID_TOKEN;
        }
        elseif ($e instanceof DomainException) {
            return self::DOMAIN_INVALID_TOKEN;
        }
    }

    public function isBlacklisted()
    {
        if ($this->status() == self::BLACKLISTED_TOKEN) {
            return true;
        }

        $cachedReference = Cache::get($this->jti());

        if (!is_null($cachedReference)) {
            $this->status = self::BLACKLISTED_TOKEN;
            return true;
        }

        return false;
    }
}