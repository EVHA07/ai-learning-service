<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            // \App\Http\Middleware\HandleInertiaRequests::class,
            \App\Http\Middleware\SecurityMiddleware::class,
            \App\Http\Middleware\SanitizeInputMiddleware::class,
            \App\Http\Middleware\ContentSecurityPolicyMiddleware::class,
        ]);
        
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'guru' => \App\Http\Middleware\GuruMiddleware::class,
            'admin.registration' => \App\Http\Middleware\AdminOnlyRegistration::class,
            'rate.limit' => \App\Http\Middleware\RateLimitMiddleware::class,
            'sanitize' => \App\Http\Middleware\SanitizeInputMiddleware::class,
            'security' => \App\Http\Middleware\SecurityMiddleware::class,
            'csp' => \App\Http\Middleware\ContentSecurityPolicyMiddleware::class,
            'secure.upload' => \App\Http\Middleware\SecureFileUploadMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
