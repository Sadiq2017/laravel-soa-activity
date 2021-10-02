<?php

declare(strict_types=1);

namespace App\Utility;

use App\Utility\Contract\ValidatePayloadInterface;

class ValidationPayload implements ValidatePayloadInterface
{

    public static function validate(array $payload): bool
    {
        $access_key = $payload['access_key'];

        $expire_time = $payload['exp'];

        return ($access_key == config('services.page_tracker.access_key') && $expire_time > time());
    }
}
