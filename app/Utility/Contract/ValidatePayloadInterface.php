<?php

declare(strict_types=1);

namespace App\Utility\Contract;

interface ValidatePayloadInterface
{
    public static function validate(array $payload): bool;
}
