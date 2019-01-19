<?php

use Illuminate\Http\Request;
use App\Http\Middleware\ApiCsrf;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/get_token", "Api\\LoginApiController@getToken");
Route::get("/get_csrf", "Api\\CsrfController@getCsrf");

Route::group(["prefix" => "/admin", "middleware" => ApiCsrf::class], function () {
	Route::post("/login", "Api\\LoginApiController@login");
});
