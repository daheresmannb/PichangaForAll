<?php

namespace Paulvl\JWTGuard\JWT\Token;


interface TokenInterface
{
    const EXPIRED_TOKEN = 'jwt-expired-token';
    const BEFORE_VALID_TOKEN = 'jwt-before-valid-token';
    const SIGNATURE_INVALID_TOKEN = 'jwt-signature-invalid-token';
    const DOMAIN_INVALID_TOKEN = 'jwt-domain-invalid-token';
    const VALID_TOKEN = 'jwt-valid-token';
    const BLACKLISTED_TOKEN = 'jwt-blacklisted-token';

    public function __construct($data, $key, $duration = null);

    public function get();

    public function encode($data, $key, $duration);

    public function encoded();

    public function status();

    public function validate($encoded, $key);

    public function getMandatoryClaims($duration);

    public function getClaim($key, $default =  null);

    public function iat();

    public function nbf();

    public function exp();

    public function jti();

    public function blacklist();

    public function isBlacklisted();

}