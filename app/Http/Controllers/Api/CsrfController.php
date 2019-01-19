<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CsrfController extends Controller
{   
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCsrf(): JsonResponse
    {

        // 1 hour
        $expired = time() + 3600;

        return response()->json(
            [
                "expired" => $expired,
                "token" => cencrypt(json_encode(
                    [
                        "code" => rstr(32),
                        "expired" => $expired
                    ]
                ), env("APP_KEY"))
            ]
        );
    }

    /**
     * @return bool
     */
    public function validateCsrf(): bool
    {
        return true;
    }
}
