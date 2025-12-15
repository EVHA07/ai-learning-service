<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SanitizeInputMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Sanitize all input data
        $input = $request->all();
        
        $sanitized = $this->sanitizeArray($input);
        
        // Replace the request input with sanitized data
        $request->merge($sanitized);

        return $next($request);
    }

    /**
     * Recursively sanitize array data
     */
    private function sanitizeArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeArray($value);
            } elseif (is_string($value)) {
                $data[$key] = $this->sanitizeString($value);
            }
        }

        return $data;
    }

    /**
     * Sanitize string input
     */
    private function sanitizeString(string $value): string
    {
        // Remove null bytes
        $value = str_replace("\0", '', $value);
        
        // Normalize whitespace
        $value = preg_replace('/\s+/', ' ', $value);
        
        // Trim whitespace
        $value = trim($value);
        
        // Remove potentially dangerous HTML tags (if any)
        $value = strip_tags($value, '<p><br><strong><em><u><ol><ul><li>');
        
        // Convert HTML entities
        $value = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        // Remove control characters except newlines and tabs
        $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
        
        // Limit string length to prevent DoS
        if (strlen($value) > 10000) {
            Log::warning('Input too long, truncating', [
                'original_length' => strlen($value),
                'truncated_to' => 10000
            ]);
            $value = substr($value, 0, 10000);
        }

        return $value;
    }
}