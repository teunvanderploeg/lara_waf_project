<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class WebApplicationFirewall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check for rate limit
        if (RateLimiter::tooManyAttempts('request:'.$request->ip(), $perMinute = 60)) {
            return response('Rate limit reached.', 429);
        }
        RateLimiter::hit('request:'.$request->ip());

        return $next($request);
    }
}
