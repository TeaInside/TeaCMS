<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Api\CsrfController;

class ApiCsrf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $st = new CsrfController;
        $st->validateCsrf();

        return $next($request);
    }
}
