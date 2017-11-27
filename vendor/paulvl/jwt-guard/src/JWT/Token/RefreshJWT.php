<?php

namespace Paulvl\JWTGuard\JWT\Token;


use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class RefreshJWT implements TokenInterface
{
    use TokenTrait;

    public function __construct($data, $key, $duration = null)
    {
        if (is_array($data)) {
            $this->encode($data, $key, $duration);
        } else {
            $this->validate($data, $key);
        }
    }

    public function rtt()
    {
        return $this->getClaim('rtt');
    }

    public function blacklist()
    {
        if (!$this->isBlacklisted()) {
            $expiresAt = Carbon::createFromTimestamp($this->get()->exp);
            Cache::put($this->jti(), $this->jti(), $expiresAt);
            if (is_null(Cache::get($this->rtt()))) {
                $referenceTokenExpiresAt = Carbon::createFromTimestamp($this->nbf());
                Cache::put($this->rtt(), $this->rtt(), $referenceTokenExpiresAt);
            }
            $this->status = self::BLACKLISTED_TOKEN;
        }
    }
}