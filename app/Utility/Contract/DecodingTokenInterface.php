<?php

declare(strict_types=1);

namespace App\Utility\Contract;


interface DecodingTokenInterface
{
    public static function getPayload(string $token): array;
}
