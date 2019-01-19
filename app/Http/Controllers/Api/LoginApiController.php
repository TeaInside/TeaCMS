<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LoginApiController extends Controller
{
	/**
     * @return \Illuminate\Http\JsonResponse
     */
	public function login(): JsonResponse
	{
		
		$res = [
			"status" => "login_failed",
			"token_session" => null,
			"message" => "Unknown error"
		];

		if (!isset($_POST["_token"], $_POST["email"], $_POST["password"])) {
			error_api("Invalid parameter", 400);
		}

		if (!(is_string($_POST["_token"]) && is_string($_POST["email"]) && is_string($_POST["password"]))) {
			error_api("Invalid parameter", 400);
		}


		if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$where = ["email", "LIKE", strtolower($_POST["email"])];
		} else {
			$where = ["username", "LIKE", strtolower($_POST["email"])];
		}

		if (($u = DB::table("users")
			->select(["id", "password"])
			->where(...$where)
			->first())) {
			if (password_verify($_POST["password"], $u->password)) {
				$res = [
					"status" => "login_ok",
					"token_session" => cencrypt(json_encode(
						[
							"id" => $u->id,
							"login_time" => time()
						]
					), env("APP_KEY")),
					"message" => trans("auth.success")
				];
			} else {
				$res = [
					"status" => "login_failed",
					"message" => trans("auth.failed")
				];
			}
			unset($u);
		}

		return response()->json($res);
	}
}

require __DIR__."/api_helpers.php";
