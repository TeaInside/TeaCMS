<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LoginApiController extends Controller
{
    public function getToken(): JsonResponse
    {
    	return response()->json(
    		[
    			"token" => rstr(32)
    		]
    	);
    }
}
