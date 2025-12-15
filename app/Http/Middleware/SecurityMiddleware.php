<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log suspicious requests
        $this->logSuspiciousActivity($request);

        // Validate request size
        $contentLength = strlen($request->getContent());
        if ($contentLength > 10485760) { // 10MB limit
            Log::warning('Large request detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'size' => $contentLength,
                'url' => $request->fullUrl()
            ]);
            return response()->json(['error' => 'Request too large'], 413);
        }

        // Check for common attack patterns
        if ($this->containsSuspiciousPatterns($request)) {
            Log::warning('Suspicious request pattern detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'input' => $request->except(['password', 'token', '_token'])
            ]);
            
            return response()->json(['error' => 'Invalid request'], 400);
        }

        $response = $next($request);

        // Add security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        return $response;
    }

    /**
     * Log suspicious activity
     */
    private function logSuspiciousActivity(Request $request): void
    {
        $suspiciousUserAgents = [
            'sqlmap', 'nikto', 'dirb', 'nmap', 'masscan',
            'python-requests', 'curl', 'wget', 'powershell'
        ];

        $userAgent = strtolower($request->userAgent());
        
        if (collect($suspiciousUserAgents)->contains(fn($agent) => str_contains($userAgent, $agent))) {
            Log::warning('Suspicious user agent detected', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl()
            ]);
        }
    }

    /**
     * Check for suspicious patterns in request
     */
    private function containsSuspiciousPatterns(Request $request): bool
    {
        $patterns = [
            '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi',
            '/javascript:/i',
            '/on\w+\s*=/i',
            '/<iframe\b[^>]*>/i',
            '/<object\b[^>]*>/i',
            '/<embed\b[^>]*>/i',
            '/<link\b[^>]*>/i',
            '/<meta\b[^>]*>/i',
            '/expression\s*\(/i',
            '/url\s*\(\s*["\']?javascript:/i',
            '/@import/i',
            '/union\s+select/i',
            '/select\s+.*\s+from/i',
            '/insert\s+into/i',
            '/update\s+.*\s+set/i',
            '/delete\s+from/i',
            '/drop\s+(table|database)/i',
            '/create\s+(table|database)/i',
            '/alter\s+table/i',
            '/exec\s*\(/i',
            '/system\s*\(/i',
            '/eval\s*\(/i',
            '/base64_decode/i',
            '/file_get_contents/i',
            '/fopen\s*\(/i',
            '/fwrite\s*\(/i',
            '/\.\./',
            '/\/etc\/passwd/i',
            '/\/proc\//i',
            '/cmd\.exe/i',
            '/powershell/i',
            '/bash/i',
            '/sh\s/i'
        ];

        $input = $request->except(['password', 'token', '_token', 'image', 'file']);
        $inputString = json_encode($input);

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $inputString)) {
                return true;
            }
        }

        return false;
    }
}