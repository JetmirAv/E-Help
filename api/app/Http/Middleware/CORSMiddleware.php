<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CORSMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // TODO: Should check whether route has been registered
        // if ($this->isPreflightRequest($request)) {
        //     $response = $this->createEmptyResponse();
        // } else {
        $request = $this->addCorsHeaders($request);    
        $response = $next($request);
        // }

        return $this->addCorsHeaders($response);
    }

    /**
     * Determine if request is a preflight request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function isPreflightRequest($request)
    {
        return $request->isMethod('OPTIONS');
    }

    /**
     * Create empty response for preflight request.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createEmptyResponse()
    {
        return new Response(null, 204);
    }

    /**
     * Add CORS headers.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Http\Response $response
     */
    protected function addCorsHeaders($reqres)
    {
        foreach ([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Max-Age' => (60 * 60 * 24),
            'Access-Control-Allow-Headers' => null,
            'Access-Control-Allow-Methods' => 'GET, HEAD, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Credentials' => 'true',
        ] as $header => $value) {
            $reqres->header($header, $value);
        }

        return $reqres;
    }
}
