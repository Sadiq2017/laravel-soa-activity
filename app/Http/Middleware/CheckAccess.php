<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\JsonRpcResponse;
use App\Utility\DecodingToken;
use App\Utility\ValidationPayload;
use Closure;
use Illuminate\Http\Request;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header();

        $check = false;

        $token = isset($header['token']) ? $header['token'][0] : null;

        if ( !empty($token) ) {
            $payload = DecodingToken::getPayload($token);

            $check = ValidationPayload::validate($payload);
        }

        if (!$check) {
            return response()->json(JsonRpcResponse::error('access denied'));
        }

        return $next($request);
    }
}
