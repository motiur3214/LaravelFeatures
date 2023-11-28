<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure(Request): (Response) $next
     * @return mixed|Response
     */
    public function handle($request, Closure $next): mixed
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
