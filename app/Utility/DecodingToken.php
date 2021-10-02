<?php

declare(strict_types=1);

namespace App\Utility;

use App\Utility\Contract\DecodingTokenInterface;
use ReallySimpleJWT\{Decode,Jwt,Parse};

class DecodingToken implements DecodingTokenInterface
{

    public static function getPayload(string $token): array
    {
        $secret = config('services.page_tracker.secret_key');

        $jwt = new Jwt($token, $secret);

        $parse = new Parse($jwt, new Decode());

        $parsed = $parse->parse();

        return $parsed->getPayload();
    }
}
