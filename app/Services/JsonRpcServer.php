<?php


namespace App\Services;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JsonRpcServer
{
    public function handle(Request $request, Controller $controller): array
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                info('test');
            }
            $result = $controller->{$content['method']}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
