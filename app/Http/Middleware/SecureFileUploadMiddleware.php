<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SecureFileUploadMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasFile('file') || $request->hasFile('image')) {
            $file = $request->file('file') ?? $request->file('image');
            
            if (!$this->isValidFile($file)) {
                Log::warning('Invalid file upload detected', [
                    'ip' => $request->ip(),
                    'filename' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType()
                ]);
                
                return response()->json(['error' => 'Invalid file type or size'], 422);
            }
            
            // Sanitize filename
            $sanitizedFilename = $this->sanitizeFilename($file->getClientOriginalName());
            $request->files->set('file', $file->move($file->getPath(), $sanitizedFilename));
        }

        return $next($request);
    }

    /**
     * Validate file
     */
    private function isValidFile($file): bool
    {
        if (!$file || !$file->isValid()) {
            return false;
        }

        // Check file size (max 5MB)
        if ($file->getSize() > 5242880) {
            return false;
        }

        // Check MIME type
        $allowedMimes = [
            'image/jpeg',
            'image/png', 
            'image/gif',
            'image/webp',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'text/plain'
        ];

        if (!in_array($file->getMimeType(), $allowedMimes)) {
            return false;
        }

        // Check file extension
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx', 'txt'];
        $extension = strtolower($file->getClientOriginalExtension());
        
        if (!in_array($extension, $allowedExtensions)) {
            return false;
        }

        // Additional security checks for images
        if (str_starts_with($file->getMimeType(), 'image/')) {
            return $this->validateImage($file);
        }

        return true;
    }

    /**
     * Validate image file
     */
    private function validateImage($file): bool
    {
        try {
            $imageInfo = getimagesize($file->getPathname());
            
            if (!$imageInfo) {
                return false;
            }

            // Check for valid image dimensions
            if ($imageInfo[0] > 5000 || $imageInfo[1] > 5000) {
                return false;
            }

            // Check for embedded scripts
            $content = file_get_contents($file->getPathname());
            if (preg_match('/<\?php|<script|javascript:/i', $content)) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Image validation error', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Sanitize filename
     */
    private function sanitizeFilename(string $filename): string
    {
        // Remove path traversal attempts
        $filename = str_replace(['../', '..\\', '/', '\\'], '', $filename);
        
        // Remove special characters except dots, hyphens, and underscores
        $filename = preg_replace('/[^a-zA-Z0-9.\-_]/', '', $filename);
        
        // Limit filename length
        if (strlen($filename) > 255) {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $basename = pathinfo($filename, PATHINFO_FILENAME);
            $filename = substr($basename, 0, 250 - strlen($extension)) . '.' . $extension;
        }

        return $filename;
    }
}