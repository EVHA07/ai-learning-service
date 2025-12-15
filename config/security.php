<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Security Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains security settings for the application.
    |
    */

    'rate_limiting' => [
        'login' => [
            'max_attempts' => 5,
            'decay_minutes' => 15,
            'lockout_duration' => 900, // 15 minutes
        ],
        'registration' => [
            'max_attempts' => 3,
            'decay_minutes' => 60,
        ],
        'purchase' => [
            'max_attempts' => 10,
            'decay_minutes' => 30,
        ],
        'course_creation' => [
            'max_attempts' => 5,
            'decay_minutes' => 60,
        ],
    ],

    'input_validation' => [
        'max_string_length' => 10000,
        'max_file_size' => 10485760, // 10MB
        'allowed_image_types' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
        'allowed_file_types' => ['pdf', 'doc', 'docx', 'txt'],
        'allowed_domains' => [
            'zoom.us',
            'meet.google.com',
            'teams.microsoft.com'
        ],
    ],

    'password_policy' => [
        'min_length' => 12,
        'max_length' => 128,
        'require_uppercase' => true,
        'require_lowercase' => true,
        'require_numbers' => true,
        'require_symbols' => true,
        'forbidden_patterns' => [
            'password',
            '123456',
            'qwerty',
            'admin',
            'user'
        ],
    ],

    'session_security' => [
        'lifetime' => 7200, // 2 hours
        'expire_on_close' => true,
        'secure' => true,
        'http_only' => true,
        'same_site' => 'strict',
    ],

    'logging' => [
        'log_suspicious_requests' => true,
        'log_failed_logins' => true,
        'log_rate_limit_violations' => true,
        'log_file_changes' => true,
        'retention_days' => 90,
    ],

    'security_headers' => [
        'x_frame_options' => 'DENY',
        'x_content_type_options' => 'nosniff',
        'x_xss_protection' => '1; mode=block',
        'referrer_policy' => 'strict-origin-when-cross-origin',
        'permissions_policy' => 'geolocation=(), microphone=(), camera=()',
    ],

    'content_security_policy' => [
        'default_src' => "'self'",
        'script_src' => "'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com https://unpkg.com",
        'style_src' => "'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com",
        'img_src' => "'self' data: https: blob:",
        'font_src' => "'self' https://cdnjs.cloudflare.com",
        'connect_src' => "'self'",
        'frame_src' => "'none'",
        'object_src' => "'none'",
        'base_uri' => "'self'",
        'form_action' => "'self'",
        'frame_ancestors' => "'none'",
    ],
];