<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Bohemia assignment documentation",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * @param array $data
     * @param int $status_code
     * @return JsonResponse
     */
    public function success(array $data = [], int $status_code = 200): JsonResponse
    {
        return response()->json($data, $status_code);
    }
    
    /**
     * @param $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function error($message, int $status_code = 500): JsonResponse
    {
        if (!is_array($message)) $message = [$message];
        
        return response()->json([
            'errors' => [
                'message' => $message
            ],
            'status_code' => $status_code
        ], $status_code);
    }
}
