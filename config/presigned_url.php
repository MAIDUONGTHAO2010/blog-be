<?php

return [
    'resources' => [
        'posts' => [
            'max_size' => 10485760, // bytes ~ 10MB
            'allow_mime_types' => [
                'application/pdf',
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/jpg',
            ],
        ],
    ],
    'expire' => 3600 * 4, // seconds
    'endpoint' => env('PRESIGNED_POST_ENDPOINT'),
];
