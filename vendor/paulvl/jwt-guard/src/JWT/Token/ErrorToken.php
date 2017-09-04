<?php

namespace Paulvl\JWTGuard\JWT\Token;


class ErrorToken implements TokenInterface
{
    public $status;

    public function __construct($data, $key, $duration = null)
    {

    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function status()
    {
        return $this->status;
    }

    public function get()
    {
        return (object) [];
    }

    public function encode($data, $key, $duration)
    {
        return null;
    }

    public function encoded()
    {
        return null;
    }

    public function validate($encoded, $key)
    {
        return $this->status;
    }

    public function getMandatoryClaims($duration)
    {
        return [];
    }

    public function getClaim($key, $default = null)
    {
        return null;
    }

    public function iat()
    {
        return null;
    }

    public function nbf()
    {
        return null;
    }

    public function exp()
    {
        return null;
    }

    public function jti()
    {
        return null;
    }

    public function blacklist()
    {
        //
    }

    public function isBlacklisted()
    {
        return true;
    }
}