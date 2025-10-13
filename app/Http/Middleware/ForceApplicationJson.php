<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceApplicationJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Force the request to accept JSON
        $request->headers->set('Accept', 'application/json');

        $response = $next($request);

        // Force the response to be JSON (if possible)
        if (method_exists($response, 'header')) {
            $response->header('Content-Type', 'application/json');
        }

        return $response;
    }
}
