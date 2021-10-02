<?php


namespace App\Services;


class JsonRpcResponse
{
    const JSON_RPC_VERSION = '2.0';

    public static function success($result, string $id = null): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result' => $result,
            'id' => $id,
            'status' => 200
        ];
    }

    public static function error($error): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error' => $error,
            'id' => null,
            'status' => 401
        ];
    }
}
