<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $maxAttempts = 60, $decayMinutes = 1)
    {
        $key = $this->resolveRequestSignature($request);
        
        // Check if rate limit exceeded
        if ($this->tooManyAttempts($key, $maxAttempts, $decayMinutes)) {
            Log::warning('Rate limit exceeded', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent(),
                'attempts' => $this->getAttempts($key),
                'max_attempts' => $maxAttempts
            ]);

            return response()->json([
                'error' => 'Too many requests. Please try again later.',
                'retry_after' => $this->getRetryAfter($key, $decayMinutes)
            ], 429);
        }

        // Increment attempts
        $this->hit($key, $decayMinutes);

        $response = $next($request);

        // Add rate limit headers
        $response->headers->set('X-RateLimit-Limit', $maxAttempts);
        $response->headers->set('X-RateLimit-Remaining', max(0, $maxAttempts - $this->getAttempts($key)));

        return $response;
    }

    /**
     * Resolve request signature
     */
    private function resolveRequestSignature(Request $request): string
    {
        return sha1(
            $request->ip() . '|' . 
            $request->route()->getName() . '|' . 
            ($request->user() ? $request->user()->id : 'guest')
        );
    }

    /**
     * Check if too many attempts
     */
    private function tooManyAttempts(string $key, int $maxAttempts, int $decayMinutes): bool
    {
        return $this->getAttempts($key) >= $maxAttempts;
    }

    /**
     * Get current attempts
     */
    private function getAttempts(string $key): int
    {
        return Cache::get($key, 0);
    }

    /**
     * Increment attempts
     */
    private function hit(string $key, int $decayMinutes): void
    {
        $expiresKey = $key . '_expires';
        if (!Cache::has($expiresKey)) {
            Cache::put($expiresKey, time() + ($decayMinutes * 60), now()->addMinutes($decayMinutes));
        }
        Cache::add($key, 0, now()->addMinutes($decayMinutes));
        Cache::increment($key);
    }

    /**
     * Get retry after seconds
     */
    private function getRetryAfter(string $key, int $decayMinutes): int
    {
        $expiration = Cache::get($key . '_expires', 0);
        return max(0, $expiration - time());
    }
}