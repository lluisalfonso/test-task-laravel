<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = [], $message = 'Success', $statusCode = '200'): JsonResponse {
        return response()->json([
            'success'   => true,
            'message'   => $message,
            'data'      => $data
        ], $statusCode);
    }
}
