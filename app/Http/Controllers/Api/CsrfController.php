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
        return response()->json(
            [
                "token" => cencrypt(json_encode(
                    [
                        "code" => rstr(32),
                        "logged_in_at" => time()
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

        if (isset($_POST["_token"])) {
            $token = json_decode(dencrypt($_POST["_token"], env("APP_KEY")), true);
            if (isset($token["logged_in_at"]) && (($token["logged_in_at"]+3600) > time())) {
                return true;
            }
        }
        
        return error_api("Token mismatch", 400);
    }
}
